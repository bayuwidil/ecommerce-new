@extends ('layouts.inc.front')

@section('content') 
<div class="container">
            @php 
            $total = 0;
            $berat = 0;
            $jumlah = 0;
            @endphp
            <div class="row row-produk">
                <h3 class="mb-3 mt-4 fw-semibold text-brown">Daftar Riwayat Pembelian <span id="explore"></span></h3>
                

                <div class="col-lg-12 col-md-4 col-sm-12 col-xs-8">
                    <div class="count p-3 border rounded-3 shadow-set text-one">
                            <div class="calculator p-3">
                                <table class="table text-center">
                                    <thead class="text-two">
                                        <tr>
                                            <th scope="col" class="text-start fw-normal py-3">Kode Transaksi</th>
                                            <th scope="col" class="fw-normal py-3">Tanggal Pembelian</th>
                                            <th scope="col" class="fw-normal py-3">Nama Penerima</th>
                                            <th scope="col" class="fw-normal py-3">Alamat</th>
                                            <th scope="col" class="fw-normal py-3">status</th>
                                            <th scope="col" class="fw-normal py-3">Total</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @php
                                            $statusUnpaid = 'Unpaid';
                                            $statusPaid = 'Paid';
                                            @endphp
                                            @foreach ($beli as $item)
                                                <tr>
                                                    <td>{{$item->no_pembelian}}</td>
                                                    <td>{{$item->tgl_pembelian}}</td>
                                                    <td>{{$item->penerima}}</td>
                                                    <td>{{$item->alamat}}</td>
                                                    @if ( $item->status  == $statusUnpaid  )
                                                        <td>Menunggu Pembayaran</a></td>
                                                    @endif
                                                    @if ( $item->status  == $statusPaid)
                                                        <td>Lunas</td>
                                                    @endif
                                                    <td>Rp.{{number_format($item->total)}}</td>
                                                    <td>
                                                        <a href="{{url('detail-riwayatpembelian/'.$item->id)}}" class="btn btn-hover">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>

@endsection