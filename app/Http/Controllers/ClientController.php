<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Client;
use App\Models\RuangLingkup;
use App\Models\Standard;
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
        $client = Client::paginate(16);
        $ruanglingkup = RuangLingkup::all();
        $standard = Standard::all();

        return view('masyarakat.listKlien', compact('client', 'ruanglingkup', 'standard'));
    }

    function paginationAjax(Request $request)
    {
        if($request->ajax())
        {
            $data = Client::paginate(5);
            return view('masyarakat.klien_pagination_data', compact('data'))->render();
        }
    }

    public function indexAdmin()
    {
        return view('admin.klien.list');
    }

    public function tableKlien()
    {
        $data = Client::with('RuangLingkup', 'Standard');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('ruang_lingkup', function ($client) {
                return $client->RuangLingkup ? $client->RuangLingkup->nama : '-';
            })
            ->addColumn('standar', function ($client) {
                return $client->Standard ? $client->standard->nama_standar : '-';
            })
            ->addColumn('aksi', function ($data) {
                return view('admin.components.aksi')->with('data', $data);
            })
            // ->addColumn('image', 'image')
            // ->rawColumns(['aksi','image'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     public function store(Request $request)
// {
//     $validasi = Validator::make($request->all(),[
//         'nama' => 'required',
//         'alamat' => 'required',
//         'kontak' => 'required',
//         'validasi' => 'required|date',
//         'id_standar' => 'required|exists:standards,id',
//         'nomor_sertifikat' => 'required',
//         'tanggal_mulai_berlaku' => 'required|date',
//         'tanggal_habis_berlaku' => 'required|date|after:tanggal_mulai_berlaku',
//         'status' => 'required',
//         'id_ruang_lingkup' => 'required|exists:ruang_lingkups,id',
//         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
//     ]);

//     if ($validasi->fails()){
//         return response()->json(['errors' => $validasi->errors()]);
//     } else {
//         $data = [
//             'nama' => $validasi['nama'],
//             'alamat' => $validasi['alamat'],
//             'kontak' => $validasi['kontak'],
//             'validasi' => $validasi['validasi'],
//             'id_standar' => $validasi['id_standar'],
//             'nomor_sertifikat' => $validasi['nomor_sertifikat'],
//             'tanggal_mulai_berlaku' => $validasi['tanggal_mulai_berlaku'],
//             'tanggal_habis_berlaku' => $validasi['tanggal_habis_berlaku'],
//             'status' => $validasi['status'],
//             'id_ruang_lingkup' => $validasi['id_ruang_lingkup'],
//             'image' => $newName,
//         ];
//         Client::create($data);
//         return response()->json(['success' => "Berhasil menyimpan data"]);
//     }

//     if($request->file('image')){
//         $extension = $request->file('image')->getClientOriginalExtension();
//         $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
//         $request->file('image')->storeAs('images/klien', $newName, 'public');
//         $validasi['image'] = $newName;
//     } else {
//         $newName = '';
//     }

// }

    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'validasi' => 'required|date',
            'id_standar' => 'required|exists:standards,id',
            'nomor_sertifikat' => 'required',
            'tanggal_mulai_berlaku' => 'required|date',
            'tanggal_habis_berlaku' => 'required|date|after:tanggal_mulai_berlaku',
            'status' => 'required',
            'id_ruang_lingkup' => 'required|exists:ruang_lingkups,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
       ]);

       $clientId = $request->client_id;

       $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'validasi' => $request->validasi,
            'id_standar' => $request->id_standar,
            'nomor_sertifikat' => $request->nomor_sertifikat,
            'tanggal_mulai_berlaku' => $request->tanggal_mulai_berlaku,
            'tanggal_habis_berlaku' => $request->tanggal_habis_berlaku,
            'status' => $request->status,
            'id_ruang_lingkup' => $request->id_ruang_lingkup,
        ];

        if ($files = $request->file('image')) {

            //delete old file
            \File::delete('/storage/images/klien'.$request->hidden_image);

            //insert new file
            $destinationPath = 'storage/images/klien'; // upload path
            $clientImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $clientImage);
            $data['image'] = "$clientImage";
        }

        $client = Client::updateOrCreate(['id' => $clientId], $data);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data = Client::with('RuangLingkup', 'Standard')->where($where)->first();
        // return response()->json(['result' => $data]);

        // $where = array('id' => $id);
        // $client  = Client::where($where)->first();

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
    $validasi = Validator::make($request->all(),[
        'nama' => 'required',
        'alamat' => 'required',
        'kontak' => 'required',
        'validasi' => 'required|date',
        'id_standar' => 'required',
        'nomor_sertifikat' => 'required',
        'tanggal_mulai_berlaku' => 'required|date',
        'tanggal_habis_berlaku' => 'required|date|after:tanggal_mulai_berlaku',
        'status' => 'required',
        'id_ruang_lingkup' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    if ($validasi->fails()){
        return response()->json(['errors' => $validasi->errors()]);
    } else {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/klien'), $imageName);
            return response()->json(['success' => 'Image uploaded successfully']);
        } else {
            return response()->json(['error' => 'Image not found']);
        }

        $data = [
            'nama' => $validasi['nama'],
            'alamat' => $validasi['alamat'],
            'kontak' => $validasi['kontak'],
            'validasi' => $validasi['validasi'],
            'id_standar' => $validasi['id_standar'],
            'nomor_sertifikat' => $validasi['nomor_sertifikat'],
            'tanggal_mulai_berlaku' => $validasi['tanggal_mulai_berlaku'],
            'tanggal_habis_berlaku' => $validasi['tanggal_habis_berlaku'],
            'status' => $validasi['status'],
            'id_ruang_lingkup' => $validasi['id_ruang_lingkup'],
            'image' => $newName,
        ];
        Client::where('id', $id)->update($data);
        return response()->json(['success' => "Berhasil menyimpan data"]);
    }
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
        \File::delete('storage/images/klien'.$data->image);

        $client = Client::where('id', $id)->delete();
        return Response::json($client);
    }
}
