@extends('layouts.reservation')



@section('content')

@php
	$count = 1;
@endphp
<style>
	.cek.activemerah+label{
		color: white;
		background-color: red;
		padding:2px 35px 2px 10px;
		margin-left: -17px;
	}
	.cek.activecus+label{
		color: blue;
		
	}
	.ket .isi,.ket .kosong,.ket .anda{
		padding: 5px 20px;
		float: right;
		margin-left: 5px;
	}
	.ket .isi{
		background-color: red;
		color: white;
	}
	.ket .kosong{
		background-color: #DEDEDE;
		color: #636B6F;
		border:1px solid #C5C7C8;
	}
	.ket .anda{
		background-color: blue;
		color: white;
	}

</style>
<div class="page-reservasi" style="padding-bottom: 100px">
	<div class="container">
		<div class="row">
			<div class="col-md-5">	
				<h3 class="title-header">Masukan email dan kode untuk konfirmasi</h3>
				<div class="panel kiri">
					<form action="{{request()->root()}}/pemesanan/{{$rute->id}}/detailstp2" method="get">
						<div class="panel-body">
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="emailpemesan" required value="{{ !empty($_GET['emailpemesan']) ? $_GET['emailpemesan'] : "" }}">
							</div>
							<div class="form-group">
								<label for="">Kode Pemesan</label>
								<input type="text" class="form-control" name="kodepemesan" value="{{ !empty($_GET['kodepemesan']) ? $_GET['kodepemesan'] : "" }}" required>
							</div>
							<div class="form-group">
								<input type="submit" class="submit-form-jadwal" name="search" value="Cari" />
							</div>
							@if(!empty($pesan))
							<div class="form-group">
								{{$pesan}}
							</div>
							@endif
						</div>
					</form>
				</div>

				@if(!empty($pemesan))
				<h3 class="title-header">Data Pemesan</h3>	
				<div class="panel kanan">
					<div class="panel-body">
						<h4>Nama   	: {{$pemesan->nama}}</h4>
						<h4>Alamat 	: {{$pemesan->alamat}}</h4>
						<h4>Gender 	: {{$pemesan->gender}}</h4>
						<h4>Phone 	: {{$pemesan->phone}}</h4>
						<h4>Memesan {{$customer->count()}} Kursi</h4>
						<h4>{{$pemesan->rutes->from->nama}} ({{$pemesan->rutes->band1->nama_bandara}}) <img src="{{asset('images/plane.png')}}" alt="" width="25px" style="margin-left: 10px;margin-right: 10px"> {{$pemesan->rutes->to->nama}} ({{$pemesan->rutes->band2->iso}})</h4>
					</div>
				</div> <br>
				<h3 class="title-header">Data Wisatawan</h3>
					@foreach($customer as $cus)
						<div class="panel kanan">
							<div class="panel-heading"><h4>Penumpang {{$count++}}</h4></div>
							<div class="panel-body">
								<h4>Nama   	: {{$cus->nama}}</h4>
								<h4>Gender 	: {{$cus->gender}}</h4>
								@if(!empty($cus->kursi))
								<h4>Kursi 	: {{$cus->kursi}}</h4>
								@endif
							</div>
						</div>
					@endforeach
				@endif
				
			</div>

			<div class="col-md-7">
				@php
					$type = ['A'];
				@endphp
				@if(!empty($pemesan))
						<h3 class="title-header">Tentukan tempat duduk</h3>
						<div class="supir" style="margin-bottom: 40px;text-align: center;margin-right: 1px">
							<span class="co-pilot">Co-Pilot</span>
							<span class="pilot">Pilot</span>
						</div>
						<div class="ket">
							<span class="isi">Telah dipesan</span>
							<span class="kosong">Tersedia</span>
							<span class="anda">Anda</span>
						</div> <br>
						<div class="clear"></div>
					<form action="{{request()->root()}}/pemesanan/{{$rute->id}}/detail3?emailpemesan
						={{$_GET['emailpemesan']}}&kodepemesan={{$_GET['kodepemesan']}}" method="post">
						@php
							$seat = array();
							$seatcus = array();
							foreach($allcus as $kur){
								$seat[] = $kur->kursi;
							}
							foreach($customer as $cus){
								$seatcus[] = $cus->kursi;
							}

						@endphp
						@for($i = 1; $i<=$rute->plane->seat_qty; $i++)	
								<div class="col-md-1 col-xs-1">
									@foreach($type as $x)
									<div class="col-md-6">
										<input required type="checkbox"  name="seat[]"  
										@php
										if(in_array($x.$i,$seat)){
											
											if( in_array($x.$i,$seatcus) ){
												echo "class='cek activecus' checked ";
											}else{
												echo "class='cek activemerah' disabled style='display : none' ";
											}
										}
										@endphp
										value="{{$x.$i}}" style="transform: scale(2);" >
										<label for="seat">{{$x.$i}}</label>
									</div>
									@endforeach
								</div>
						@endfor		
					
						
						<div class="clear"></div>
						{{ csrf_field() }}
						<div class="form-group">
							<input type="submit" class="input-submit" value="Lanjutkan" style="margin-top: 10px;float: right;font-size:18px;padding: 10px 35px;background-color: #0770CD;color: white;border:none;font-weight: bold">
						</div>
					</form>
				@endif
			</div>

		</div><!-- ROW -->
	</div><!-- CONTAINER -->
</div>
<script>
	


	$(document).ready(function(){
					
					@if(!empty($customer))
				 		
						var limit = {{$customer->count()}};

						$('input[name="seat[]"]').change(function(){
							if($("input[name='seat[]']:checked").length >= limit){
								if( {{!empty($_GET['emailpemesan']) }} ){
									$("input[name='seat[]']").not(":checked").attr('disabled',$(this));
									
								}
								
	
							}else{
								$("input[name='seat[]']").not(":checked").removeAttr('disabled',$(this));

							}
						});

					@endif
					
	});


</script>
@endsection