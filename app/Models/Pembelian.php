<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelians';
    protected $fillable = [
        'penerima',
        'id_user',
        'no_pembelian',
        'tgl_pembelian',
        'telepon',
        'email',
        'alamat',
        'ekspedisi',
        'jenis',
        'estimasi',
        'biaya_ongkir',
        'courier',
        'jumlah_berat',
        'status',
        'total',
    ];
    public function detail_pembelian(){
        return $this->hasMany(Detail_Pembelian::class);
    }
}
