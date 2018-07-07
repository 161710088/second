@extends('layouts.admin')
@section('content')
<ol class="breadcrumb">
        <li><a href="/barang"><i class="fa fa-pie-chart"></i> Barang</a></li>
        <li class="active">Create</li>
      </ol>
<div class="row">
	<div class="container">
		<div class="col-md-10">
			<div class="panel panel-default">
			  <div class="panel-heading">Edit Data Barang 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('barang') ? ' has-error' : '' }}">
                        <label for="cc-payment" class="control-label mb-1">Gambar Barang</label>
                        <input name="gambar" type="file" required>
			  			<label class="control-label">Nama Barang</label>	
			  			<input type="text" name="nama_barang" class="form-control" required>
			  			<label class="control-label">Kondisi Barang</label>	
			  			<input type="text" name="kondisi" class="form-control" required>
			  			<label class="control-label">Jumlah Barang</label>
			  			<input type="text" name="jumlah" class="form-control" required>
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