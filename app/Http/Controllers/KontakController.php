<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Kontak;
use App\Models\Sosmed;
use Illuminate\Support\Str;
use Redirect,Response,DB;
use File;

class KontakController extends Controller
{
    public function index()
    {
        return view('admin.kontak.index');
    }

    public function indexMasyarakat()
    {
        return view('masyarakat.kontak');
    }

    public function table()
    {
        $data = Kontak::all();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('admin.components.edit')->with('data', $data);
            })
            ->make(true);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data = Kontak::where($where)->first();

        return Response::json($data);
    }

    public function update(Request $request)
    {
        request()->validate([
            'isi' => 'required',
        ]);

        $kontakId = $request->kontak_id;

        $kontak = Kontak::findOrFail($kontakId);

        $data = [
            'isi' => $request->isi,
        ];

        // $kontak->update($data);
        $kontak->update($data);
        return Response::json($kontak);
    }

    public function footer()
    {
        $kontak = Kontak::all();
        $sosmed = Sosmed::all();

        return view('masyarakat.footer.footer', compact('kontak', 'sosmed'));
    }

    public function kontakfooter()
    {
        $kontak = Kontak::all();

        return Response::json($kontak);
    }

    public function sosmedfooter()
    {
        $sosmed = Sosmed::all();

        return response()->json($sosmed);
    }
}
