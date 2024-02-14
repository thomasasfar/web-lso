<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Client;
use App\Models\RuangLingkup;
use App\Models\Standard;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        $ruanglingkup = RuangLingkup::all();
        $standard = Standard::all();

        return view('masyarakat.listKlien', compact('client', 'ruanglingkup', 'standard'));
    }

    public function indexAdmin()
    {
        return view('admin.klien.list');
    }

    public function tableKlien()
    {
        $data = Client::with('RuangLingkup', 'Standard')->get();

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
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validasi = Validator::make($request->all(),[
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
        'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    $standard = Standard::find($validasi['id_standar']);
    $ruanglingkup = RuangLingkup::find($validasi['id_ruang_lingkup']);

    if (!$standard) {
        return redirect()->back()->with('error', 'Standar tidak valid');
    }

    if (!$ruanglingkup) {
        return redirect()->back()->with('error', 'Ruang lingkup tidak valid');
    }

    if($request->file('gambar')){
        $extension = $request->file('gambar')->getClientOriginalExtension();
        $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;
        $request->file('gambar')->storeAs('images/klien', $newName, 'public');
        $validasi['gambar'] = $newName;
    } else {
        $newName = '';
    }

    if ($validasi->fails()){
        return response()->json(['errors' => $validasi->errors()]);
    } else {
        $dataKlien = [
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'kontak' => $data['kontak'],
            'validasi' => $data['validasi'],
            'id_standar' => $data['id_standar'],
            'nomor_sertifikat' => $data['nomor_sertifikat'],
            'tanggal_mulai_berlaku' => $data['tanggal_mulai_berlaku'],
            'tanggal_habis_berlaku' => $data['tanggal_habis_berlaku'],
            'status' => $data['status'],
            'id_ruang_lingkup' => $data['id_ruang_lingkup'],
            'gambar' => $newName,
        ];
        Client::create($dataKlien);
        return response()->json(['success' => "Berhasil menyimpan data"]);
    }
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
        $data = Client::with('RuangLingkup', 'Standard')->where('id', $id)->first();
        return response()->json(['result' => $data]);
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
        'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
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
            'gambar' => $newName,
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
        Client::where('id', $id)->delete();
    }
}
