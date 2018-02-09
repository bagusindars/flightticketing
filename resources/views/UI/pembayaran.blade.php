@extends('layouts.reservation')



@section('content')
<style>
	#bank  img{
		width: 150px;

		padding: 20px;
		margin-bottom: 15px;
	}

</style>
<div class="page-reservasi" style="padding-bottom: 100px">
	<div class="container">
		<div class="container container-2">
			<div class="row">
				<div class="col-md-8">
					<h3 class="title-header">Pembayaran</h3>
					@php
						$totalharga = number_format($rute->harga*$customer->count(),2);
						$random  = strtoupper(str_random(6));
					@endphp
					<form action="" method="post">
						<div class="panel kiri">
							<div class="jumbotron-page-reservasi" style="padding-bottom: 200px">
								<div class="data" style="font-size: 18px">
									Pemesanan tiket atas nama {{$pemesan->nama}}, <br>
									Total kursi yang dipesan : {{count($customer)}} <br>
									Harga 1 tiket : <span class="harga">{{ number_format($rute->harga,2)}}</span> <br>
									Total Pembayaran : <span class="harga">{{ $totalharga }}</span>
								</div>
								<div class="form-group">
									<label for="">Pilih Bank</label>
									<select name="bank" id="bank" required="true">
										<option disabled selected value="">Bank</option>
										<option value="Mandiri">Mandiri</option>
										<option value="BCA">BCA</option>
										<option value="BNI">BNI</option>
										<option value="Danamon">Danamon</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Kode Pemesanan</label>
									<input type="text" value="{{$random}}" readonly="true" class="form-control" name="kode">
									*Pastikan anda mengingatnya untuk konfirmasi
								</div>
								
								<div class="col-md-12" class="bank" id="bank"> 
									<div class="col-md-3">
										<img src="{{asset('images/logo/mandiri.png')}}" alt="">
										<h4>Atas Nama : XTravel</h4>
										<h5>No Rekening : 90876576 M</h5>
									</div>

									<div class="col-md-3">
										<img src="{{asset('images/logo/bca.png')}}" alt="">
										<h4>Atas Nama : XTravel</h4>
										<h5>No Rekening : 90657876 B</h5>
									</div>
									<div class="col-md-3">
										<img src="{{asset('images/logo/bni.png')}}" alt="">
										<h4>Atas Nama : XTravel</h4>
										<h5>No Rekening : 90876576 B</h5>
									</div>
									<div class="col-md-3">
										<img src="{{asset('images/logo/danamon.png')}}" alt="">
										<h4>Atas Nama : XTravel</h4>
										<h5>No Rekening : 97657876 D</h5>
									</div>
								</div>
								
							</div>
							<div class="clear"></div>
						</div>
						{{ csrf_field() }}
						<div class="form-group">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="submit" class="input-submit" value="OK" style="margin-top: 10px;float: right;font-size:18px;padding: 10px 35px;background-color: #0770CD;color: white;border:none;font-weight: bold">
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<h3 class="title-header">Rute</h3>
					<div class="panel  kanan">
						<div class="jumbotron-page-reservasi">
							<div class="caption" style="border-bottom: 1px solid #dadada;padding-bottom: 10px;font-weight: bold">
								<span style="font-size: 18px;margin-left: 5px">{{$rute->from->nama}} ({{$rute->band1->iso}})
								<img src="{{asset('images/plane.png')}}" alt="" width="25px" style="margin-left: 10px;margin-right: 10px">
								 {{$rute->to->nama}} ({{$rute->band2->iso}})</span>
								<br>
							</div>
							<div class="tgl" style="padding: 7px;font-size: 17px;margin-top: 6px;font-weight: bold;" >
								{{date('D , d M Y',strtotime($rute->depart_at))}}
								<span style="margin-left: 3px;border-left: 1px solid #dadada;padding-left: 5px">{{$rute->plane->name}} {{$rute->plane->code}}</span>
								<span class="glyphicon glyphicon-chevron-down panah-bawah-reservasi" style="cursor: pointer;float: right;margin-top: 5px" aria-hidden="true"></span>
							</div>
							<div class="datapesan" style="margin-top: 10px;padding: 8px;">
								<img src="/img/logo/{{$rute->plane->logo}}" alt="" width="150px"> <br><br>
								<div class="panel " style="padding: 0px;margin-left: -13px">
									<div class="panel-heading">
										<div class="waktu" style="float: left;font-size: 20px">
											<b>{{date('H:i',strtotime($rute->depart_at))}}</b> <br>
											{{date('d M Y',strtotime($rute->depart_at))}}
										</div>
										<div class="tempat" style="text-align: right;font-size: 19px">
											<b>{{$rute->from->nama}} ({{$rute->band1->iso}}) </b> <br>
											{{$rute->band1->nama_bandara}}
										</div>
									</div>
									<div class="clear"></div>
									<div class="panel-body">
										<div class="waktu" style="float: left;">
											<b>{{date('H:i',strtotime($rute->arrive_at))}}</b> <br>
											{{date('d M Y',strtotime($rute->arrive_at))}}
										</div>
										<div class="tempat" style=";text-align: right;font-size: 19px">
											<b>{{$rute->to->nama}} ({{$rute->band2->iso}}) </b> <br>
											{{$rute->band2->nama_bandara}}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- ROW -->
			
			
		</div><!-- CONTAINER -->
	</div>
</div>

@endsection