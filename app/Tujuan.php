<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kd3()
    {
        return $this->belongsTo(KompetensiDasar::class);
    }

    public function kd4()
    {
        return $this->belongsTo(KompetensiDasar::class);   
    }

    public function indikator3()
    {
        return $this->hasMany(Indikator::class, 'kompetensidasar_id', 'kd3_id');
    }
}
