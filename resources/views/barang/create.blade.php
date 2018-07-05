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
			  	<form action="{{ route('barang.store') }}" method="post" >
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('barang') ? ' has-error' : '' }}">
			  			<label class="control-label">Barang</label>	
			  			<input type="text" name="nama" class="form-control" required>
			  			<label class="control-label">Jumlah</label>
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