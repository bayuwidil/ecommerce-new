<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Product;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index(){
        $chartitem = Keranjang::where('id_user', Auth::id())->get();
        return view('Frontend.keranjang', compact('chartitem'));
    }

    public function add(Request $request){
        $id_produk = $request->input('id_produk');
        $jumlah = $request->input('jumlah');

        if(Auth::check())
        {
            $produk_check = Product::where('id',$id_produk)->first();
            if($request->jumlah > $produk_check->stok){
                return response()->json(['status' => "Stok Produk Tidak Tercukupi !"]);
            }

            if($request->jumlah == 0){
                return response()->json(['status' => "masukan jumlah!"]);
            }
            
            if($produk_check){
                if(Keranjang::where('id_produk',$id_produk)->where('id_user', Auth::id())->exists())
                {   
                    return response()->json(['status'=>$produk_check->name."Sudah di tambahkan ke Keranjang"]);
                }
                else{
                    
                    $chartitem = new Keranjang();
                    $chartitem->id_produk = $id_produk; 
                    $chartitem->id_user = Auth::id();
                    $chartitem->jumlah = $jumlah;
                    $chartitem->save();
                    return response()->json(['status'=>$produk_check->name."Berhasil di tambahkan ke Keranjang"]);
                }
                }
        }
        else
        {
            return response()->json(['status' => "Login terlebih dahulu"]);
        }   
    }

    public function delete($id){
        $chart = Keranjang::find($id);
        $chart->delete();
        return redirect('keranjang');
    }
    public function updatecart(Request $request){
        $id_produk = $request->input('id_produk');
        $jumlah = $request->input('jumlah');


        if(Auth::check()){
            if(Keranjang::where('id_produk',$id_produk)->where('id_user',Auth::id())->exists()){
                $chart = Keranjang::where('id_produk',$id_produk)->where('id_user',Auth::id())->first();
                $chart->jumlah = $jumlah;
                $chart->update();
                return response()->json(['status' => 'jumlah berhasil diubah !']);
            }
        }
    }
    

    public function cartcount(){
        $cartcount = Keranjang::where('id_user', Auth::id())->count();
        return response()->json(['count' => $cartcount]);
    }
}
