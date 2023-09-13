<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalians';
    protected $fillable =[
        'penerima',
        'id_user',
        'no_pembelian',
        'tgl_pembelian',
        'telepon',
        'alamat',
        'keterangan',
        'image',

    ];
}
