<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    
    <title>SanggarPeni</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="../asset/css/style-slick.css">
    <link rel="stylesheet" href="../asset/css/style-detail.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>

    <div class="header d-flex align-items-center p-0">
            <div class="container" >
                <div class="item-header-1 d-flex justify-content-between align-items-center" style="font-size:12px; ">
                    <div class="d-flex">
                        <span class="me-3"><i class="fa fa-mobile-phone" aria-hidden="true"></i> Download SanggarPeni App</span>
                        <!--
                        <span>
                            <a href="" class="me-2 text-two"><i class="fa-brands fa-facebook"></i></a>
                            <a href="" class="me-2 text-two"><i class="fa-brands fa-instagram"></i></a>
                            <a href="" class="me-2 text-two"><i class="fa-brands fa-youtube"></i></a>
                        </span>
                        -->
                    </div>
                    <div class="d-flex">
                        <span class="me-2">Tentang Kami</span>
                        <span>Kontak</span>
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.inc.sidebarFront')
    <section class="py-5 mb-5">
        <div class="container">
            @php 
            $total=0;
            @endphp
        <div class="row">
            <div class="row row-produk">
                <h3 class="mb-3 mt-4 fw-semibold text-brown">Checkout<span id="explore"></span></h3>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one">
                    
                    <div class="form-checkout shadow-set p-3 border rounded-3">
                        <div class="shipment">
                            <h6 class="fw-bold">Detail Pengiriman:</h6>
                            <div class="address ms-3">
                            <div class="col-md-12 mb-3">
                            <label for="validationDefault01" class="form-label fw-semibold text-one">Nama </label>
                            <input type="text" class="form-control text-two" name="penerima" id="validationDefault01" value="{{$beli->penerima}}"readonly>
                            </div>
                            </div></div>
                        <div class="col-md-12 mb-3" hidden="">
                                <label for="validationDefault01" class="form-label fw-semibold text-one">No Pembelian</label>
                                <input type="text" class="form-control text-two" name="no_pembelian" id="validationDefault01" value="{{$beli->no_pembelian}}" readonly>
                        </div>
                        <div class="col-md-12 mb-3" hidden="">
                                <label for="validationDefault01" class="form-label fw-semibold text-one">Tanggal Pembelian</label>
                                <input type="date" class="form-control text-two" name="tgl_pembelian" id="validationDefault01" value="{{$beli->tgl_pembelian}}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault01" class="form-label fw-semibold text-one">Email </label>
                            <input type="email" class="form-control text-two" name="email" id="validationDefault01" value="{{$beli->email}}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Telepon</label>
                            <input type="text" class="form-control text-two" name="telepon" id="validationDefault02" value="{{$beli->telepon}}" readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Detail Alamat Lengkap</label>
                            <textarea class="form-control text-two shadow-sm" placeholder="Leave a comment here" name="alamat" style="min-height: 100px" readonly>
                            {{$beli->alamat}}
                            </textarea>
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
                        @foreach ($detail_pembelian as $detail)
                            <tr>
                                <td class="text-start fw-semibold"><img src="{{asset('asset/uploads/product/'.$detail->product->image)}}" class="rounded-3 shadow-sm me-2 img-sizing" alt="">{{$detail->name}}</td>
                                <td class="align-middle fw-semibold">{{$detail->jumlah}}</td>
                                <td class="align-middle fw-semibold">Rp.{{number_format($detail->harga)}}</td>
                            </tr>
                            @php 
                            $total += ($detail->harga * $detail->jumlah);
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
                                                <td class="align-middle fw-semibold text-end">Rp.{{number_format($beli->biaya_ongkir)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table class="table text-center borderless">
                                        <tbody class="text-one">
                                            <tr>
                                                <td class="text-start fw-light text-two" colspan="2">Total :</td>
                                                <td class="align-middle fw-semibold text-end">Rp.{{number_format($beli->total)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="paymnet-method d-flex justify-content-end">
                                        <button type="submit" class="btn btn-hover" id="pay-button" style="margin-right: 10px;">Bayar</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one" style="margin-top: 10px;">
                </div>
            </div>
        </div>
    </section>
            
    <footer class="bg-blue text-light pt-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-4">
                    <div class="card border-0 bg-dark">
                        <div class="card-body bg-blue text-justify" style="text-align: justify;"> 
                            <h5 class="card-text fw-bold">SanggarPeni</h5>
                            <p class="card-text">SanggarPeni merupakan produsen kerajinan batik kayu. Memproduksi aneka macam kerajinan, seperti aksesoris, home decor hingga perabotan rumah tangga. Sanggar Peni telah berdiri sejak tahun 1989</p>
                        </div>
                    </div>
                </div>   
    
                <div class="col-md-4">
                    <div class="card border-0 bg-dark">
                        <div class="card-body bg-blue text-left">
                            <h5 class="card-text fw-bold"><a name="kontak">Kontak Kami</a></h5>
                            <div class="d-flex justify-content-start mb-2">
                                <div class="">
                                    <i class="fas fa-envelope me-3"></i>
                                </div>
                                <div class="">
                                    <p class="card-text">sanggarpeni@yahoo.com</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-2">
                                <div class="">
                                    <i class="fas fa-phone me-3"></i>
                                </div>
                                <div class="">
                                    <p class="card-text">+6285743779847</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-2">
                                <div class="">
                                    <i class="fa-solid fa-location-dot me-3"></i>
                                </div>
                                <div class="">
                                    <p class="card-text">Krebet RT 05, Krebet, Sendangsari, Kec. Pajangan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55751</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
                <div class="col-md-4">
                    <div class="card border-0 bg-dark">
                        <div class="card-body bg-blue text-left">
                            <h5 class="card-text fw-bold">Akses Menu</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="card-text"><a href="/" class="text-decoration-none text-light">Beranda</a></p>
                                    <p class="card-text"><a href="#" class="text-decoration-none text-light">Kategori</a></p>
                                    <p class="card-text"><a href="#" class="text-decoration-none text-light">Keranjang</a></p>
                                    <p class="card-text mb-3"><a href="#" class="text-decoration-none text-light">Profil</a></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text"><a href="$" class="text-decoration-none text-light">Wishlist</a></p>
                                    <p class="card-text"><a href="#" class="text-decoration-none text-light">Riwayat Belanja</a></p>
                                    <p class="card-text"><a href="#" class="text-decoration-none text-light">Syarat & Ketentuan</a></p>
                                    <p class="card-text"><a href="#" class="text-decoration-none text-light">Kebijakan Privasi</a></p>
                                    <p class="card-text"><a href="#" class="text-decoration-none text-light">Tentang</a></p>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>      
            </div>
    
            <div class="row ">
                <div class="col-md-4">
                    <div class="card border-0 bg-dark">
                        <div class="card-body bg-blue text-justify" style="text-align: justify;"> 
                            <h5 class="card-text fw-bold">Download Aplikasi</h5>
                            <p class="card-text">Selain dapat diakses melalui website, Sanggarpeni juga dapat diakses menggunakan aplikasi mobile. Yuk download aplikasi SanggarPeni !</p>
                            <div class="d-flex justify-content-start">
                                <div class="me-3">
                                    <a href="#" class="text-decoration-none"><img src="../asset/img/Google_Play-Badge-Logo 1.png" style="width: 8vw;" alt=""></a>
                                </div>
                                <div class="">
                                    <a href="#" class="text-decoration-none"><img src="../asset/img/App_Store_(iOS)-Badge-Logo 1.png" style="width: 8vw;" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
                <div class="col-md-8">
                    <div class="card border-0 bg-dark">
                        <div class="card-body bg-blue text-justify" style="text-align: justify;"> 
                            <h5 class="card-text fw-bold">Mitra SanggarPeni</h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div> 
            </div>
    
        </div>
        <div class="py-1 mt-4 text-center justify-content-center bg-brown">
            <span class="ps-1">&copy;All Copyrights SanggarPeni</span>
        </div>
    </footer>
    
    
    <!--alert-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <!--Click Img Product-->
    <script type="text/javascript" src="../asset/js/click-img.js"></script>

    <!--Input Button-->
    <script type="text/javascript" src="../asset/js/add-btn.js"></script>

    <!-- JQuery -->
        
        <!--Load More-->
        <script type="text/javascript" src="../asset/js/load-more.js"></script>
    
    <!-- Slick JS CDN-->    
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- End -->
    
    <!-- Script for Slick-->
    <script type="text/javascript" src="../asset/js/slider.js"></script>
    <script type="text/javascript" src="../asset/js/slider-popular.js"></script>
    <script type="text/javascript" src="../asset/js/slider-best-seller.js"></script>
    <!-- End -->
    
    <!-- Script Bootstrap + Icon -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <!-- End -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>

<!-- midtrans -->
<script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            window.location.href = '/invoice/{{$beli->id}}'
            console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
            window.location.href = '/belanja'
          }
        })
      });
    </script>
    <!-- end midtrans -->
    </div>
        
