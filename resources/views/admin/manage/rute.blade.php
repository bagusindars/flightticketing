@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar Rute</h2>
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
								<th>Berangkat pada</th>
								<th>Tiba</th>
								<th>Dari</th>
								<th>Tujuan</th>
								<th>Maskapai</th>
								<th>Harga</th>
								<th style="text-align: center;">Action</th>
							</tr>
							@foreach($rutes as $rute)
								<tr>
									<td>{{$count++}}</td>
									<td>{{date('d M Y. H.i', strtotime($rute->depart_at))}}</td>
									<td>{{date('d M Y. H.i', strtotime($rute->arrive_at))}}</td>
									<td>{{$rute->rute_from}}</td>
									<td>{{$rute->rute_to}}</td>
									<td>{{$rute->plane->name}}</td>
									<td>{{$rute->harga}}</td>
									<td>
										<a  class="admin-action admin-edit" href="{{request()->root()}}/admin/mrute/{{$rute->id}}/edit" style="float: left;">Edit</a>
										<form action="{{request()->root()}}/admin/mrute/{{$rute->id}}/" method="post">
											<input style="margin-top: 10px;" class="admin-action admin-delete" type="submit" name="submit" value="Delete">
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