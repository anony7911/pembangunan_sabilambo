<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'penilaians';

    protected $fillable = ['pembangunan_id','user_id','rata_rata','komentar'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pembangunan()
    {
        return $this->hasOne('App\Models\Pembangunan', 'id', 'pembangunan_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
