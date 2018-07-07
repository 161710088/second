@extends('layouts.admin')
@section('content')
<ol class="breadcrumb">
        <li><a href="/peminjam"><i class="fa fa-pie-chart"></i> Peminjam</a></li>
        
      </ol>
<div class="row">
	<div class="container">
		<div class="col-md-10">
			<div class="panel panel-default">
			  <div class="panel-heading">Data Peminjaman
			  	<div class="panel-title pull-right"><a href="{{ route('peminjam.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
			  		  <th>Nama Peminjam</th>
					  <th>Nama Barang</th>
					  <th>Jumlah Yang dipinjam</th>
					  <th colspan="1"><center>Action</center></th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($peminjam as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td><p>{{$data->user->name}}</p></td>
				    	<td><p>{{$data->barang->nama_barang}}</p></li></td>
				    	<td>{{ $data->dipinjam }}</td>
						<td>
							<a class="btn btn-warning" href="{{ route('peminjam.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<form method="post" action="{{ route('peminjam.destroy',$data->id) }}">
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