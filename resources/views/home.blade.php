@extends('layouts.admin')

@section('content')
<ol class="breadcrumb">
        <li><a href="/barang"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        
      </ol>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Wellcome To PemBaLab</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
Anda berhasil login sebagai,{{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
