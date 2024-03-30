<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Status;
use Redirect,Response,DB;

class StatusController extends Controller
{
    public function index(){
        return view('admin.status.index');
    }

    public function table()
    {
        $data = Status::all();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                if ($data->nama === 'Masa Berlaku Sertifikat Habis' || $data->nama === 'Sertifikat Berlaku') {
                    return '';
                } else {
                    return view('admin.components.aksi')->with('data', $data);
                }
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required'
        ]);

        $data = ['nama' => $request->nama];

        $id = $request->id;

        $status = Status::updateOrCreate(['id' => $id], $data);

        return Response::json($status);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data = Status::where($where)->first();
        return Response::json($data);
    }

    public function destroy($id)
    {
        try {
            $status = Status::where('id', $id)->delete();
            return response()->json(['message' => 'Data berhasil dihapus', 'status' => true], 200);
        } catch (\Exception $e) {
            // Jika terjadi exception, tangkap dan kirim pesan error
            return response()->json(['message' => 'Data yang anda minta tidak bisa dihapus karena digunakan pada tabel klien', 'status' => false], 403);
        }
    }
}
