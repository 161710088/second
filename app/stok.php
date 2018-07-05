<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    protected $fillable = ['barang_id', 'user_id', 'is_returned'];
    protected $casts = ['is_returned' => 'boolean',];

    public function b()
	{
		return $this->belongsTo('App\barang');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function scopeReturned($query)
	{
		return $query->where('is_returned', 1);
	}
	
	public function scopeBorrowed($query)
	{
		return $query->where('is_returned', 0);
	}
}
