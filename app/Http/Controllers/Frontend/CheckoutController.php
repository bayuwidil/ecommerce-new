<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Detail_Pembelian;
use App\Models\Keranjang;
use App\Models\Pembelian;
use App\Models\pengembalian;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class CheckoutController extends Controller
{
    public function index(){
        $chartitem = Keranjang::where('id_user',Auth::id())->get();
        
        $q = DB::table('pembelians')->select(DB::raw('MAX(RIGHT(no_pembelian,4)) as kode'));
        $kt = "";
        if($q->count() > 0){
            foreach($q->get() as $k){
                $tmp = ((int) $k->kode)+1;
                $kt = sprintf("%04s",$tmp);
            }
        }
        else{
            $kt = "0001";
        }
        return view('frontend.checkout', compact('chartitem','kt'));
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    public function cekongkir(Request $request){
        
        if($request->destination && $request->courier  ){
            
            $belii = Pembelian::where('id_user',Auth::id())->where('ekspedisi',null)->first();
            
            
            $origin = 501;
            $destination = $request->destination;
            $weight = $belii->jumlah_berat;
            $courier = $request->courier;

            $response = Http::asForm()->withHeaders([
            'key' => '4f464d784cc4a53acfa919eda993c9c1'    
            ])->POST('https://api.rajaongkir.com/starter/cost' ,[
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier
            ]);
            
            $ceknamaongkir = $response['rajaongkir']['results'];
            $cekongkir = $response['rajaongkir']['results'][0]['costs'];
            
        }
        else{
            $origin = '';
            $destination = '';
            $weight = '';
            $courier = '';
            $cekongkir = null;

            $ceknamaongkir = '';
        }
        
        $belii = Pembelian::where('id_user',Auth::user()->id)->where('ekspedisi',null)->first();
        $provinsi = Province::all();
        $chartitem = Keranjang::where('id_user', Auth::id())->get()->first();
        
        return view('frontend.ongkir', compact('chartitem','provinsi','cekongkir','ceknamaongkir','belii'));

        }
        public function ajax($id){
            $cities = City::where('province_id' ,'=', $id)->pluck('city_name', 'id');
    
            return json_encode($cities);
        }

        public function simpan(Request $request){

            //dd($request);
    
            $beli = Pembelian::where('id_user',Auth::user()->id)->where('jenis',null)->first();
            $beli->ekspedisi = $request->name;
            $beli->jenis = $request->service;
            $beli->biaya_ongkir = $request->cost;
            $beli->total = $beli->total + $request->cost;

            $beli->estimasi = $request->etd;
            $beli->update();

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $beli->id,
                    'gross_amount' => $beli->total,
                ),
                'customer_details' => array(
                    'name' => $beli->penerima,
                    'no_pembelian' => $beli->no_pembelian,
                    'tgl_pembelian' => $beli->tgl_pembelian,
                    'email' => $beli->email,
                    'phone' => $beli->telepon,
                    'alamat' => $beli->alamat,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $detail_pembelian = Detail_Pembelian::where('id_pembelian',$beli->id)->get();
            
            return view('frontend.detailpesanan',compact('snapToken','beli','detail_pembelian'));
        }





    public function pesan(Request $request){
        $beli = new Pembelian();
        $beli->id_user = Auth::id();
        $beli->penerima = $request->input('penerima');
        $beli->no_pembelian = $request->input('no_pembelian');
        $beli->tgl_pembelian = $request->input('tgl_pembelian');
        $beli->telepon = $request->input('telepon');
        $beli->email = $request->input('email');
        $beli->alamat = $request->input('alamat');
        $beli->total = $request->input('total');
        $beli->jumlah_berat = $request->input('jumlah_berat');
        $beli->status = 'Unpaid';
        $beli->save();


        $chartitem = Keranjang::where('id_user',Auth::id())->get();
        foreach ( $chartitem as $item){
            Detail_Pembelian::create([
                'id_pembelian'=>$beli->id,
                'name'=>$item->product->name,
                'id_produk'=>$item->id_produk,
                'jumlah'=>$item->jumlah,
                'harga'=>$item->product->harga,
            ]);
            $prod = Product::where('id',$item->id_produk)->first();
            
            $prod->stok = $prod->stok - $item->jumlah;
            $prod->update();
        }

        if(Auth::user()->alamat == NULL){
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('penerima');
            $user->telepon = $request->input('telepon');
            $user->alamat = $request->input('alamat');
            $user->update();
        }

        $chartitem = Keranjang::where('id_user',Auth::id())->get();
        Keranjang::destroy($chartitem);


        return redirect('/ongkir');

    }
    
    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                $beli = Pembelian::find($request->order_id);
                $beli->update(['status'=>'Paid']);
            }
        }
    }

    public function invoice($id){
        $beli = Pembelian::find($id);
        $detail_pembelian = Detail_Pembelian::where('id_pembelian',$beli->id)->get();
        return view('frontend.invoice', compact('beli', 'detail_pembelian'));
    }

    // return barang
    public function return(){
        $beli = Pembelian::where('id_user',Auth::id())->get();
        return view('frontend.return', compact('beli'));
    }
    public function kirim(Request $request){
        $kembali = new pengembalian();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('asset/uploads/return',$filename);
            $kembali->image = $filename;
            
        }

        $kembali->penerima = $request->input('penerima');
        $kembali->id_user = Auth::id();
        $kembali->no_pembelian = $request->input('no_pembelian');
        $kembali->tgl_pembelian = $request->input('tgl_pembelian');
        $kembali->telepon = $request->input('telepon');
        $kembali->alamat = $request->input('alamat');
        $kembali->keterangan = $request->input('keterangan');
        $kembali->save();
        return redirect('/permintaan-return');
    }
    

}
