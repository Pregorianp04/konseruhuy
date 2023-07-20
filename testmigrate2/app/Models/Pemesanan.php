<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table='pemesanans';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = [
        'id_user',
        'id_event',
        'jumlah_pemesanan',
        'total_harga'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori')->through('event');
    }
}
