<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasipembangunan extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'realisasipembangunans';

    protected $fillable = ['pembangunan_id','pelaksana','tanggal_mulai','tanggal_selesai','persentase'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pembangunan()
    {
        return $this->hasOne('App\Models\Pembangunan', 'id', 'pembangunan_id');
    }
    
}
