<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_model extends Model
{
    protected $table = 'kategori_alat';
    protected $primaryKey = 'id_kategori';

    public function alat()
    {
        return $this->hasOne(alat_model::class);
    }
}
