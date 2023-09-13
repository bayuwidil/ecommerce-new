<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(){
        $kembali = pengembalian::all();
        return view('admin.return.index', compact('kembali'));
    }
}
