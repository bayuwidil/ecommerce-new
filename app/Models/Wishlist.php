<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = [
        'id_user',
        'id_produk',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'id_produk','id');
    }
}
