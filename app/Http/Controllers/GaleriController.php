<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Galeri;
use Redirect,Response,DB;
use File;

class GaleriController extends Controller
{
    public function indexbyAdmin() {
        return view('admin.galeri.index');
    }

    public function table() {
        $data = Galeri::all();
        $table = "galeri";

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function($data) use ($table){
                return view('admin.components.image')->with(['data' => $data, 'table' => $table]);
            })
            ->addColumn('aksi', function ($data) {
                return view('admin.components.aksi')->with('data', $data);
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'caption' => 'nullable',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ],[
            'image.required' => 'Tolong unggah gambarnya',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'File gambar harus memiliki format JPG, PNG, JPEG, GIF, atau SVG.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $galeriId = $request->id;

        $data = [
        'caption' => $request->caption,
        ];

        if ($files = $request->file('image')) {

            //delete old file
            \File::delete('storage/images/galeri/'.$request->hidden_image);

            //insert new file
            $destinationPath = 'storage/images/galeri'; // upload path
            $galeriImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $galeriImage);
            $data['image'] = "$galeriImage";
        }

        $galeri = Galeri::updateOrCreate(['id' => $galeriId], $data);

        return Response::json($galeri);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data = Galeri::where($where)->first();
        return Response::json($data);
    }

    public function destroy($id)
    {
        $data = Galeri::where('id',$id)->first(['image']);
        \File::delete('storage/images/galeri/'.$data->image);

        $galeri = Galeri::where('id', $id)->delete();
        return Response::json($galeri);
    }
}
