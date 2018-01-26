@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar Pesawat</h2>
		<div class="form-group">
			@if(Session::has('berhasil'))
				<div class="alert alert-success">{{ Session::get('berhasil') }}</div>
			@endif

		</div>
  		<div class="row">
	      	<div class="adminp-form">
	      		<form action="{{request()->root()}}/admin/create/al" method="post">
	      			<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="code" placeholder="Kode Pesawat">
		        		<i class="glyphicon glyphicon-qrcode form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="name" placeholder="Nama Pesawat">
		        		<i class="glyphicon glyphicon-plane form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="deskripsi" placeholder="Deskripsi">
		        		<i class="glyphicon glyphicon-text-color form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="total_seat" placeholder="Jumlah Penumpang">
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