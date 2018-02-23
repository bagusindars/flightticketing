@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar Reservasi</h2>
		<div class="kotak">
			@if(Session::has('berhasil'))
				<div class="alert alert-success">{{ Session::get('berhasil') }}</div>
			@endif

			@php
				$count = 1;
			@endphp
		</div>
		<div class="kotak kotak-manage">
			<div class="box">
				<div class="box-body">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th style="width: 20px">No</th>
								<th>Kode Reservasi</th>
								<th>Pemesan</th>
								<th>Rute</th>
								<th>Memesan</th>
								<th>Tagihan</th>
								<th>Bank</th>
								<th>Status</th>
								<th style="text-align: center;">Action</th>
							</tr>
							@foreach($reservasi as $res)
								<tr>
									<td>{{$count++}}</td>
									<td>{{$res->kode}}</td>
									<td>{{$res->pemesans->nama}}</td>
									<td>{{$res->rutes->from->nama}} - {{$res->rutes->to->nama}}</td>
									<td>{{ count($res->pemesans->customers) }} kursi</td>
									<td><span class="harga">{{number_format($res->price,2)}}</span></td>
									<td>{{$res->bank}}</td>
									<td>
										@if($res->status == 0)
											<span style="color: red">Belum lunas</span>
										@else
											<span style="color: green">Lunas</span>
										@endif
									</td>
									<td class=""  style="display: flex;justify-content: center;">
										<form action="{{request()->root()}}/admin/mreservasi/{{$res->id}}/" method="post">
											<input class="admin-action admin-delete" type="submit" name="submit" value="Delete">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE">
										</form>

									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
  		
    </section>
    <!-- /.content -->
  </div>
@endsection