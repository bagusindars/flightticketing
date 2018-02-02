@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Edit Kota</h2>
		
  		<div class="row">
	      	<div class="adminp-form">
	      		<form action="{{request()->root()}}/admin/mkota/{{$kota->id}}/" method="post">
	      			<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="nama" placeholder="Nama kota" value="{{$kota->nama }}">
		        		<i class="glyphicon glyphicon-qrcode form-control-feedback"></i>
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