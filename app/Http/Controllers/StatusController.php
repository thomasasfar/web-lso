<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Status;
use Redirect,Response,DB;

class StatusController extends Controller
{
    public function list() {
        $data = Status::all();
        return response()->json($data);
    }
}
