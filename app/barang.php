<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = ['nama_barang,jumlah'];
    public $timestamps = true;

public function stoks()
	{
		return $this->hasMany('App\stok');
	}
	
	public function getStockAttribute()
	{
		$borrowed = $this->stoks()->borrowed()->count();
		$stock = $this->amount - $borrowed;
		return $stock;
	}

	public static function boot()
	{
		parent::boot();
		self::updating(function($b)
		{
			if ($b->amount < $b->borrowed) {
				Session::flash("flash_notification", [
				"level"=>"danger",
				"message"=>"Jumlah buku $b->title harus >= " . $b->borrowed
				]);
				return false;
			}
		});
		self::deleting(function($b)
		{
			if ($b->stoks()->count() > 0) {
				Session::flash("flash_notification", [
				"level"=>"danger",
				"message"=>"Buku $b->title sudah pernah dipinjam."
				]);
				return false;
			}
		});
	}
	public function getBorrowedAttribute()
	{
	return $this->stoks()->borrowed()->count();
	}
}
