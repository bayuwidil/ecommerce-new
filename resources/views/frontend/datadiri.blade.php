@extends('layouts.inc.front')

@section('content')
    <section class="py-5 mb-5">
        <div class="container">
            <h3 class="mb-5 fw-semibold text-brown">Biodata Diri</h3>
            <form action="{{url('update-datadiri')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
            @foreach ($data as $item)
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center align-baseline mb-3">
                            <img src="../asset/img/wepik-photo-mode-202276-162011.png" class="img-thumbnail shadow rounded-circle p-0 w-75 zoom"  alt="">
                        </div>
                        <div class="col-md-12 d-flex justify-content-center m-0">
                            <h5 class="fw-bold">{{$item->name}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationDefault01" class="form-label fw-semibold text-one">Nama </label>
                            <input type="text" class="form-control text-two" name="name" id="validationDefault01" value="{{$item->name}}" >
                            
                            @error('name')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault01" class="form-label fw-semibold text-one">Email </label>
                            <input type="email" class="form-control text-two" name="email" id="validationDefault01" value="{{$item->email}}">
                            @error('email')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Telepon</label>
                            <input type="text" class="form-control text-two" name="telepon" id="validationDefault02" value="{{$item->telepon}}">
                            @error('telepon')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault02" class="form-label fw-semibold text-one">Alamat Lengkap</label>
                            <textarea class="form-control text-two shadow-sm" placeholder="masukan alamat lengkap" name="alamat" style="min-height: 100px">{{$item->alamat}}
                            </textarea>
                            @error('alamat')
                                <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <button type="submit" class="btn btn-hover w-100" >Ubah</button>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->
@endsection