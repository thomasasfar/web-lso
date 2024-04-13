<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\Standard;
use Redirect,Response,DB;


class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.standar.list');
    }

    public function tableStandard()
    {
        $data = Standard::all();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('admin.components.aksi')->with('data', $data);
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_standar' => 'required|unique:standards,nama_standar'
        ], [
           'nama_standar.required' => 'Nama standar harus diisi.',
            'nama_standar.unique' => 'Nama standar sudah ada.'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = ['nama_standar' => $request->nama_standar];

        $standardId = $request->standard_id;

        $standard = Standard::updateOrCreate(['id' => $standardId], $data);

        return Response::json($standard);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data = Standard::where($where)->first();
        return Response::json($data);
    }

    public function destroy($id)
    {
        try {
            $standard = Standard::where('id', $id)->delete();
            return response()->json(['message' => 'Data berhasil dihapus', 'status' => true], 200);
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap dan kirim pesan error
            return response()->json(['message' => 'Data yang anda minta tidak bisa dihapus karena digunakan pada tabel klien', 'status' => false], 403);
        }
    }

}
