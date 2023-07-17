<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoripenilaian extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'kategoripenilaians';

    protected $fillable = ['nama_kategori','keterangan'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penilaianmasyarakats()
    {
        return $this->hasMany('App\Models\Penilaianmasyarakat', 'kategoripenilaian_id', 'id');
    }
    
}
