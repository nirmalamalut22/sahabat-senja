<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datalansia extends Model
{
    use HasFactory;

    protected $table = 'datalansia';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama_lansia',
        'umur_lansia',
        'tempat_lahir_lansia',
        'tanggal_lahir_lansia',
        'jenis_kelamin_lansia',
        'gol_darah_lansia',
        'riwayat_penyakit_lansia',
        'alergi_lansia',
        'obat_rutin_lansia',
        'nama_anak',
        'alamat_lengkap',
        'no_hp_anak',
        'email_anak',
    ];
}
