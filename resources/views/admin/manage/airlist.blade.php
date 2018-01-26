@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar Pesawat</h2>
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
					<table class="table table-bordered table-mairlist">
						<tbody>
							<tr>
								<th style="width: 20px">No</th>
								<th>Kode Pesawat</th>
								<th>Nama</th>
								<th>Deskripsi</th>
								<th>Penumpang</th>
								<th style="text-align: center;">Action</th>
							</tr>
							@foreach($kendaraan as $plane)
								<tr>
									<td>{{$count++}}</td>
									<td>{{$plane->code}}</td>
									<td>{{$plane->name}}</td>
									<td>{{$plane->description}}</td>
									<td>{{$plane->seat_qty}}</td>
									<td>
										<a class="admin-action admin-edit" href="{{request()->root()}}/admin/mairlist/{{$plane->id}}/edit">Edit</a>
										<form action="{{request()->root()}}/admin/mairlist/{{$plane->id}}/" method="post">
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