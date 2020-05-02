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

    public function indikatorKd3()
    {
        return $this->hasManyThrough(Indikator::class, KompetensiDasar::class, 'id', 'kompetensidasar_id', 'kd3_id', 'id');
    }

    public function indikatorKd4()
    {
        return $this->hasManyThrough(Indikator::class, KompetensiDasar::class, 'id', 'kompetensidasar_id', 'kd4_id', 'id');
    }
}
