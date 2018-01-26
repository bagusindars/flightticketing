@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<h2 style="text-align: center;">Daftar User</h2>
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
								<th>Nama</th>
								<th>Email</th>
								<th>Terakhir aktif</th>
								<th>Dibuat pada</th>
								<th style="text-align: center;">Action</th>
							</tr>
							@foreach($users as $user)
								<tr>
									<td>{{$count++}}</td>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->last_activity}}</td>
									<td>{{$user->created_at->format('d M Y') }}</td>
									
									<td>
									@if($user->role == 'user')
										<form action="{{request()->root()}}/admin/muser/{{$user->id}}/" method="post" style="text-align:  center;">
											<input class="admin-action admin-delete" type="submit" name="submit" value="Delete">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="DELETE">
										</form>
									@else
										<h5 style="text-align: center;">Admin</h5>
									@endif
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