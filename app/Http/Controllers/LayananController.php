<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Layanan;
use DOMDocument;
use Illuminate\Support\Str;
use Redirect,Response,DB;
use File;
use PDF;

class LayananController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.layanan.list');
    }

    public function tableLayanan()
    {
        $data = Layanan::all();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('admin.components.aksi')->with('data', $data);
            })
            ->make(true);
    }



    public function create()
    {
        return view ('admin.layanan.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'file' => 'nullable|file|mimes:pdf',
       ]);

       $layananId = $request->layanan_id;

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ];

        $dom = new DOMDocument();
        $dom->loadHTML($data['deskripsi'],9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time(). $key.'.png';
            file_put_contents(public_path().$image_name,$data);

            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }
        $data['deskripsi'] = $dom->saveHTML();

        if ($files = $request->file('image')) {

            //delete old file
            \File::delete('/storage/images/layanan'.$request->hidden_image);

            //insert new file
            $destinationPath = 'storage/images/layanan'; // upload path
            $layananImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $layananImage);
            $data['image'] = "$layananImage";
        }

        if ($pdfFile = $request->file('file')) {
            // Hapus file PDF lama jika ada
            if ($request->hidden_pdf) {
                \File::delete(public_path('storage/pdfs/layanan/'.$request->hidden_pdf));
            }

            // Unggah dan simpan file PDF baru
            $pdfPath = 'storage/pdfs/layanan';
            $pdfName = date('YmdHis') . "." . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path($pdfPath), $pdfName);
            $data['file'] = $pdfName;
        }

        $layanan = Layanan::updateOrCreate(['id' => $layananId], $data);
        return Response::json($layanan);
    }


    public function edit($id)
    {
        // $where = array('id' => $id);
        // $data = Layanan::where($where)->first();

        $data = Layanan::findOrFail($id);
        return view('admin.layanan.edit',compact('data'));
        // return Response::json($data);
    }

    public function destroy($id)
    {
        $data = Layanan::where('id',$id)->first(['image']);

         if (!empty($layanan->image)) {
            \File::delete(public_path('storage/images/layanan/' . $layanan->image));
        }

        if (!empty($layanan->file)) {
            \File::delete(public_path('storage/pdfs/layanan/' . $layanan->file));
        }

        $layanan = Layanan::where('id', $id)->delete();
        return Response::json($layanan);
    }
}
