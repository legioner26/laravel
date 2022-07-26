<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'images',
        'price'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function scopeSortBy($query, $request)
    {
        if (isset($request['asc'])) {
            $query->orderBy($request['asc'], 'ASC');
            return $query;
        }

        return $query->orderBy($request['desc'] ?? 'created_at', 'DESC');
    }
}
