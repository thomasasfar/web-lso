<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Tentang;
use App\Models\Banner;
use DOMDocument;
use Illuminate\Support\Str;
use Redirect,Response,DB;
use File;
use PDF;

class TentangController extends Controller
{
    public function index()
    {
        return view('masyarakat.tentang.tentang');
    }

    public function profil()
    {
        $profil = Tentang::all();
        return Response::json($profil);
    }

    public function getBanner()
    {
        $banner = Banner::all();
        return response()->json($banner);
    }

    public function indexAdmin()
    {
        return view('admin.profile.index');
    }

    public function table()
    {
        $data = Tentang::all();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('admin.components.edit')->with('data', $data);
            })
            ->make(true);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Tentang::findOrFail($id);
        return view('admin.profile.edit',compact('data'));
    }

    public function update(Request $request)
    {
        request()->validate([
            'konten' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
       ]);

        $profilId = $request->profil_id;

        $tentang = Tentang::findOrFail($profilId);

        $data = [
            'konten' => $request->konten,
        ];

        if ($files = $request->file('image')) {

            //delete old file
            \File::delete('/storage/images/tentang'.$request->hidden_image);

            //insert new file
            $destinationPath = 'storage/images/tentang'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }

        // $tentang->update($data);
        $tentang->update($data);
        return Response::json($tentang);
    }
}
