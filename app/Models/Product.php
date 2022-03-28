<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'article',
            'name',
            'status',
            'color',
            'size',
        ];

    public function scopeStatus($query)
    {
        return $query->where('status', '=', 'available');
    }

    public function user(){
        return $this->belongsTo(User::class,'userID');
    }
}
