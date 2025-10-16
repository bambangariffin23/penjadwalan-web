<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Pastikan nama field di sini sesuai kolom di database
     protected $fillable = ['nama_kategori'];
}
