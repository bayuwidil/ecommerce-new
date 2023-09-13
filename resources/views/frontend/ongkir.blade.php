<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->


    
    
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
    <div class="container">



    
    <div class="row">
            <div class="row row-produk">
                <h3 class="mb-3 mt-4 fw-semibold text-brown">Halaman Ongkos Kirim<span id="explore"></span></h3>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one">
                    <div class="form-checkout shadow-set p-3 border rounded-3">
                        <div class="shipment">
                            <div class="address ms-3">
                                <form action="/ongkir" method="GET" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                    <div class="form-group">
                                    <h6>Total Berat :</h6>
                                    <input class="form-control" type="text" name="berat" value=" {{$belii->jumlah_berat}} gram."  >
                                    </div>    

                                    <div class="form-group mt-3">
                                        <h6>Provinsi Tujuan :</h6>
                                        <select name="province_to" class="form-control">
                                            <option value="" holder>Pilih Provinsi</option>
                                            @foreach($provinsi as $result)
                                            <option value="{{$result->id}}">- {{$result->province}} -</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <h6>Kota Tujuan :</h6>
                                        <select name="destination" class="form-control">
                                            <option value="" holder>- Pilih Kota-</option>
                                        </select>
                                    </div>
                                        <h6>Pilih Kurir :</h6>
                                        <select name="courier" class="form-control">
                                            <option value="" holder>- Pilih Ekspedisi -</option>
                                            <option value="jne">JNE</option>
                                            <option value="tiki">TIKI</option>
                                            <option value="pos">POS</option>
                                        </select>
                                    </div>
                                    <div class="row mt-3 mb-3">
                                        <div class="col">
                                            <button type="submit" class="btn btn-success">Cek Ongkir</button> 
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-one text-one">
        @if($cekongkir)
            <div class="row">
            <div class="col">
            <table class="table table-striped table-hover" width="100%">
                <thead>
                    <tr>
                        <th>Ekspedisi</th>
                        <th>Service</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Estimasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                
                <tbody>
                    @foreach($cekongkir as $result)
                    <tr>
                        <form method="post" class="d-inline" action="/save">
                        @foreach($ceknamaongkir as $item)
                        <td>{{$item['name']}}</td>
                        <input type="hidden" name="name" value="{{$item['name']}}">
                        @endforeach
                        <td>{{$result['service']}}</td>
                        <input type="hidden" name="service" value="{{$result['service']}}">
                        <td>{{$result['description']}}</td>
                        <td>{{ $result['cost'][0]['value'] }}</td>
                        <input type="hidden" name="cost" value="{{$result['cost'][0]['value']}}">
                        <td>{{ $result['cost'][0]['etd'] }} Hari</td>
                        <input type="hidden" name="etd" value="{{$result['cost'][0]['etd']}}">
                        <td>
                        
                        @csrf
                        <button type="submit" class="btn btn-success">Pilih Ekspedisi</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        </div>
        @else

        @endif
        </div>
            </div>
    </div>
</div>

<script type="text/javascript">
        $('select[name="province_to"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: 'getCity/ajax/' + cityId,
                    type : "GET",
                    dataType : "json",
                    success: function (data) {
                        $('select[name="destination"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="destination"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="origin"]').empty();
            }
        });

    </script>

<script>
    $(document).ready(function(){
        loadcart();
        loadwishlist();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    });

    function loadcart(){
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function(response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
                // console.log(response.count)
            } 
        });
    }

    function loadwishlist(){
        $.ajax({
            method: "GET",
            url: "/load-wishlist-data",
            success: function(response){
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
                // console.log(response.count)
            } 
        });
    }
</script>