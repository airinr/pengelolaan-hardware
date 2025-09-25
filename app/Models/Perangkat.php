<?php
// app/Models/DataPerangkat.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPerangkat extends Model
{
    // Nama tabel & primary key kustom
    protected $table = 'data_perangkat';
    protected $primaryKey = 'id_perangkat';

    public $timestamps = false;

    protected $fillable = [
        'nama_perangkat',
        'jumlah',
        'id_lab',
        'tanggal',
    ];

    // Casting tipe data
    protected $casts = [
        'jumlah' => 'integer',
        'tanggal' => 'datetime', 
    ];


    public function scopeSearch($query, $q)
    {
        if (!$q) return $query;
        return $query->where(function ($qq) use ($q) {
            $qq->where('nama_perangkat', 'like', "%{$q}%")
               ->orWhere('id_lab', 'like', "%{$q}%");
        });
    }
}
