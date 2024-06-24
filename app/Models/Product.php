<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'product';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'category_id', 'desc', 'img', 'price', 'created_at', 'updated_at'];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
