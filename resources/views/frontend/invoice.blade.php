<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sanggarpeni</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
  </head>
  <style>
    .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 20px;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;    
  margin-left: 20px;    
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  <body>
    @php
    $total =0;
    $subtotal = 0;
    @endphp
    <header class="clearfix">
      <div id="logo">
        <img src="../asset/img/logoo.png">
      </div>
      @php
      $statusUnpaid = 'Unpaid';
      $statusPaid = 'Paid';
      @endphp
      <h1>INVOICE
      <div class="float-end">
      
      @if ( $beli->status  == $statusUnpaid  )
      <span class="badge bg-danger font-size-20 ms-2" style="color:white; ">Unpaid</span>
      @endif
      @if ( $beli->status  == $statusPaid  )
      <span class="badge bg-success font-size-20 ms-2" style="color:white; ">Paid</span>
      @endif
      
      </div>
      </h1>
      
      <div id="company" class="clearfix">
        <div>Sanggarpeni</div>
        <div>Krebet, Sendangsari, <br>Kec. Pajangan, Kabupaten Bantul, <br>Daerah Istimewa Yogyakarta 55751</div>
        <div>085743779847</div>
        <div>sanggarpeni@yahoo.com</></div>
      </div>
      <div id="project">
        <div><span>Penerima:</span></div>
        <div><span>Nama:</span>{{$beli->penerima}}</div>
        <div><span>Alamat</span>{{$beli->alamat}}</div>
        <div><span>Email</span>{{$beli->email}}</a></div>
        <div><span>No Pembelian</span>{{$beli->no_pembelian}}</div><br>
        <div><span>Tanggal<br> Pesanan</span>{{$beli->tgl_pembelian}}</div>
        <div></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">No</th>
            <th class="desc">Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($detail_pembelian as $detail)
        @php
          $total = ($detail->jumlah * $detail->harga);
          $subtotal += ($detail->jumlah * $detail->harga);
          $no = 1;
          @endphp
          <tr>
            <td class="service">{{$no++}}</td>
            <td class="desc">{{$detail->name}}</td>
            <td class="unit">{{$detail->harga}}</td>
            <td class="qty">{{$detail->jumlah}}</td>
            <td class="total">{{$total}}</td>
          </tr>
          

          @endforeach
          <tr>
            <td colspan="4">Sub Total</td>
            <td class="total">{{$subtotal}}</td>
          </tr>
          <tr>
            <td colspan="4">Ongkir</td>
            <td class="total">{{$beli->biaya_ongkir}}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{$beli->total}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>Catatan</div>
        <div class="notice">barang bisa dikembalikan apabila barang cacat, konfirmasi secara langsung apabila sudah sampai. dan sertakan video pada saat unboxing barang</div>
      </div>
      <div class="d-print-none mt-4">
        <div class="float-end">
            <a href="javascript:window.print()" class="btn btn-success"><i class="fa fa-print"></i></a>
            <a href="{{url('/')}}" class="btn btn-primary w-md">Beranda</a>
        </div>
    </div>
    </main>
    <footer>
      
    </footer>
  </body>
</html>