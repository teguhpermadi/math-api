<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kompetensi_dasar()
    {
        return $this->belongsTo(KompetensiDasar::class);
    }
}
