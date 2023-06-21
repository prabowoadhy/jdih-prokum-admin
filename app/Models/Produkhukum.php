<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkhukum extends Model
{
    use HasFactory;

    protected $table = 'produkhukum';

    protected $fillable = [
        'nama',
        'deskripsi',
        'id_kategori',
        'nama_file',
        'tahun',
        'status',
        'path_file'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%')
            ->orWhere('path_file', 'like', '%' . $search . '%')->orWhere('deskripsi', 'like', '%' . $search . '%')->orWhere('nama_file', 'like', '%' . $search . '%')->orWhere('tahun', 'like', '%' . $search . '%');
        });
    }

    public function category()
    {
        return $this->belongsTo(KategoriProkum::class, 'id_kategori');
    }
}
