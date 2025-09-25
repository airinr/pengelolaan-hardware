<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    //
    protected $table = 'data_labolatorium';
    protected $primaryKey = 'id_lab';

    public $timestamps = false;

    protected $fillable = [
        'nama_lab',
        'tanggal'
    ];

    // Casting tipe data
    protected $casts = [
        'tanggal' => 'datetime', 
    ];

}
