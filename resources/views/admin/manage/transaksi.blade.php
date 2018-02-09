@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar Transaksi</h2>
		<div class="kotak">
			@if(Session::has('berhasil'))
				<div class="alert alert-success">{{ Session::get('berhasil') }}</div>
			@endif
		<div class="kotak kotak-manage">
			@php
				$count = 1;
			@endphp
			<div class="box">
				<div class="box-body">
					<table class="table table-bordered table-mairlist" style="text-align: justify;">
						<tbody>
							<tr>
								<th style="width: 20px">No</th>
								<th>Nama Pemesan</th>
								<th>Bukti</th>
								<th>Tanggal</th>
								<th>Rekening</th>
								<th style="text-align: center;">Action</th>
							</tr>
							@foreach($trx as $trx)
								<tr>
									<td>{{$count++}}</td>
									<td>
										{{$trx->reservasis->pemesans->nama}}
									</td>
									<td><img width="200px" height="200px" src="{{asset('img/'.$trx->bukti ) }}" alt="">
									<td>{{ date('D , d M Y',strtotime($trx->tanggal)) }}</td>
									<td>{{$trx->rekening}}</td>
								
									<td>
										<a class="admin-action admin-edit" href="{{request()->root()}}/admin/transaksi/{{$trx->id}}/edit" style="width: 100%; display: block;" >Konfirmasi</a>
										<form action="{{request()->root()}}/admin/transaksi/{{$trx->id}}/" method="post">
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