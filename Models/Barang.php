<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang', 'desc_barang', 'harga_barang', 'id_kategori'
    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'id_barang');
    }
}