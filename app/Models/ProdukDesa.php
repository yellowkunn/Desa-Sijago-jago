<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukDesa extends Model
{
    use HasFactory;
    protected $table = 'produk_desa';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;  
}
