@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Edit Bandara</h2>
		
  		<div class="row">
	      	<div class="adminp-form">
	      		<form action="{{request()->root()}}/admin/mbandara/{{$bandara->id}}/" method="post">
	      			<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="nama" placeholder="Nama bandara" value="{{$bandara->nama_bandara}}">
		        		<i class="glyphicon glyphicon-qrcode form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" value="{{$bandara->iso}}" class="form-control" required name="iso" placeholder="Nama iso. ex CGK">
		        		<i class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></i>
					</div>

					<div class="form-group  has-feedback">
		        		<select name="kota" id="">
							@foreach($kotas as $kota)

								<option value="{{$kota->id}}" {{ $bandara->kota_id == $kota->id ? 'selected' : ''}} > {{$kota->nama}}</option>		
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