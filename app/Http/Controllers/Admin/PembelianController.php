<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index(){
        $beli = Pembelian::all();
        return view('admin.pembelian.index', compact('beli'));
    }

    public function filter(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $beli = Pembelian::whereBetween('created_at', [$startDate, $endDate])->get();

        // Lakukan sesuatu dengan data yang telah difilter, misalnya kirim ke view
        return view('admin.pembelian.index',compact('beli'));
    }

    public function ekspor(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $beli = Pembelian::whereBetween('created_at', [$startDate, $endDate])->get();

        // Lakukan sesuatu dengan data yang telah difilter, misalnya kirim ke view
        return view('admin.pembelian.filter',compact('beli'));
    }
}

// @if(count($beli) > 0)
//     @foreach($beli as $report)
//         <p>{{$report->title}}</p>
//         <p>{{$report->description}}</p>
//         <p>{{$report->created_at}}</p>
//     @endforeach
// @else
//     <p>No reports found for {{$date}}</p>
// @endif
