<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProkum extends Model
{
    use HasFactory;
    protected $table = 'kategori_prokum';

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    public function Prokum()
    {
        return $this->hasMany(Produkhukum::class, 'id_kategori');
    }
}
