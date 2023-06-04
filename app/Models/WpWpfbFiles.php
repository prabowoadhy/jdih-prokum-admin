<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WpWpfbFiles extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $fillable = [];
    public $timestamps = false;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('file_name', 'like', '%' . $search . '%')
            ->orWhere('file_path', 'like', '%' . $search . '%');
        });
    }

    public function category()
    {
        return $this->belongsTo(WpWpfbCats::class, 'file_category', 'cat_id');
    }
}
