<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata2 extends Model
{
    use HasFactory;

    protected $table = 'paket_wisata2';
    protected $fillable = ['label'];

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'paket_wisata2_id');
    }
}
