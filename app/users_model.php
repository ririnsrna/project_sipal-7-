<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function peminjaman()
    {
        return $this->hasOne(peminjaman_model::class);
    }
}
