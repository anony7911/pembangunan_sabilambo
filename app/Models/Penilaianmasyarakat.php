<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaianmasyarakat extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'penilaianmasyarakats';

    protected $fillable = ['kategoripenilaian_id','pembangunan_id','masyarakat_id','nilai'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kategoripenilaian()
    {
        return $this->hasOne('App\Models\Kategoripenilaian', 'id', 'kategoripenilaian_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function masyarakat()
    {
        return $this->hasOne('App\Models\Masyarakat', 'id', 'masyarakat_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pembangunan()
    {
        return $this->hasOne('App\Models\Pembangunan', 'id', 'pembangunan_id');
    }
    
}
