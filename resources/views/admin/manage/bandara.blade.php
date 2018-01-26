@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar Bandara</h2>
		<div class="bandara">
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
								<th>Nama</th>
								<th>Kota</th>
								<th>Daftarkan Pada</th>
								<th style="text-align: center;">Action</th>
							</tr>
							@foreach($bandaras as $bandara)
								<tr>
									<td>{{$count++}}</td>
									<td>{{$bandara->nama_bandara}}</td>
									<td>{{$bandara->kota->nama}}</td>
									<td>{{$bandara->created_at->format('d M Y')}}</td>

									<td class=""  style="display: flex;justify-content: center;">
										<a  class="admin-action admin-edit" href="{{request()->root()}}/admin/mbandara/{{$bandara->id}}/edit" style="float: left;">Edit</a>
										<form action="{{request()->root()}}/admin/mbandara/{{$bandara->id}}/" method="post">
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