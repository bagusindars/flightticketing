@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Edit Rute</h2>
		
  		<div class="row">
	      	<div class="adminp-form">
	      		<form action="{{request()->root()}}/admin/mrute/{{$rute->id}}/" method="post">
	      			<div class="form-group  has-feedback">
	      				<label for="depart_at">Keberangkatan</label>
		        		<input type="datetime-local" class="form-control" required name="depart_at" placeholder="Waktu Keberangkatan" value="{{ date('Y-m-d\TH:i', strtotime($rute->depart_at))  }}">
		        		<i class="glyphicon glyphicon-calendar form-control-feedback icon-wlabel"></i>
					</div>
					<div class="form-group  has-feedback">
	      				<label for="depart_at">Tiba</label>
		        		<input type="datetime-local" class="form-control" required name="arrive_at" placeholder="Waktu Tiba" value="{{ date('Y-m-d\TH:i', strtotime($rute->arrive_at))  }}">
		        		<i class="glyphicon glyphicon-calendar form-control-feedback icon-wlabel"></i>
					</div>
					<div class="form-group  has-feedback">
						<label for="rute_from">Dari</label>
		        		<select name="rute_from" id="rute_from" required>
								<option value="" disabled selected>Kota</option>
							@foreach($kotas as $kota)
						<!-- 		<option value="{{$kota->nama}} ({{$kota->iso}})">{{$kota->nama}} ({{$kota->iso}})</option> -->
									<option value="{{$kota->id}}" {{ $rute->rute_from == $kota->id ? 'selected' : ''}}>{{$kota->nama}}</option>		
									
							@endforeach
						</select>
					</div>
					<div class="form-group  has-feedback">
						<label for="bandara1">Bandara</label>
		        		<select name="bandara1" id="bandara1" required>
		        				@foreach($band as $band)
		        					@if($rute->bandara1 == $band->id)
										<option value="{{$band->id}}" >{{$band->nama_bandara}}</option>
									@endif
								@endforeach
						</select>
					</div>
				
					<div class="form-group  has-feedback">
						<label for="rute_to">Tujuan</label>
		        		<select name="rute_to" id="" required>
								<option value="" disabled selected>Kota</option>
							@foreach($kotas as $kota)
								<option value="{{$kota->id}}" {{ $rute->rute_to == $kota->id ? 'selected' : ''}}>{{$kota->nama}}</option>		
							@endforeach
						</select>
					</div>
					<div class="form-group  has-feedback">
						<label for="bandara2">Bandara</label>
		        		<select name="bandara2" id="bandara2" required>

		        			@foreach($band2 as $band)

		        					@if($rute->bandara2 == $band->id)
										<option value="{{$band->id}}" >{{$band->nama_bandara}}</option>
									@endif
								@endforeach
						</select>
					</div>

					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" value="{{$rute->harga}}" required name="harga" placeholder="Harga">
		        		<i class="glyphicon glyphicon-usd form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<select name="plane" id="">
							@foreach($plane as $planes)
								<option value="{{$planes->id}}" {{ $rute->transport_id == $planes->id ? 'selected' : ''}}>{{$planes->name}}</option>		
							@endforeach
						</select>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" value="{{$kursi}}" required name="kursi" placeholder="Jumlah Penumpang" readonly="true">
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