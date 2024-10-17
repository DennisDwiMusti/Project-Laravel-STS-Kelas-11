<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'bioskop', 'name_customer', 'total_price'
    ];

    // Karna migration tidak bisa membaca tipe data array, jadi array di migration(json). agar nantinya bentuk bioskop tetap berupa array (tambah), jadi harus dipastikan dengan $cast
    protected $casts = [
        'bioskop' => 'array'
    ];
}
