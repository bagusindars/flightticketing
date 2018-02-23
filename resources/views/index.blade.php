<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

@extends('layouts.app')

@section('content')

<!-- banner -->
	<div class="banner">
		<div class="navigation">
			<div class="container-fluid">
				<nav class="pull">
					<ul class="nav">
						<li><a href="/" class="active"> Home</a></li>
						<li><a href="/jadwal"> Pesan Tiket</a></li>					
						<li><a href="/konfirmasi"> Konfirmasi Pembayaran</a></li>
					
					</ul>
				</nav>
			</div>
		</div>
		<div class="header-top">
			<div class="container">
				
				<div class="top-nav">
					<div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
						<a href="#"><img src="images/menu.png" alt=""></a>
					</div>	
				</div>	
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="banner-info">
			<div class="gambar-awal" style="cursor: pointer;">
				<div class="gambar" style="justify-content: center;display: flex;">
					<img src="{{ asset('images/logo/rocket.png') }}"> <br>
				</div>
				<h3 style="text-align: center;color: white;">Touch me if you want to fly</h3>
			</div>
			<div class="container container-homepage" style="width: 87%;display: none;">
				<h1>Book Your Best Trip</h1>
				<div class="sap_tabs" >	
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
							 
							  <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span style="font-size: 20px"><img src="{{ asset('images/logo/rocket.png') }}" style="width: 50px;margin-right: 10px" alt="">Flight with us</span></li>
							  
							  <div class="clear"></div>
						  </ul>

						  <form action="{{request()->root()}}/jadwal" method="get">			  	 
							<div class="resp-tabs-container">
								
								
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1" style="display: block">
									<div class="facts">
										<div class="flights">
											<div class="row">
												<div class="col-md-3">

														 <div class="book_date">
														 		<label for="">Keberangkatan</label>
															
																<div class="form-group  has-feedback">
												        		<select required style="width: 100%" name="rute_from" id="">
																		<option value="" disabled selected>Dari</option>
																	@foreach($kota as $kotas)
																		<option value="{{$kotas->id}}">{{$kotas->nama}}</option>		
																	@endforeach
																</select>
												        		
															</div>
														 </div>					
												</div>
												<div class="col-md-3">
														 <div class="book_date">
														 		<label for="">Tujuan</label>
																
																<select required style="width: 100%" name="rute_to" id="">
																		<option value="" disabled selected>Tujuan</option>
																	@foreach($kota as $kotas)
																		<option value="{{$kotas->id}}">{{$kotas->nama}}</option>		
																	@endforeach
																</select>
												        		
														 </div>					
													 
													 <div class="clearfix"> </div>
											
												</div>
												<div class="col-md-5">
													<div class="reservation">
														<label for="">Tanggal Keberangkatan</label>
														<div class="book_date">
																
																<input class="date datepicker" name="depart_at" id="datepicker" type="date" value="19/10/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2015';}" required="">
														
															 </div>		

													</div>
												</div>
												<div class="col-md-1">
													<div class="reservation">
														<label for="">Penumpang</label>
														
															
																  <select style=" padding: 12px 30px" id="1 Traveller" name="penumpang" onchange="change_country(this.value)" class="frm-field required sect1">
																  		@for($i = 1 ; $i <= 7;$i++)
																		<option value="{{$i}}" style="font-size: 20px">{{$i}}</option>
																		@endfor
																  </select>
															

															<div class="clearfix"> </div>
														</div>
													</div>
											
												<div class="clearfix" style="clear: both;"> </div>
								</div><!--  ===================================== ROW -->
					
												<div class="reservation" style="margin-top: 10px;">
													
															<div class="date_btn">
																
																	<input type="submit" name="search" value="Search Flights" />
																
															</div>
													
													 <div class="clearfix"></div>
													
												</div>
											
										</div>
						
									</form>
									</div>
								</div>
								
				<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
						</script>

				@if(Auth::guest())
				<div class="login">
					<a href="/login">Login</a>
				</div>
				@endif
			</div>
		</div>
	</div>


@endsection