@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar Bandara</h2>
		<div class="form-group">
			@if(Session::has('berhasil'))
				<div class="alert alert-success">{{ Session::get('berhasil') }}</div>
			@endif

		</div>
  		<div class="row">
	      	<div class="adminp-form">
	      		<form action="{{request()->root()}}/admin/create/bandara" method="post">
	      			
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="nama" placeholder="Nama Bandara">
		        		<i class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></i>
					</div>

					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="iso" placeholder="Nama IATA. ex CGK">
		        		<i class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></i>
					</div>

					<div class="form-group">
						<select name="kota" id="">
							<option value="" disabled selected>Kota</option>
						@foreach($kotas as $kota)
							<option value="{{$kota->id}}">{{$kota->nama}}</option>		
						@endforeach
					</select>
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