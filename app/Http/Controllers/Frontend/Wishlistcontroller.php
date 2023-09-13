<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Wishlistcontroller extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('id_user', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function add(Request $request){
        if(Auth::check()){
            $id_produk = $request->input('id_produk');
            if(Product::find($id_produk)){
                $wish = new Wishlist();
                $wish->id_produk = $id_produk;
                $wish->id_user = Auth::id();
                $wish->save();
                return response()->json(['status'=>"Produk Berhasil Ditambahkan ke Wishlist"]);
            }
        }else{
            return response()->json(['status'=>"Login terlebih dahulu"]);
        }
    }

    public function hapus($id){
        $chart = Wishlist::find($id);
        $chart->delete();
        return redirect('wishlist');
    }

    public function wishlistcount(){
        $wishcount = Wishlist::where('id_user', Auth::id())->count();
        return response()->json(['count' => $wishcount]);
    }
}
