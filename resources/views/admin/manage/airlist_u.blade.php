@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Edit Pesawat</h2>
		
  		<div class="row">
	      	<div class="adminp-form">
	      		<form action="{{request()->root()}}/admin/mairlist/{{$plane->id}}/" method="post">
	      			<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="code" placeholder="Kode Pesawat" value="{{$plane->code }}">
		        		<i class="glyphicon glyphicon-qrcode form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" value="{{$plane->name}}" class="form-control" required name="name" placeholder="Nama Pesawat">
		        		<i class="glyphicon glyphicon-plane form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" value="{{$plane->description}}" required name="deskripsi" placeholder="Deskripsi">
		        		<i class="glyphicon glyphicon-text-color form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" value="{{$plane->seat_qty}}" required name="total_seat" placeholder="Jumlah Penumpang">
		        		<i class="glyphicon glyphicon-user form-control-feedback"></i>
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