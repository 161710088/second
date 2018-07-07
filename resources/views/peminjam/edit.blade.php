@extends('layouts.admin')
@section('content')
<ol class="breadcrumb">
        <li><a href="/peminjam"><i class="fa fa-pie-chart"></i> Peminjam</a></li>
        
      </ol>
<div class="row">
	<div class="container">
		<div class="col-md-10">
			<div class="panel panel-default">
			  <div class="panel-heading">Edit Data peminjam 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('peminjam.update',$peminjam->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('dipinjam') ? ' has-error' : '' }}">
			  			<label class="control-label">Jumlah yang di pinjam</label>	
			  			<input type="text" name="dipinjam" class="form-control" value="{{ $peminjam->dipinjam }}" required>
			  			@if ($errors->has('dipinjam'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dipinjam') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<select name="user_id" class="form-control">
			  				@foreach($user as $data)
			  				<option value="{{ $data->id }}" {{ $selecteduser == $data->id ? 'selected="selected"' : ''}}>{{ $data->name }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('user_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama barang</label>	
			  			<select name="barang_id" class="form-control">
			  				@foreach($barang as $data)
			  				<option value="{{ $data->id }}" {{ $selectedbarang == $data->id ? 'selected="selected"' : ''}}>{{ $data->nama_barang }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('barang_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('barang_id') }}</strong>
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