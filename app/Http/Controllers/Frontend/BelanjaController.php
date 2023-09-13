<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Detail_Pembelian;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BelanjaController extends Controller
{
    public function index(){
        $beli = Pembelian::where('id_user', Auth::id())->get();
        return view('frontend.riwayat-belanja', compact('beli'));
    }

    public function view($id){
        $beli = Pembelian::find($id);
        $detail_pembelian = Detail_Pembelian::where('id_pembelian',$beli->id)->get();
        return view('frontend.viewpembelian', compact('beli', 'detail_pembelian'));
    }
    public function ket(Request $request ){
        $beli = Pembelian::where('id_user',Auth::id())->where('ket','0')->first();
        $beli->ket = $request->aaa;
        $beli->update();
        return redirect('/belanja');
    }
}
 