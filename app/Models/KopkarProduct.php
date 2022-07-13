<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KopkarProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'product_types_id'
    ];

    public function product_type()
    {
        return $this->belongsTo(ProductType::class, 'product_types_id', 'id');
    }
}
