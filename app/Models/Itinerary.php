<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $table = 'itineraries';
    protected $fillable = ['paket_wisata2_id', 'hari', 'waktu', 'deskripsi'];

    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class, 'paket_wisata2_id');
    }
}
