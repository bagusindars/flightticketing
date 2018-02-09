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
    <div class="isi" style="margin-top: 30px;">
        @if(!empty($berhasil))
            <div class="alert alert-succces">{{ $berhasil }}</div>
        @endif

        <div class="col-md-5">
            <h3 class="title-header">Masukan email dan kode pembayaran untuk konfirmasi</h3>
            <div class="panel kiri" style="padding: 30px">
                <form action="" method="get">
                   <div class="form-group">
                       <label for="">Email</label>
                       <input type="text" class="form-control" name="email" value="{{ !empty($_GET['email']) ? $_GET['email'] : '' }}">
                   </div>
                   <div class="form-group">
                       <label for="">Kode Reservasi</label>
                       <input type="text" class="form-control" value="{{ !empty($_GET['kode']) ? $_GET['kode'] : '' }}" name="kode">
                   </div>
                   <div class="form-group">
                       <input type="submit" class="submit-form-jadwal" name="search" value="Cari" style="float: right;" />
                   </div>
                   <div class="clear"></div>
                   @if(!empty($pesan))
                        *{{$pesan}}
                   @endif
                </form>
            </div>

            @if(!empty($reservasi))
                <div class="panel">
                    <div class="jumbotron-page-reservasi">
                        <div class="caption" style="border-bottom: 1px solid #dadada;padding-bottom: 10px;font-weight: bold">
                            <span style="font-size: 18px;margin-left: 5px">{{$reservasi->rutes->from->nama}} ({{$reservasi->rutes->band1->iso}})
                            <img src="{{asset('images/plane.png')}}" alt="" width="25px" style="margin-left: 10px;margin-right: 10px">
                             {{$reservasi->rutes->to->nama}} ({{$reservasi->rutes->band2->iso}})</span>
                            <br>
                        </div>
                        <div class="tgl" style="padding: 7px;font-size: 17px;margin-top: 6px;font-weight: bold;" >
                            {{date('D , d M Y',strtotime($reservasi->rutes->depart_at))}}
                            <span style="margin-left: 3px;border-left: 1px solid #dadada;padding-left: 5px">{{$reservasi->rutes->plane->name}} {{$reservasi->rutes->plane->code}}</span>
                            <span class="glyphicon glyphicon-chevron-down panah-bawah-reservasi" style="cursor: pointer;float: right;margin-top: 5px" aria-hidden="true"></span>
                        </div>
                        <div class="datapesan" style="margin-top: 10px;padding: 8px;">
                            <img src="/img/logo/{{$reservasi->rutes->plane->logo}}" alt="" width="150px"> <br><br>
                            <div class="panel " style="padding: 0px;margin-left: -13px">
                                <div class="panel-heading">
                                    <div class="waktu" style="float: left;font-size: 20px">
                                        <b>{{date('H:i',strtotime($reservasi->rutes->depart_at))}}</b> <br>
                                        {{date('d M Y',strtotime($reservasi->rutes->depart_at))}}
                                    </div>
                                    <div class="tempat" style="text-align: right;font-size: 19px">
                                        <b>{{$reservasi->rutes->from->nama}} ({{$reservasi->rutes->band1->iso}}) </b> <br>
                                        {{$reservasi->rutes->band1->nama_bandara}}
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="panel-body">
                                    <div class="waktu" style="float: left;">
                                        <b>{{date('H:i',strtotime($reservasi->rutes->arrive_at))}}</b> <br>
                                        {{date('d M Y',strtotime($reservasi->rutes->arrive_at))}}
                                    </div>
                                    <div class="tempat" style=";text-align: right;font-size: 19px">
                                        <b>{{$reservasi->rutes->to->nama}} ({{$reservasi->rutes->band2->iso}}) </b> <br>
                                        {{$reservasi->rutes->band2->nama_bandara}}
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>

                </div>
                <div class="panel kiri" style="padding: 30px">
                    <h4>Total kursi yg dipesan : {{count($reservasi->pemesans->customers)}}</h4>
                </div>
                @foreach($reservasi->pemesans->customers as $customer)
                   <div class="panel kiri" style="padding: 30px"> 
                        <h4>
                            Nama : {{$customer->nama}} <br>
                            Gender : {{$customer->gender}}
                        </h4>
                   </div>
                @endforeach
                <div class="panel kiri" style="padding: 30px">
                    <h4>Status : {{ $reservasi->status == 0 ? 'Belum Lunas' : 'Lunas'  }}</h4>
                </div>
            @endif
        </div>

        <div class="col-md-7"> <br>
            @if(!empty($pesanber))
                <div class="alert alert-succces">{{$pesanber}}</div>
            @elseif(!empty($pesangal))
                <div class="alert alert-danger">{{$pesangal}}</div>
            @endif
            @if(!empty($reservasi))
                @if($reservasi->status == 0)
                <h3 class="title-header">Konfirmasi Pembayaran</h3>
                <div class="panel kanan" style="padding: 30px">
                   <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Data Pemesan</label>
                            <p>Pemesanan atas nama</p>
                            <input type="text" class="form-control" readonly="true" value="{{$reservasi->pemesans->nama}}" style="margin-bottom: 5px">
                            <label for="">No. Hp {{ $reservasi->pemesans->phone }}</label> <br>
                            <label for="">Pembayaran via : {{ $reservasi->bank }}</label>
                            <label for=""></label>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" required name="tgl">
                        </div>
                        <div class="form-group">
                            <label for="">No Rekening</label>
                            <input type="text" class="form-control" required name="rekening">
                        </div>
                        <div class="form-group">
                            <label for="">Bukti transfer</label>
                            <input type="file" class="form-control" required name="bukti" id="bukti-input-file">
                            <div class="imgPreview"></div>
                            *Kirim bukti transfer
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="submit" class="search-more" value="Kirim" style="border: none">
                        </div>
                        <div class="clear"></div>
                   </form>
                </div>
                @else
                    Pembayaran anda telah di konfirmasi oleh kami.
                @endif
            @endif
        </div>
    </div><!-- ISI -->
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