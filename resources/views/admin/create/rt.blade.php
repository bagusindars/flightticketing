@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar Rute</h2>
		<div class="form-group">
			@if(Session::has('berhasil'))
				<div class="alert alert-success">{{ Session::get('berhasil') }}</div>
			@endif

		</div>
  		<div class="row">
	      	<div class="adminp-form">
	      		<form action="{{request()->root()}}/admin/create/rute" method="post">
	      			<div class="form-group  has-feedback">
	      				<label for="depart_at">Waktu keberangkatan</label>
		        		<input type="datetime-local" class="form-control" required name="depart_at" placeholder="Berangkat pada" value="Berangkat pada">
		        		<i class="glyphicon glyphicon-calendar form-control-feedback icon-wlabel"></i>
					</div>
					<div class="form-group  has-feedback">
						<label for="arrive_at">Tiba</label>
		        		<input type="datetime-local" class="form-control" required name="arrive_at" placeholder="Waktu tiba" value="Berangkat pada">
		        		<i class="glyphicon glyphicon-calendar form-control-feedback icon-wlabel"></i>
					</div>
					<div class="form-group  has-feedback">
						<label for="rute_from">Dari</label>
		        		<select name="rute_from" id="rute_from" required>
								<option value="" disabled selected>Kota</option>
							@foreach($kotas as $kota)
						<!-- 		<option value="{{$kota->nama}} ({{$kota->iso}})">{{$kota->nama}} ({{$kota->iso}})</option> -->
									<option value="{{$kota->id}}">{{$kota->nama}}</option>		
									
							@endforeach
						</select>
					</div>
					<div class="form-group  has-feedback">
						<label for="bandara1">Bandara</label>
		        		<select name="bandara1" id="bandara1" required>
								<option value="" disabled selected>Bandara</option>		
						</select>
					</div>
				
					<div class="form-group  has-feedback">
						<label for="arrive_at">Tujuan</label>
		        		<select name="rute_to" id="" required>
								<option value="" disabled selected>Kota</option>
							@foreach($kotas as $kota)
								<option value="{{$kota->id}}">{{$kota->nama}}</option>		
							@endforeach
						</select>
					</div>
					<div class="form-group  has-feedback">
						<label for="bandara2">Bandara</label>
		        		<select name="bandara2" id="bandara2" required>
								<option value="" disabled selected>Bandara</option>
							
						</select>
					</div>

					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" required name="price" placeholder="Harga">
		        		<i class="glyphicon glyphicon glyphicon-usd form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<select name="plane" id="" required>
								<option value="" disabled selected>Maskapai</option>
							@foreach($planes as $plane)
								<option value="{{$plane->id}}">{{$plane->name}}</option>		
							@endforeach
						</select>
		        		
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control"  required name="kursi" placeholder="Jumlah Penumpang" readonly="true">
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