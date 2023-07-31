<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member_model extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id_member';

    public function peminjaman()
    {
        return $this->hasOne(peminjaman_model::class);
    }
}
