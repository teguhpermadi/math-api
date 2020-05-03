<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{

    // load librabry hasManyDeep sumber : https://github.com/staudenmeir/eloquent-has-many-deep
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class);
    }

    public function kd3()
    {
        return $this->hasManyDeep(
            KompetensiDasar::class, 
            [Tujuan::class], 
            [
                'id',
                'id',
            ],
            [
                'tujuan_id',
                'kd3_id',
            ]
        );
    }

    public function kd4()
    {
        return $this->hasManyDeep(
            KompetensiDasar::class, 
            [Tujuan::class], 
            [
                'id',
                'id',
            ],
            [
                'tujuan_id',
                'kd4_id',
            ]
        );
    }
    
    public function indikatorKd3()
    {
        return $this->hasManyDeep(
            Indikator::class,
            [Tujuan::class, KompetensiDasar::class],
            [
                'id', // Foreign key on the "tujuans" table.
                'id', // Foreign key on the "kompetensi_dasars" table.
                'kompetensidasar_id', // Foreign key on the "indikators" table.
            ],
            [
                'tujuan_id', // Local key on the "materis" table.
                'kd3_id', // Local key on the "tujuans" table.
                'id', // Local key on the "kompetensi_dasars" table.
            ]
        );
    }

    public function indikatorKd4()
    {
        return $this->hasManyDeep(
            Indikator::class,
            [Tujuan::class, KompetensiDasar::class],
            [
                'id', // Foreign key on the "tujuans" table.
                'id', // Foreign key on the "kompetensi_dasars" table.
                'kompetensidasar_id', // Foreign key on the "indikators" table.
            ],
            [
                'tujuan_id', // Local key on the "materis" table.
                'kd4_id', // Local key on the "tujuans" table.
                'id', // Local key on the "kompetensi_dasars" table.
            ]
        );
    }
}
