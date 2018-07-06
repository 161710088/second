<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = ['nama_barang','gambar','jumlah'];
    public $timestamps = true;

 public function peminjam() 
    {
		return $this->hasMany('App\peminjam','barang_id');
	}
}
