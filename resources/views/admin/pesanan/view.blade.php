@extends('layouts.admin')

@section('content') 
<div class="container">
    @php 
    $total=0;
    $ongkir=0;
    $grand=0;
    @endphp
    <div class="row">
            <div class="row row-produk">
                <h3 class="mb-3 mt-4 fw-semibold text-brown">Detail<span id="explore"></span></h3>
                <a href="{{url('pesanan')}}" class="btn btn-brown btn-sm " style="color: white; margin-left:95%; width:min-content;">back</a>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one">
                    <div class="form-checkout shadow-set p-3 border rounded-3">
                        <div class="shipment">
                            <h6 class="fw-bold">Detail Pengiriman</h6>
                            <div class="address ms-3">
                            <div class="col-md-12 mb-3">
                            <label for="validationDefault01" class="form-label fw-semibold text-one">Nama </label>
                            <input type="text" class="form-control text-two" name="name" id="validationDefault01" value="{{$pesan->name}}" readonly>
                        </div>
                        <div class="col-md-12 mb-3" hidden="true">
                                <label for="validationDefault01" class="form-label fw-semibold text-one">Kode Transaksi</label>
                                <input type="text" class="form-control text-two" name="kode_transaksi" id="validationDefault01" value="{{$pesan->kode_transaksi}}" readonly>
                            </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault01" class="form-label fw-semibold text-one">Email </label>
                            <input type="email" class="form-control text-two" name="email" id="validationDefault01" value="{{$pesan->email}}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Telepon</label>
                            <input type="text" class="form-control text-two" name="telepon" id="validationDefault02" value="{{$pesan->telepon}}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Kode Pos</label>
                            <input type="text" class="form-control text-two" name="postcode" id="validationDefault02" value="{{$pesan->postcode}}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Alamat Lengkap</label>
                            <textarea class="form-control text-two shadow-sm" placeholder="Leave a comment here" name="alamat" style="min-height: 100px" readonly>
                            {{$pesan->alamat}}
                            </textarea>
                        </div>

                        <!-- kurir -->
                        
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-one">Jasa Pengiriman</label>
                                <select class="form-control kurir" name="courier" >
                                    <option value="" readonly>{{$pesan->courier}}</option>
                                </select>
                            </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <table class="table text-center">
                        <thead class="text-two">
                            <tr>
                                <th scope="col" class="text-start fw-normal py-3">Produk</th>
                                <th scope="col" class="fw-normal py-3">Jumlah</th>
                                <th scope="col" class="fw-normal py-3">Harga</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach($pesan->pesanitem as $item)
                            <tr>
                                <td class="text-start fw-semibold"><img src="{{asset('asset/uploads/product/'.$item->product->image)}}" class="rounded-3 shadow-sm me-2 img-sizing" alt="">{{$item->product->name}}</td>
                                <td class="align-middle fw-semibold">{{$item->jumlah}}</td>
                                <td class="align-middle fw-semibold">Rp.{{number_format($item->product->harga)}}</td>
                            </tr>
                            @php 
                            $total += ($item->product->harga * $item->jumlah);
                            $ongkir = 20000;
                            $grand = $total + $ongkir;
                            @endphp
                            @endforeach
                        </tbody>
                        
                    </table>
                    <div class="form-checkout shadow-set p-3 border rounded-3 ">
                    <div class="count">
                            <h6 class="fw-bold">Ringkasan Belanja</h6>
                            <div class="calculator p-3">
                                <table class="table text-center borderless">
                                    <tbody class="text-one">
                                        <tr>
                                            <td class="text-start fw-light text-two" colspan="2">Sub Total :</td>
                                            <td class="align-middle fw-semibold text-end">Rp.{{number_format($total)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start fw-light text-two" colspan="2">Ongkos Kirim :</td>
                                            <td class="align-middle fw-semibold text-end">Rp.{{number_format($ongkir)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <table class="table text-center borderless">
                                    <tbody class="text-one">
                                        <tr>
                                            <td class="text-start fw-light text-two" colspan="2">Total :</td>
                                            <td class="align-middle fw-semibold text-end"><input name="total" value="" hidden="true">Rp.{{number_format($grand)}}</input></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one" style="margin-top: 10px;">
                
            </div>
        </div>
@endsection