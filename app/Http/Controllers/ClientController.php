<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Client;
use App\Models\RuangLingkup;
use App\Models\Standard;
use App\Models\DetailStandard;
use App\Models\DetailRuangLingkup;
use App\Models\Status;
use Redirect,Response,DB;
use File;
use PDF;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $client = Client::paginate(20);
        $ruanglingkup = RuangLingkup::all();
        $standard = Standard::all();

        return view('masyarakat.listKlien', compact('client', 'ruanglingkup', 'standard'));
    }

    function paginationAjax(Request $request)
    {
        if($request->ajax())
        {
            $data = Client::paginate(20);
            return view('masyarakat.klien_pagination_data', compact('data'))->render();
        }
    }

    public function indexAdmin()
    {
        return view('admin.klien.list');
    }

    public function tableKlien()
    {
        $data = Client::all();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('ruanglingkup', function ($client) {
                if ($client->DetailRuangLingkup->isNotEmpty()) {
                    $ruanglingkups = $client->DetailRuangLingkup->map(function ($detail) {
                        return $detail->RuangLingkup->nama;
                    })->implode(', ');
                    return $ruanglingkups;
                } else {
                    return '-';
                }
            })
            ->addColumn('standar', function ($client) {
                if ($client->DetailStandard->isNotEmpty()) {
                    $standards = $client->DetailStandard->map(function ($detail) {
                        return $detail->Standard->nama_standar;
                    })->implode(', ');
                    return $standards;
                } else {
                    return '-';
                }
            })
            ->addColumn('status', function ($client) {
                return $client->Status ? $client->status->nama : '-';
            })
            ->addColumn('aksi', function ($data) {
                return view('admin.components.aksi')->with('data', $data);
            })
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.klien.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'telepon' => 'required',
            'email' => 'nullable|email',
            'validasi' => 'required|date|before_or_equal:tanggal_mulai_berlaku',
            'nomor_sertifikat' => 'required',
            'tanggal_mulai_berlaku' => 'required|date',
            'tanggal_habis_berlaku' => 'required|date|after:tanggal_mulai_berlaku',
            'id_status' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'kontak.required' => 'Kontak harus diisi.',
            'telepon.required' => 'Telepon harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'validasi.required' => 'Tanggal validasi harus diisi.',
            'validasi.date' => 'Tanggal validasi harus dalam format tanggal yang valid.',
            'validasi.before_or_equal' => 'Tanggal validasi harus sebelum atau sama dengan tanggal mulai berlaku.',
            'nomor_sertifikat.required' => 'Nomor sertifikat harus diisi.',
            'tanggal_mulai_berlaku.required' => 'Tanggal mulai berlaku harus diisi.',
            'tanggal_mulai_berlaku.date' => 'Tanggal mulai berlaku harus dalam format tanggal yang valid.',
            'tanggal_habis_berlaku.required' => 'Tanggal habis berlaku harus diisi.',
            'tanggal_habis_berlaku.date' => 'Tanggal habis berlaku harus dalam format tanggal yang valid.',
            'tanggal_habis_berlaku.after' => 'Tanggal habis berlaku harus setelah tanggal mulai berlaku.',
            'id_status.required' => 'ID Status harus diisi.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'File gambar harus memiliki format JPG, PNG, JPEG, GIF, atau SVG.',
            'image.max' => 'Ukuran file gambar tidak boleh lebih dari 2 MB.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

       $clientId = $request->client_id;

       $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'validasi' => $request->validasi,
            'id_standar' => $request->id_standar,
            'nomor_sertifikat' => $request->nomor_sertifikat,
            'tanggal_mulai_berlaku' => $request->tanggal_mulai_berlaku,
            'tanggal_habis_berlaku' => $request->tanggal_habis_berlaku,
            'id_status' => $request->id_status,
        ];

        if ($files = $request->file('image')) {

            //delete old file
            \File::delete('storage/images/klien/'.$request->hidden_image);

            //insert new file
            $destinationPath = 'storage/images/klien'; // upload path
            $clientImage = $request->nama . " - " . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $clientImage);
            $data['image'] = "$clientImage";
        }

        $client = Client::updateOrCreate(['id' => $clientId], $data);

        $dataStandard = $request->id_standard;
        $insertStandard = [];
        for ($i = 0; $i < count($dataStandard); $i++) {
            array_push($insertStandard, ['id_client' => $client->id, 'id_standard' => $dataStandard[$i]]);
        }

        $dataRuangLingkup = $request->id_ruang_lingkup;
        $insertRuangLingkup = [];
        for ($i = 0; $i < count($dataRuangLingkup); $i++) {
            array_push($insertRuangLingkup, ['id_client' => $client->id, 'id_ruang_lingkup' => $dataRuangLingkup[$i]]);
        }

        // Menghapus detail standar yang sudah ada untuk klien yang diupdate
        DetailStandard::where('id_client', $client->id)->delete();
        DetailRuangLingkup::where('id_client', $client->id)->delete();

        DetailStandard::insertOrIgnore($insertStandard);
        DetailRuangLingkup::insertOrIgnore($insertRuangLingkup);


        return Response::json($client);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Client::with('DetailRuangLingkup.RuangLingkup', 'DetailStandard.Standard')->findOrFail($id);
        $detailStandards = DetailStandard::with('standard')->where('id_client', $id)->get();
        $detailRuangLingkups = DetailRuangLingkup::with('ruanglingkup')->where('id_client', $id)->get();

        return view('masyarakat.detail_klien', compact('data', 'detailStandards', 'detailRuangLingkups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $where = array('id' => $id);
        $data = Client::with('DetailRuangLingkup', 'DetailStandard')->findOrFail($id);

        return view('admin.klien.edit', compact('data'));

        // return Response::json($data);
    }

    public function selectstandard()
    {
        // $mk = DetailStandard::select('id_standard');
        $data = Standard::where('nama_standar', 'LIKE', '%' . request('q') . '%')->paginate(10);

        return Response::json($data);
    }

    public function getstandard($id)
    {
        $detailStandards = DetailStandard::with('standard')->where('id_client', $id)->get();
        $data = '';

        foreach ($detailStandards as $detailStandard) {
            $data .= "<option value='{$detailStandard->standard->id}' selected>{$detailStandard->standard->nama_standar}</option>";
        }

        return Response::json($data);
    }

    public function selectRuangLingkup()
    {
        // $mk = DetailStandard::select('id_standard');
        $data = RuangLingkup::where('nama', 'LIKE', '%' . request('q') . '%')->paginate(10);

        return Response::json($data);
    }

    public function getRuangLingkup($id)
    {
        $detailRuangLingkup = DetailRuangLingkup::with('ruanglingkup')->where('id_client', $id)->get();
        $data = '';

        foreach ($detailRuangLingkup as $row) {
            $data .= "<option value='{$row->ruanglingkup->id}' selected>{$row->ruanglingkup->nama}</option>";
        }

        return Response::json($data);
    }

    public function selectStatus()
    {
        $data = Status::where('nama', 'LIKE', '%' . request('q') . '%')->paginate(10);

        return Response::json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Client::where('id',$id)->first(['image']);
        \File::delete('storage/images/klien/'.$data->image);

        $client = Client::where('id', $id)->delete();
        return Response::json($client);
    }
}
