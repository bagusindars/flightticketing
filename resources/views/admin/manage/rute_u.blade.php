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
		        		<input type="text" value="{{$rute->rute_from}}" class="form-control" required name="rute_from" placeholder="Dari">
		        		<i class="glyphicon glyphicon-map-marker form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" value="{{$rute->rute_to}}" required name="rute_to" placeholder="Tujuan">
		        		<i class="glyphicon glyphicon-map-marker form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<input type="text" class="form-control" value="{{$rute->harga}}" required name="harga" placeholder="Harga">
		        		<i class="glyphicon glyphicon-usd form-control-feedback"></i>
					</div>
					<div class="form-group  has-feedback">
		        		<select name="plane" id="">
							@foreach($plane as $planes)
								<option value="{{$planes->id}}" {{ old('plane') ==  $planes->id ? "selected" : '' }}>{{$planes->name}}</option>		
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