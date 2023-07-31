<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alat_model extends Model
{
    protected $table = 'alat';
    protected $primaryKey = 'id';

    public function peminjaman()
    {
        return $this->hasOne(peminjaman_model::class);
    }

    public function kategori()
    {
        return $this->belongsTo(kategori_model::class, 'id_kategori');
    }
}
