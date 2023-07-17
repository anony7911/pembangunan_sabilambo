<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'masyarakats';

    protected $fillable = ['nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','alamat','rt','rw','user_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penilaianMasyarakats()
    {
        return $this->hasMany('App\Models\PenilaianMasyarakat', 'masyarakat_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
