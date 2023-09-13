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
            <h3 class="mb-3 fw-semibold text-brown">Data Penjualan <span></span></h3>
            <div class="my-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-brown" style="color:white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ekspor
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/ekspor-penjualan" method="POST">
                            @csrf
                            <div class="row">
                            <div class="col-md-12 mb-3 ">
                                <label for="start_date" class="form-label fw-semibold text-one ms-4">Tanggal Awal:</label>
                                <input type="date" class=" form-control text-two w-100 ms-1 " id="start_date" name="start_date">
                                
                                <label for="end_date" class="form-label fw-semibold text-one ms-4">Tanggal Akhir:</label>
                                <input type="date" class="form-control text-two w-100 ms-1" id="end_date" name="end_date">

                                
                            </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
            <div class="row">
                <div class="col-12">
                    <div class="data_table">
                    <form action="/filter-data" method="POST">
                            @csrf
                            <div class="row">
                            <div class="col-md-12 mb-3 d-flex justify-content-start">
                                <input type="date" class=" form-control text-two w-25 ms-1 " id="start_date" name="start_date">
                                <input type="date" class="form-control text-two w-25 ms-1" id="end_date" name="end_date">

                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                            </div>
                    </form>
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="text-five">
                                <tr>
                                    <th>No Pembelian</th>
                                    <th>Tgl Pembalian</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                    @foreach ($beli as $item)
                                        <tr>
                                            <td>{{$item->no_pembelian}}</td>
                                            <td>{{$item->tgl_pembelian}}</td>
                                            <td>{{$item->penerima}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td>Rp.{{number_format($item->total)}}</td>
                                            
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
