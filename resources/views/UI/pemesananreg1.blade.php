@extends('layouts.reservation')



@section('content')

<div class="page-reservasi" style="padding-bottom: 100px">
	<div class="container">
		<div class="container container-2">
			<div class="row">
		<form action="{{request()->root()}}/pemesanan/{{$rute->id}}/detail2?penumpang={{$_GET['penumpang']}}" method="post">
				<div class="col-md-8 ">
					<h3 class="title-header">Data Pemesan</h3>
					@if(Auth::guest())
					<div class="panel kiri">
						<div class="jumbotron-page-reservasi jumbotron-page-reservasi-1" style="padding: 30px;padding-bottom: 60px;">
							<img src="{{asset('img/logben.png')}}" alt="" style="float: left;margin-right: 30px;margin-top: 7px">
							<div class="caption" style="margin-top: 20px;display: block;">
								<span style="font-weight: bold;">Masuk / Daftar dan nikmati fitur khusus untuk member XTravel
								</span>
								<div class="auth">
									<a href="/login">Masuk</a> atau <a href="/register">Daftar</a>
								</div>
							</div>
						</div>
					</div>
				
					<div class="panel kiri" style="box-shadow: 0px 0px 15px  #DFE2E5">
						<div class="panel-heading" style="border-bottom: 1px solid #dadada">
							<h4 class="title-header">Data Pemesan <span style="float: right;color: #0786DB; font-weight: 0">Isi Data</span></h4>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="">Nama Lengkap</label>
								<input type="text" class="form-control" name="namapemesan"required>
								*Sesuai KTP/paspor/SIM (tanpa tanda baca atau gelar)
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="emailpemesan" required>
							</div>
							<div class="form-group">
								<label for="">Jenis Kelamin</label>
								<select name="genderpemesan" id="" class="form-control">
									<option value="Laki-laki">Laki-laki</option>
            						<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">Alamat</label>
								<input type="text" class="form-control" name="alamatpemesan" required>
								*Sesuai KTP/paspor/SIM
							</div>
							<div class="form-group">
								<label for="">Kode</label>
								<input type="text" class="form-control" name="kode" required>
								*Tentukan kode anda(bebas). ex : lpjweud. Pastikan anda mengingatnya
							</div>
							<div class="form-group">
								<input type="hidden" name="rute_id" value="{{$rute->id}}">
							</div>
							<div class="form-group">
								<label for="">No. Handphone</label>
								<input type="text" class="form-control" name="phonepemesan" required placeholder="+628568789">
							</div>
						</div>
					</div>

					@else
						<div class="panel kiri">
							<div class="panel-body">
								<h4>Nama : {{Auth::user()->name}}</h4>
								<h4>Email : {{Auth::user()->email}}</h4>
								<h4>Alamat : {{Auth::user()->alamat}}</h4>
								<h4>No. Hp : {{Auth::user()->phone}}</h4>
								<div class="form-group">
									<label for="">Kode Pemesan</label>
									<input type="text" class="form-control" name="kodepemesanuser" required>
									*Tentukan kode anda(bebas). ex : lpjweud. Pastikan anda mengingatnya
								</div>
							</div>
						</div>
					@endif
					
					<h3 class="title-header" style="margin-top: 50px">Detail Wisatawan</h3>

					@for($i = 1; $i <= $_GET['penumpang'] ; $i++)
					<div class="panel kiri" style="box-shadow: 0px 0px 15px  #DFE2E5">
						<div class="panel-heading" style="border-bottom: 1px solid #dadada">
							<h4 class="title-header">Penumpang {{$i}}<span style="float: right;color: #0786DB; font-weight: 0">Isi Data</span></h4>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="">Nama Lengkap</label>
								<input type="text" class="form-control" name="namacustomer[{{$i}}]" required>
								*Nama lengkap (sesuai KTP/SIM/Paspor)
							</div>
							<div class="form-group">
								<label for="">Jenis Kelamin</label>
								<select name="gendercustomer[{{$i}}]" id="" class="form-control">
									<option value="Laki-laki">Laki-laki</option>
            						<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					@endfor
					{{ csrf_field() }}
					<div class="form-group">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" class="input-submit" value="Lanjutkan" style="margin-top: 10px;float: right;font-size:18px;padding: 10px 35px;background-color: #0770CD;color: white;border:none;font-weight: bold">
					</div>
				</div>
			</form>

				<div class="col-md-4">
					<h3 class="title-header">Pesanan Anda</h3>
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