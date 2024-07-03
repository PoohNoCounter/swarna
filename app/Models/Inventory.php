<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'inventory';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'name', 'type_id', 'desc', 'img', 'created_at', 'updated_at'];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
