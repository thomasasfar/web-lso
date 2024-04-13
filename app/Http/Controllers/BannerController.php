<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Banner;
use Redirect,Response,DB;
use File;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('masyarakat.tentang.tentang', compact('banner'));
    }

    public function indexAdmin()
    {
        return view('admin.about_us.banner');
    }

    public function tableBanner()
    {
        $data = Banner::all();
        $table = "banner";

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function($data) use ($table){
                return view('admin.components.image')->with(['data' => $data, 'table' => $table]);
            })
            ->addColumn('aksi', function ($data) {
                return view('admin.components.delete')->with('data', $data);
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $folderPath = public_path('storage/images/banner/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;
        file_put_contents($imageFullPath, $image_base64);
         $saveFile = new Banner;
         $saveFile->image = $imageName;
         $saveFile->save();

        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }

    public function destroy($id)
    {
        $data = Banner::where('id',$id)->first(['image']);
        \File::delete('storage/images/banner/'.$data->image);

        $banner = Banner::where('id', $id)->delete();
        return Response::json($banner);
    }
}
