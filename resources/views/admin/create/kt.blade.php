@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar Kota</h2>
		<div class="form-group">
			@if(Session::has('berhasil'))
				<div class="alert alert-success">{{ Session::get('berhasil') }}</div>
			@elseif(Session::has('gagal'))
				<div class="alert alert-danger">{{ Session::get('gagal') }}</div>
			@endif

		</div>
  		<div class="row">
	      	<div class="adminp-form">
	      		<form action="{{request()->root()}}/admin/create/kota" method="post">
	      			
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="nama" placeholder="Nama kota">
		        		<i class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></i>
					</div>

					{{ csrf_field() }}
					<div class="form-group">
						<input type="submit" class="input-submit">
					</div>
					
	      		</form>
	      	</div>
	      	
	      </div>
	      <!-- /.row -->

      
    </section>
    <!-- /.content -->
  </div>
@endsection