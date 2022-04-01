<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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

    public function product()
    {
        return $this->belongsTo(User::class);
    }

}
