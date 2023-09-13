<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SanggarPeni</title>


    <link rel="stylesheet" href="../asset/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../asset/css/datatables.min.css">
    <link rel="stylesheet" href="../asset/css/style-slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    


</head>
<body> 

    @include('layouts.inc.sidebar')
    
    <br><br>
<section class="py-5 mb-5">
        <div class="container">
            <h3 class="mb-5 fw-semibold text-brown">Permintaan Pengembalian barang <span id="explore"></span></h3>
            <div class="row">
                <div class="col-12">
                    <div class="data_table">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="text-five">
                                <tr>
                                    <th>Nama</th>
                                    <th>No Pembelian</th>
                                    <th>Tgl Pembelian</th>
                                    <th>Telepon</th>
                                    <th>Foto</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kembali as $item)
                                <tr>
                                    <td>{{$item->penerima}}</td>
                                    <td>{{$item->no_pembelian}}</td>
                                    <td>{{$item->tgl_pembelian}}</td>
                                    <td>{{$item->telepon}}</td>
                                    <td><img src="{{asset('asset/uploads/return/'.$item->image)}}" class="cate-image" alt="image here" ></td>
                                    <td>{{$item->keterangan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Datatables -->
    <script src="../asset/js/jquery-3.6.0.min.js"></script>
    <script src="../asset/js/datatables.min.js"></script>
    <script src="../asset/js/pdfmake.min.js"></script>
    <script src="../asset/js/vfs_fonts.js"></script>
    <script src="../asset/js/custom.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function(){
            var table = $('#example').DataTable({
                
            });
            
            table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
    </script>
