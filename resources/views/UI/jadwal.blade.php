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
                        <a href="#"><img src="images/menu.png" alt=""></a>
                    </div>  
                </div>  
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
<!-- banner -->

@endsection

@section('content')
<div class="container">
    <div class="isi">
        <div class="data" style="border-bottom: 1px solid #ddd;padding-bottom: 2px">
            <div class="data-pencarian">
                <h3 style="margin-top: 40px;">
                    @php
                        $count = 0;
                    @endphp
                    @if(empty($_GET))
                         @foreach($rute as $rutes)
                            {{$rutes->from->nama}} (Semua Bandara}) →
                            {{$rutes->to->nama}} (Semua Bandara})
                            @php
                                $count++;
                                if($count >= 1 ) break;
                            @endphp
                        @endforeach
                    @else
                        @foreach($rute as $rutes)
                            {{$rutes->from->nama}} (Semua Bandara) →                  
                            {{$rutes->to->nama}} (Semua Bandara)
                            @php
                                $count++;
                                if($count >= 1 ) break;
                            @endphp
                        @endforeach
                    @endif
                </h3>
                <h4>
                    @if(empty($_GET))
                        {{ date('D, d M Y ') }}
                        <span  class="penumpang">
                            1
                        </span>
                    @else
                        {{date('D, d M Y ' , strtotime($_GET['depart_at']))}}
                        <span class="penumpang">
                            {{$_GET['penumpang']}}
                        </span>
                    @endif
                 
                </h4>
            </div>
            <span class="search-more">Ganti Pencarian</span>
             <div class="clear"></div>
        </div>

        <div class="form-search-tiket">
            <form action="{{request()->root()}}/jadwal" method="get">
                <div class="row">
                        <div class="col-md-3">
                            <div class="book_date">
                                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                    <select style="text-indent: 42px;width: 100%" name="rute_from" id="">
                                            <option value="" disabled selected>Dari</option>
                                        @foreach($kota as $kotas)
                                            @if(!empty($_GET['rute_from']))
                                            <option value="{{$kotas->id}}" {{ ($_GET['rute_from'] == $kotas->id) ? "selected" : "" }}>{{$kotas->nama}}</option>      
                                            @else
                                            <option value="{{$kotas->id}}" {{$kotas->nama == 'Jakarta' ? 'selected' : ''}}>{{$kotas->nama}}</option> 
                                            @endif   
                                        @endforeach
                                    </select>   
                            </div>
                        </div>
                
                        <div class="col-md-3">
                            <div class="book_date">
                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                <select style="text-indent: 42px;width: 100%" name="rute_to" id="">
                                        <option value="" disabled selected>Tujuan</option>
                                    @foreach($kota as $kotas)
                                        @if(!empty($_GET['rute_to']))
                                        <option value="{{$kotas->id}}" {{ $_GET['rute_to'] == $kotas->id? "selected" : "" }}>{{$kotas->nama}}</option> 
                                        @else
                                        <option value="{{$kotas->id}}" {{$kotas->nama == 'Bandung' ? 'selected' : ''}}>{{$kotas->nama}}</option>        
                                        @endif
                                    @endforeach
                                </select> 
                            </div>           
                        </div>

                        <div class="col-md-3">
                            <div class="book_date">               
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                @if(!empty($_GET['depart_at']))
                                <input class="date datepicker" name="depart_at" id="datepicker" type="date" value="{{$_GET['depart_at']}}" >
                                @else
                                <input class="date datepicker" name="depart_at" id="datepicker" type="date" value="{{date('Y-m-d')}}" >
                                @endif
                            </div> 
                        </div>                            
                        <div class="col-md-3">
                            <div class="book-date">
                              <span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="visibility: hidden;"></span>
                              <select name="penumpang" class="" style="text-indent: 10px;width: 100%">
                                    <option value="" selected disabled>Penumpang</option>
                                    @for($i = 1 ; $i <= 7;$i++)
                                        @if(!empty($_GET['penumpang']))
                                        <option value="{{$i}}" {{ $_GET['penumpang'] == $i? "selected" : "" }}>{{$i}}</option>
                                        @else
                                        <option value="{{$i}}" {{ $i == 1 ? 'selected' :'' }}>{{$i}}</option>
                                        @endif
                                    @endfor
                              </select>
                            </div>
                        </div> 
                       <div class="container">
                        <input type="submit" class="submit-form-jadwal" name="search" value="Search Flights" />
                        </div>
                </div>
            </form>
        </div>
        
        @php
            $count = 1;
        @endphp
       <div class="box" >
                <div class="box-body">
                     @if($rute->count() == 0 )
                        <div class="blank-record">
                            <h3 >Tidak ada jadwal penerbangan</h3>
                        </div>
                    @else 
                    
                    <table class="table">
                        <tbody>
                            <tr class="tr-h">
                                <th>Maskapai</th>
                                <th>Berangkat</th>
                                <th>Tiba</th>
                                <th>Durasi</th>
                                <th>Dari</th>
                                <th>Tujuan</th>
                                <th>Harga per orang</th>
                                
                            </tr>
                            @foreach($rute as $rute)
                                <tr class="tr-isi">
                                    <td>    <br>
                                        <img style="width: 60px;margin-right: 5px" src="{{asset('img/logo/'.$rute->plane->logo)}}" alt="Logo" >
                                        {{$rute->plane->name}}
                                    </td>
                                    <td><br><div class="waktu">{{date('H:i', strtotime($rute->depart_at))}}</div></td>
                                    <td><br><div class="waktu">{{date('H:i', strtotime($rute->arrive_at))}}</div></td>
                                    <td><br>
                                        @php
                                            $start = new DateTime($rute->depart_at);
                                            $end   = new DateTime($rute->arrive_at);
                                            $diff  = $start->diff($end);

                                        @endphp
                                       <div class="waktu"><p>{{$diff->h}}j <span>{{$diff->i}}m</span></p> </div> 
                                    </td>
                                    <td><br>{{$rute->from->nama}}<br>{{$rute->band1->nama_bandara}} ({{$rute->band1->iso}})</td>
                                    <td><br>{{$rute->to->nama}},<br>{{$rute->band2->nama_bandara}} ({{$rute->band2->iso}})</td>
                                    <td>
                                        <p class="harga">{{number_format($rute->harga,2)}}</p>
                                        @if(!empty($_GET['penumpang']))
                                        <a href="/pemesanan/{{$rute->id}}?penumpang={{ $_GET['penumpang']   }}" class="choose">Pilih</a> <br><br>
                                        @else
                                        <a href="/pemesanan/{{$rute->id}}?penumpang=1" class="choose">Pilih</a> <br><br>
                                        @endif
                                        <p>*Sisa {{$rute->kursi}} kursi</p>
                                    </td>
                                    
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
           
    </div><!-- ISI -->
</div><!-- CONTAINER -->

<!-- footer-top -->
    <div class="footer-top">
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