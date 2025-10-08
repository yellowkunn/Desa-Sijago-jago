<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;
    protected $table = 'tentang_kami';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;    
}
