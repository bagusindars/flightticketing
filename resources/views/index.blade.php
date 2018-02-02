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
						<li><a href="index.html" class="active"> Home</a></li>
						<li><a href="#about" class="scroll"> About</a></li>
						<li><a href="#portfolio" class="menu scroll">Popular Places<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
							<ul class="nav-sub">
								<li><a href="#portfolio" class="scroll">Place 1</a></li>                                             
								<li><a href="#portfolio" class="scroll">Place 2</a></li>																								
								<li><a href="#portfolio" class="scroll">Place 3</a></li> 
							</ul>
							<script>
								$( "li a.menu" ).click(function() {
								$( "ul.nav-sub" ).slideToggle( 300, function() {
								// Animation complete.
								});
								});
							</script>
						<li><a href="#events" class="scroll"> Events</a></li>
						<li><a href="#mail" class="scroll"> Mail us</a></li>
					
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
			<div class="container">
				<h1>Book Your Best Trip</h1>
				<div class="sap_tabs">	
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
							 
							  <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span><i class="glyphicon glyphicon-plane" aria-hidden="true"></i>Flights</span></li>
							  
							  <div class="clear"></div>
						  </ul>

						  <form action="{{request()->root()}}/jadwal" method="get">			  	 
							<div class="resp-tabs-container">
								
								
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1" style="display: block">
									<div class="facts">
										<div class="flights">
											<div class="reservation">
												<ul>		
													<li  class="span1_of_1 desti1">
														 <div class="book_date">
																<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																<div class="form-group  has-feedback">
												        		<select required style="text-indent: 42px;width: 100%" name="rute_from" id="">
																		<option value="" disabled selected>Dari</option>
																	@foreach($kota as $kotas)
																		<option value="{{$kotas->id}}">{{$kotas->nama}}</option>		
																	@endforeach
																</select>
												        		
															</div>
														 </div>					
													 </li>
													 <li  class="span1_of_1 desti1">
														 <div class="book_date">
																<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																<select required style="text-indent: 42px;width: 100%" name="rute_to" id="">
																		<option value="" disabled selected>Tujuan</option>
																	@foreach($kota as $kotas)
																		<option value="{{$kotas->id}}">{{$kotas->nama}}</option>		
																	@endforeach
																</select>
												        		
														 </div>					
													 </li>
													 <div class="clearfix"> </div>
												</ul>
											</div>
											<div class="reservation">
												<ul>	
													 <li  class="span1_of_1">
														 <h5>Departure</h5>
														 <div class="book_date">
														<form>
															<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
															<input class="date datepicker" name="depart_at" id="datepicker" type="date" value="19/10/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2015';}" required="">
														 </form>
														 </div>		
													 </li>
													 <li  class="span1_of_1 left">
														 <h5>Return</h5>
														 <div class="book_date">
														<form>
															<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
															<input class="date" name="a_at" id="datepicker" type="date" value="19/10/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2015';}" required="">
														 </form>
														 </div>					
													 </li>
													 <div class="clearfix"> </div>
												</ul>
											</div>
											<div class="reservation">
												<ul>
													<li class="span1_of_1 adult">
														 <h5>Penumpang</h5>
													
														 <div class="section_room">
															  <select id="1 Traveller" name="penumpang" onchange="change_country(this.value)" class="frm-field required sect1">
															  		@for($i = 1 ; $i <= 7;$i++)
																	<option value="{{$i}}">{{$i}}</option>
																	@endfor
															  </select>
														 </div>	
													</li>
													<li class="span1_of_1 adult">
															 <h5>Children (0-17)</h5>
															 <!----------start section_room----------->
															 <div class="section_room">
																  <select id="country" onchange="change_country(this.value)" class="frm-field required">
																		<option value="null">1</option>
																		<option value="null">2</option>         
																		<option value="AX">3</option>
																		<option value="AX">4</option>
																		<option value="AX">5</option>
																		<option value="AX">6</option>
																  </select>
															 </div>	
														</li>
														<li class="span1_of_1 adult">
															 <h5>Class</h5>
															 <!----------start section_room----------->
															 <div class="section_room">
																  <select id="country" onchange="change_country(this.value)" class="frm-field required">
																		<option value="null">Economy</option>
																		<option value="null">Business</option>     
																  </select>
															 </div>	
														</li>
													<div class="clearfix"> </div>
												</ul>
											</div>
											<div class="reservation">
												<ul>	
													 <li class="span1_of_3">
															<div class="date_btn">
																
																	<input type="submit" name="search" value="Search Flights" />
																
															</div>
													 </li>
													 <div class="clearfix"></div>
												</ul>
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