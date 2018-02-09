<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

@extends('layouts.app')

@section('banner')
    <div class="banner1">
        <div class="navigation">
            <div class="container-fluid">
                <nav class="pull">
                    <ul class="nav">
                        <li><a href="/#home" class="active"> Home</a></li>
                        <li><a href="/#about"> About</a></li>
                        <li><a href="/#popular" class="menu">Popular Places<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
                            <ul class="nav-sub">
                                <li><a href="index.html">Place 1</a></li>                                             
                                <li><a href="index.html">Place 2</a></li>                                                                                               
                                <li><a href="index.html">Place 3</a></li> 
                            </ul>
                            <script>
                                $( "li a.menu" ).click(function() {
                                $( "ul.nav-sub" ).slideToggle( 300, function() {
                                // Animation complete.
                                });
                                });
                            </script>
                        <li><a href="/"> Events</a></li>
                        <li><a href="/#mail"> Mail us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="header-top">
            <div class="container">
                 <!-- <p class="label-banner">Jadwal dan Pencarian</p> -->
                <div class="top-nav">
                    <div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
                        <a href="#"><img src="{{asset('images/menu.png')}}" alt=""></a>
                    </div>  
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="container">
            <div class="box-reservasi">
                <h3>Penerbangan dari {{$rute->from->nama}} ke {{$rute->to->nama}}</h3>
                <h4>{{date('D , d M Y ' , strtotime($rute->depart_at))}}</h4>
                <div class="data">
                    <p>
                        {{$rute->from->nama}} ({{$rute->band1->iso}})
                        <img src="{{asset('images/plane.png')}}" alt="">
                        {{$rute->to->nama}} ({{$rute->band2->iso}})
                        <span style="padding-left: 10px;margin-left: 10px;border-left: 1px solid #dadada">{{$_GET['penumpang']}} Penumpang</span>
                    </p>

                </div>
            </div>
        </div>
    </div>
<!-- banner -->

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="box-reservasi box-reservasi2">
                <div class="data">
                    <p>
                        {{$rute->from->nama}} ({{$rute->band1->iso}})
                        <img src="{{asset('images/plane.png')}}" alt="">
                        {{$rute->to->nama}} ({{$rute->band2->iso}})
                        <span style="margin-left: 10px;padding-left: 10px;border-left: 1px solid #dadada">{{$rute->plane->name}} {{$rute->plane->code}}</span>
                    </p>
                    <h5>
                        {{date('D , d M Y',strtotime($rute->depart_at))}}
                    </h5>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="plane">
                            <img style="width: 150px;margin-left: -2px" src="{{asset('img/logo/'.$rute->plane->logo)}}" alt="" >
                        </div>
                    </div>
                    <div class="row">
                         @php
                            $start = new DateTime($rute->depart_at);
                            $end   = new DateTime($rute->arrive_at);
                            $diff  = $start->diff($end);

                        @endphp
                        <div class="jam" style="font-size: 18px;margin-left: -5px;margin-top: 10px;">
                            <div class="col-md-3 col-xs-3 dari">
                                {{date('H:i',strtotime($rute->depart_at))}} <br>
                                {{$rute->band1->nama_bandara}} ({{$rute->band1->iso}} )
                            </div>
                            <div class="col-md-3 col-xs-3">
                                {{date('H:i',strtotime($rute->arrive_at))}} <br>
                                {{$rute->band2->nama_bandara}} ({{$rute->band2->iso}} )
                            </div>
                            <div class="col-md-3 col-xs-3">
                                Durasi <br>
                                {{$diff->h}}j <span>{{$diff->i}}m
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="box-reservasi box-reservasi2">
                    @php
                        $harga = $rute->harga;
                        $total = $harga*$_GET['penumpang'];
                    @endphp
                    <div class="data">
                        <p>Summary</p>
                    </div>

                    <p>
                        {{$rute->plane->name}} (Penumpang) x {{$_GET['penumpang']}}
                        <span style="float: right;margin-right: 15px" class="harga">{{number_format($total,2)}}</span>
                    </p>
                    <p>
                        Total Biaya :
                        <span style="float: right;margin-right: 15px" class="harga">{{number_format($total,2)}}</span>
                    </p>
                </div>
            </div>
            <div class="row">
                <a href="/pemesanan/{{$rute->id}}/detail?penumpang={{$_GET['penumpang']}}" style="display: block;text-align: center;margin-top: 20px;padding: 10px 20px;color: white;background-color: #F96D01">Lanjut ke Pemesanan</a>
            </div>
        </div>
    </div>


   
</div><!-- CONTAINER -->

<!-- footer-top -->
    <div class="footer-top" style="margin-top: 100px">
        <div class="container">
            <div class="col-md-3 footer-top-grid">
                <h3>About <span>Travel</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque 
                    id arcu neque, at convallis est felis.</p>
            </div>
            <div class="col-md-3 footer-top-grid">
                <h3>THE <span>TAGS</span></h3>
                <div class="unorder">
                    <ul class="tag2">
                        <li><a href="#">awesome</a></li>
                        <li><a href="#">strategy</a></li>
                        <li><a href="#">development</a></li>
                    </ul>
                    <ul class="tag2">
                        <li><a href="#">css</a></li>
                        <li><a href="#">photoshop</a></li>
                        <li><a href="#">photography</a></li>
                        <li><a href="#">html</a></li>
                    </ul>
                    <ul class="tag2">
                        <li><a href="#">awesome</a></li>
                        <li><a href="#">strategy</a></li>
                        <li><a href="#">development</a></li>
                    </ul>
                    <ul class="tag2">
                        <li><a href="#">css</a></li>
                        <li><a href="#">photoshop</a></li>
                        <li><a href="#">photography</a></li>
                        <li><a href="#">html</a></li>
                    </ul>
                    <ul class="tag2">
                        <li><a href="#">awesome</a></li>
                        <li><a href="#">strategy</a></li>
                        <li><a href="#">development</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 footer-top-grid">
                <h3>Latest <span>Tweets</span></h3>
                <ul class="twi">
                    <li>I like this awesome freebie. Check it out <a href="mailto:info@example.com" class="mail">
                    @http://t.co/9vslJFpW</a> <span>ABOUT 15 MINS</span></li>
                    <li>I like this awesome freebie. You can view it online here<a href="mailto:info@example.com" class="mail">
                    @http://t.co/9vslJFpW</a> <span>ABOUT 2 HOURS AGO</span></li>
                </ul>
            </div>
            <div class="col-md-3 footer-top-grid">
                <h3>Flickr <span>Feed</span></h3>
                <div class="flickr-grids">
                    <div class="flickr-grid">
                        <a href="#"><img src="images/11.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="flickr-grid">
                        <a href="#"><img src="images/12.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="flickr-grid">
                        <a href="#"><img src="images/13.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="clearfix"> </div>
                    
                    <div class="flickr-grid">
                        <a href="#"><img src="images/16.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="flickr-grid">
                        <a href="#"><img src="images/14.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="flickr-grid">
                        <a href="#"><img src="images/15.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //footer-top -->
<!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="footer-left">
                <ul>
                    <li><a href="/"><i>X</i>treme Travel</a><span> |</span></li>
                    <li><p>The awesome agency. <span>0800 (123) 4567 // Australia 746 PO</span></p></li>
                </ul>
            </div>
            <div class="footer-right">
                <p>© 2016 Xtreme Travel. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
<!-- //footer -->
<!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
    </script>
<!-- //here ends scrolling icon -->
@endsection