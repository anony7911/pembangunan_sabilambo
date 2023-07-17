<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembangunan extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'pembangunans';

    protected $fillable = ['jenispembangunan_id','nama_pembangunan','lokasi','total_biaya',
                            'sumber_dana','pelaksana','deskripsi','berkas','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jenispembangunan()
    {
        return $this->hasOne('App\Models\Jenispembangunan', 'id', 'jenispembangunan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penilaianmasyarakats()
    {
        return $this->hasMany('App\Models\Penilaianmasyarakat', 'pembangunan_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penilaians()
    {
        return $this->hasMany('App\Models\Penilaian', 'pembangunan_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function realisasipembangunans()
    {
        return $this->hasMany('App\Models\Realisasipembangunan', 'pembangunan_id', 'id');
    }

}
