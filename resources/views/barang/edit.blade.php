@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-10">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Barang 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('barang.update',$barang->id) }}" method="post" enctype="multipart/form-data">
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('barang') ? ' has-error' : '' }}">
			  			<label class="control-label">Barang</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $barang->nama_barang }}"  required>
			  			<label class="cc-payment" class="control-label mb-1">Gambar</label>
			  			@if (isset($barang) && $barang->gambar)
			  			<p>
			  				<br>
			  				<img src="{{ asset('assets/img/gambar/'.$barang->gambar )}}" style="max-height:125px;max-width:125px;margin-top:7px;" alt="">
			  			</p>

			  			@endif
			  			<input type="file" name="gambar" value="{{ $barang->gambar }}">
			  			<label class="control-label">Jumlah</label>
			  			<input type="text" name="jumlah" class="form-control" value="{{ $barang->jumlah }}"  required>
			  			@if ($errors->has('barang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('barang') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div> 
</div>
@endsection