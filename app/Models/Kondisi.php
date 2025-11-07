<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;

    protected $table = 'kondisi';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_lansia',
        'tanggal',
        'tekanan_darah',
        'nadi',
        'nafsu_makan',
        'status_obat',
        'catatan',
        'status',
    ];

    /**
     * Relasi ke model Datalansia
     */
    public function lansia()
    {
        return $this->belongsTo(Datalansia::class, 'id_lansia');
    }
}
