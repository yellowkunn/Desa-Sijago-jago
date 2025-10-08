<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    use HasFactory;
    protected $table = 'destinasi_wisata';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;  
}
