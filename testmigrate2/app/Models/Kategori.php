<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table='kategoris';
    protected $primaryKey = 'id_kategori';
    // protected $guarded=['id'];
    protected $fillable=[

        'nama_kategori',
    ];

    public function events(){
        return $this->hasMany(Event::class,'id_event');
    }
}
