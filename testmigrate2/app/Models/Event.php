<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id_event';
    public $timestamps = false;

    protected $fillable = [
        'nama_event',
        'tgl_event',
        'gambar_event',
        'deskripsi_event',
        'lokasi_event',
        'kuota_event'
    ];

    use HasFactory;
}
