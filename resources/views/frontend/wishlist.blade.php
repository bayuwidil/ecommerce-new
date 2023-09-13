@extends ('layouts.inc.front')

@section('content') 
        <div class="container mb-4">
            <div class="row row-produk">
                <h3 class="mb-3 mt-4 fw-semibold text-brown">Wishlist <span id="explore"></span></h3>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="table-scroll">
                    @if($wishlist->count() > 0)
                    @foreach($wishlist as $item)
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 mx-1" id="produk-col">
                        <div class="card card-product text-center shadow-sm">
                        <svg height="50" width="200" style="position:absolute;">
                                    <ellipse cx="140" cy="12" rx="12" ry="12"
                                    style="fill:white; margin-left:80%; position:absolute;" />
                                    </svg>
                            <a href="{{url('detail-prod/'.$item->product->id)}}" class="text-decoration-none text-one">
                                <img src="{{asset('asset/uploads/product/'.$item->product->image)}}" class="card-img-top" alt="...">
                                <div class="card-body text-start">
                                    <div class="category-text bg-brown ps-1">
                                        <a href="#" class=" card-info text-decoration-none text-three">{{$item->product->category->nama_kategori}}</a></p>
                                    </div>
                                    <div id="more-char">
                                        <span class="fw-semibold text-one">{{$item->product->name}}</span>
                                    </div>
                                    <p class="fw-bold my-2 text-one" style="font-size: 1rem;">Rp.{{number_format($item->product->harga)}},-</p>
                                    <p class="sm card-info text-two m-0" style="font-size: .7rem;"> SanggarPeni</p>
                                    <button class="btn " style="position:absolute; left:79.5%; bottom:89%;"><a href="{{url('hapus-wish/'.$item->id)}}" style="color:brown;" ><i class="fa fa-regular fa-trash" style="" ></i></a></button>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                    @else
                    <h4>Tidak ada Produk di Wishlist</h4>
                    @endif                 
                </div>
                

            </div>
        </div>
        
    @endsection
    
