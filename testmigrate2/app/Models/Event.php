<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id_event';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['nama_event', 'id_kategori', 'tgl_event', 'gambar_event', 'deskripsi_event', 'lokasi_event', 'harga_event', 'kuota_event'];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_event');
    }

}
