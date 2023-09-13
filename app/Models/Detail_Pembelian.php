<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Pembelian extends Model
{
    use HasFactory;
    protected $table = 'detail_pembelians';
    protected $fillable = [
        'id_pembelian',
        'id_produk',
        'name',
        'jumlah',
        'harga',
        'total',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'id_produk','id');
    }
    public function pembelian(){
        return $this->belongsTo(Pembelian::class,'id_pembelian','id');
    }
}
