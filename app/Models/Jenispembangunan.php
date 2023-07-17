<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenispembangunan extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'jenispembangunans';

    protected $fillable = ['nama_jenis','keterangan'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pembangunans()
    {
        return $this->hasMany('App\Models\Pembangunan', 'jenispembangunan_id', 'id');
    }
    
}
