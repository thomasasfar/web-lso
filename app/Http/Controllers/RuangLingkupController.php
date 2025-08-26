<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\RuangLingkup;
use Redirect,Response,DB;

class RuangLingkupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ruang_lingkup.list');
    }

    public function table()
    {
        $data = RuangLingkup::all();

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
            'nama' => 'required|unique:ruang_lingkups,nama'
        ], [
            'nama.required' => 'Nama ruang lingkup harus diisi.',
            'nama.unique' => 'Nama ruang lingkup sudah ada.'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = ['nama' => $request->nama];

        $ruangLingkupId = $request->ruang_lingkup_id;

        $ruanglingkup = RuangLingkup::updateOrCreate(['id' => $ruangLingkupId], $data);

        return Response::json($ruanglingkup);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data = RuangLingkup::where($where)->first();
        return Response::json($data);
    }

    public function destroy($id)
    {
        try {
            $ruanglingkup = RuangLingkup::where('id', $id)->delete();
            return response()->json(['message' => 'Data berhasil dihapus', 'status' => true], 200);
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap dan kirim pesan error
            return response()->json(['message' => 'Data yang anda minta tidak bisa dihapus karena digunakan pada tabel klien', 'status' => false], 403);
        }
    }
}
