<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
    protected $table = 'peminjams';
    protected $fillable = ['dipinjam','user_id','barang_id'];
    public $timestamps = true;

    public function barang() 
    {
        return $this->belongsTo('App\barang','barang_id');
    }
	public function user()
    {
    	return $this->belongsTo('App\user','user_id');
    }
}
