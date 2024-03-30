<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Sosmed;
use Redirect,Response,DB;
use File;

class SosmedController extends Controller
{
    public function index()
    {
        return view('admin.sosmed.index');
    }

    public function table()
    {
        $data = Sosmed::all();
        $table = "sosmed";

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function($data) use ($table){
                return view('admin.components.icon')->with(['data' => $data, 'table' => $table]);
            })
            ->addColumn('aksi', function ($data) {
                return view('admin.components.aksi')->with('data', $data);
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
       ]);

       $sosmedId = $request->id;

       $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'id_ruang_lingkup' => $request->id_ruang_lingkup,
        ];

        if ($files = $request->file('image')) {

            //delete old file
            \File::delete('storage/images/sosmed/'.$request->hidden_image);

            //insert new file
            $destinationPath = 'storage/images/sosmed'; // upload path
            $sosmedImage =  $request->nama . "-" . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $sosmedImage);
            $data['image'] = "$sosmedImage";
        }

        $sosmed = Sosmed::updateOrCreate(['id' => $sosmedId], $data);

        return Response::json($sosmed);
    }

    public function edit ($id)
    {
        $where = array('id' => $id);
        $data = Sosmed::where($where)->first();

        return Response::json($data);
    }

    public function destroy ($id)
    {
        $data = Sosmed::where('id',$id)->first(['image']);
        \File::delete('storage/images/sosmed'.$data->image);

        $sosmed = Sosmed::where('id', $id)->delete();
        return Response::json($sosmed);
    }
}
