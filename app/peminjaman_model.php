<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman_model extends Model
{
    protected $table = 'peminjaman';

    public function member()
    {
        return $this->belongsTo(member_model::class, 'id_member');
    }

    public function alat()
    {
        return $this->belongsTo(alat_model::class, 'id_alat');
    }

    public function user()
    {
        return $this->belongsTo(users_model::class, 'id');
    }
}
