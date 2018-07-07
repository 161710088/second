@extends('layouts.admin')
@section('content')
<ol class="breadcrumb">
        <li><a href="/barang"><i class="fa fa-pie-chart"></i> Barang</a></li>
      </ol>
<div class="row">
	<div class="container">
		<div class="col-md-11">
			<div class="panel panel-default">
			  <div class="panel-heading">Data barang
			  	<div class="panel-title pull-right"><a href="{{ route('barang.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
			  		  <th>Gambar Barang</th>
					  <th>Nama Barang</th>
					  <th>Kondisi Barang</th>
					  <th>Jumlah Barang</th>
					  <th colspan="1"><center>Action</center></th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($barang as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td><img src="{{ asset('assets/img/gambar/'.$data->gambar)  }}" style="max-height:125px;max-width:125px;margin-top:7px;"></td>
				    	<td>{{ $data->nama_barang }}</td>
				    	<td>{{ $data->kondisi }}</td>
				    	<td>{{ $data->jumlah }}</td>
						<td>
							<a class="btn btn-warning" href="{{ route('barang.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<form method="post" action="{{ route('barang.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger">Delete</button>
							</form>

						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection