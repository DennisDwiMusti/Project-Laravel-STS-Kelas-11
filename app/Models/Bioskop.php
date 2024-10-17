<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bioskop extends Model
{
    use HasFactory;
    // ditambahkan jika nama migration dan nama model tidak sinkron
    // public $table ='bioskop';
    // fillable : nama kolom yang diisi user/bukan diisi auto dari sistem
    // isinya diambil dari : migration
    protected $fillable = [
        'type', 'name', 'price', 'stock'
];
}
