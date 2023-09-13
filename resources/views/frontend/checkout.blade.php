@extends ('layouts.inc.front')

@section('content') 
   
<div class="container">
    @php 
    $total=0;
    $berat=0;
    @endphp
    <div class="row">
            <div class="row row-produk">
                <h3 class="mb-3 mt-4 fw-semibold text-brown">Checkout<span id="explore"></span></h3>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one">
                    <form method="post" action="{{url('detail-pesanan')}}">
                        @csrf
                    <div class="form-checkout shadow-set p-3 border rounded-3">
                        <div class="shipment">
                            <h6 class="fw-bold">Masukan Detail Pengiriman:</h6>
                            <div class="address ms-3">
                            <div class="col-md-12 mb-3">
                            <label for="validationDefault01" class="form-label fw-semibold text-one">Nama </label>
                            <input type="text" class="form-control text-two" name="penerima" id="validationDefault01" value="{{Auth::user()->name}}">
                        </div>
                        <div class="col-md-12 mb-3" hidden="true">
                                <label for="validationDefault01" class="form-label fw-semibold text-one">No Pembelian</label>
                                <input type="text" class="form-control text-two" name="no_pembelian" id="validationDefault01" value="{{ 'KP-'.date('dmy').'-'.$kt}}" readonly>
                        </div>
                        <div class="col-md-12 mb-3" hidden="true">
                                <label for="validationDefault01" class="form-label fw-semibold text-one">Tanggal Pembelian</label>
                                <input type="date" class="form-control text-two" name="tgl_pembelian" id="validationDefault01" value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault01" class="form-label fw-semibold text-one">Email </label>
                            <input type="email" class="form-control text-two" name="email" id="validationDefault01" value="{{Auth::user()->email}}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Telepon</label>
                            <input type="text" class="form-control text-two" name="telepon" id="validationDefault02" value="{{Auth::user()->telepon}}" required>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Detail Alamat Lengkap</label>
                            <textarea class="form-control text-two shadow-sm" type="text" name="alamat" style="min-height: 80px" required>{{Auth::user()->alamat}}</textarea>
                        </div>
                    
                                    
                            <div class="col-md-6 mb-3">
                                    
                                    
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
                        <tbody class="text-one">
                        @foreach ($chartitem as $item)
                            <tr>
                                <td class="text-start fw-semibold"><img src="{{asset('asset/uploads/product/'.$item->product->image)}}" class="rounded-3 shadow-sm me-2 img-sizing" alt="">{{$item->product->name}}</td>
                                <td class="align-middle fw-semibold">{{$item->jumlah}}</td>
                                <td class="align-middle fw-semibold">Rp.{{number_format($item->product->harga)}}</td>
                            </tr>
                            @php 
                            $total += ($item->product->harga * $item->jumlah);
                            $ongkir = 0;
                            $grand = $total + $ongkir;
                            $berat += ($item->product->berat * $item->jumlah);
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
                                        <tr>
                                            <td><input name="jumlah_berat" value="{{$berat}}" hidden="true"></input></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <table class="table text-center borderless">
                                    <tbody class="text-one">
                                        <tr>
                                            <td class="text-start fw-light text-two" colspan="2">Total :</td>
                                            <td class="align-middle fw-semibold text-end"><input name="total" value="{{$grand}}" hidden="true"> Rp.{{number_format($grand)}}</input></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="paymnet-method d-flex justify-content-end">
                                    <button type="submit" class="btn btn-hover" style="margin-right: 10px;">Selanjutnya</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one" style="margin-top: 10px;">
                
                </div>
            </div>
        
@endsection