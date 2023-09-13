@extends ('layouts.inc.front')

@section('content') 
   
<div class="container">
    <div class="row">
            <div class="row row-produk">
                <h3 class="mb-3 mt-4 fw-semibold text-brown">Permintaan Return Barang<span id="explore"></span></h3>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one">
                    <form method="post" action="{{url('pengajuan-return')}}" enctype="multipart/form-data">
                        @csrf
                    <div class="form-checkout shadow-set p-3 border rounded-3">
                        <div class="shipment">
                            <h6 class="fw-bold">Masukan Detail Permintaan:</h6>
                            <div class="address ms-3">
                            <div class="col-md-12 mb-3">
                            <label for="validationDefault01" class="form-label fw-semibold text-one">Nama </label>
                            <input type="text" class="form-control text-two" name="penerima" id="validationDefault01" value="{{Auth::user()->name}}">
                        </div>
                        <div class="col-md-12 mb-3">
                                <label for="validationDefault01" class="form-label fw-semibold text-one">No Pembelian</label>
                                <select class="form-control" name="no_pembelian">
                                <option selected>-- pilih No Pembelian --</option>
                                @foreach ($beli as $item)
                                    <option value="{{ $item->no_pembelian }}">{{ $item->no_pembelian }}</option>
                                @endforeach
                                </select>

                        </div>
                        <div class="col-md-12 mb-3">
                                <label for="validationDefault01" class="form-label fw-semibold text-one">Tanggal Pembelian</label>
                                <select class="form-control" name="tgl_pembelian">
                                <option selected>-- pilih Tgl Pembelian --</option>
                                @foreach ($beli as $item)
                                    <option value="{{ $item->tgl_pembelian }}">{{ $item->tgl_pembelian }}</option>
                                @endforeach
                                </select>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Telepon</label>
                            <input type="text" class="form-control text-two" name="telepon" id="validationDefault02" value="{{Auth::user()->telepon}}" required>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Detail Alamat Lengkap</label>
                            <textarea class="form-control text-two shadow-sm" type="text" name="alamat" style="min-height: 80px" required>{{Auth::user()->alamat}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto_produk" class="form-label text-one fw-semibold">Foto Produk</label>
                            <div class="">
                                <img src="../asset/img/input-produk.png" class="img-thumbnail shadow rounded-circle p-0 w-25 zoom mb-3" alt="">
                            </div>
                            <input type="file" class="form-control text-two" name="image" id="validationDefault01" required>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center m-0 text-two">
                            <p style="text-align: justify;">Besar file: maksimum 10.000.000 bytes (10 Megabytes).</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Keterangan</label>
                            <textarea class="form-control text-two shadow-sm" type="text" name="keterangan" style="min-height: 70px" required></textarea>
                        </div>
                        <div class="col-12 d-grid gap-2 mt-5 mb-3">
                            <button class="btn btn-hover" type="submit">Submit</button>
                        </div>
                                    
                            <div class="col-md-6 mb-3">
                                    
                                    
                                    </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
                
            
                
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-checkout shadow-set p-3 border rounded-3 ">
                        <div class="count">
                                <h6 class="fw-bold">Info:</h6>
                                <div class="calculator p-3">
                                    <p>Setelah melakukan permintaan return barang, harap konfirmasi ke whatsapp berikut:</p>
                                    <a href="https://wa.link/ywm8wu" class="btn btn-hover">Link Whatsapp</a>
                                </div>
                            </div>
            </div>
            </div>
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one" style="margin-top: 10px;">
                </div>
            </div>
        
@endsection