<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

@extends('layouts.app')
          <style>
    .cek.activemerah+label{
        color: white;
        background-color: red;
        padding:2px 35px 2px 10px;
        margin-left: -17px;
    }
    .cek.activecus+label{
        color: white;
        background-color: blue;
        padding:2px 35px 2px 10px;
        margin-left: -17px;
    }
    .ket .isi,.ket .kosong,.ket .anda{
        padding: 5px 20px;
        float: right;
        margin-left: 5px;
    }
    .ket .isi{
        background-color: red;
        color: white;
    }
    .ket .kosong{
        background-color: #DEDEDE;
        color: #636B6F;
        border:1px solid #C5C7C8;
    }
    .ket .anda{
        background-color: blue;
        color: white;
    }
</style>
@section('banner')
    <div class="banner1">
        <div class="navigation">
            <div class="container-fluid">
                <nav class="pull">
                    <ul class="nav">
                        <li><a href="/" > Home</a></li>
                        <li><a href="/jadwal"> Pesan Tiket</a></li>                 
                        <li><a href="/konfirmasi"  class="active"> Konfirmasi Pembayaran</a></li>
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
             <div class="alert alert-success">{{$berhasil}}</div>
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
                            Gender : {{$customer->gender}} <br>
                            Kursi : {{$customer->kursi}}
                        </h4>
                   </div>
                @endforeach
                <div class="panel kiri" style="padding: 30px">
                    <h4>
                        Status : 
                        @if($reservasi->status == 0)
                            <span style="color: red">Belum Lunas</span>
                        @else
                            <span style="color: green">Lunas</span>
                        @endif
                    </h4>
                </div>
            @endif
        </div>

        <div class="col-md-7"> <br>
            @if(!empty($pesanber))
                <div class="alert alert-success" style="font-size: 19px;font-weight: bold">{{$pesanber}}</div>
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
                            <label for="">No. Hp {{ $reservasi->pemesans->phone }}</label><br>
                            <label for="">Pembayaran via : {{ $reservasi->bank }}</label> <br>
                            <label for="">Total tagihan : <span class="harga">{{ number_format($reservasi->price,2) }} </span></label>
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
                @else <br> <br> <br>
                    <div class="panel kanan" style="padding: 30px;background-color: #41CE6B; color: white;font-weight: bold">
                        <h4>Pembayaran anda telah di konfirmasi oleh kami. Terima kasih atas kepercayaan anda</h4>
                    </div>
                @endif
                <br>
                <h3 class="title-header openseat" style="text-align: center;background-color: #F96D01;cursor: pointer;color: white;padding: 5px 20px">Lihat Kursi</h3> <br>
                <div class="clear"></div>
                <div class="seat-see" style="display: none;">
                    <div class="supir" style="margin-bottom: 40px;text-align: center;margin-right: 1px">
                        <span class="co-pilot">Co-Pilot</span>
                        <span class="pilot">Pilot</span>
                    </div>
                    <div class="ket">
                        <span class="isi">Telah dipesan</span>
                        <span class="kosong">Tersedia</span>
                        <span class="anda">Anda</span>
                    </div> <br>
                    <div class="clear"></div>
                
                @php
                        $seat = array();
                        $seatcus = array();
                        $type = ['A'];
                        foreach($reservasi->rutes->customers as $kur){
                            $seat[] = $kur->kursi;
                        }
                        foreach($reservasi->pemesans->customers as $cus){
                            $seatcus[] = $cus->kursi;
                        }
                        
                    @endphp
                    @for($i = 1; $i <= $reservasi->rutes->plane->seat_qty; $i++)    
                            <div class="col-md-1 col-xs-1">
                                @foreach($type as $x)
                                <div class="col-md-6">
                                    <input required type="checkbox"  name="seat[]"  
                                    @php
                                    if(in_array($x.$i,$seat)){
                                        
                                        if( in_array($x.$i,$seatcus) ){
                                            echo "class='cek activecus' disabled style='display : none'";
                                        }else{
                                            echo "class='cek activemerah' disabled style='display : none' ";
                                        }
                                    }
                                    @endphp
                                    value="{{$x.$i}}" disabled style="transform: scale(2);" >
                                    <label for=seat">{{$x.$i}}</label>
                                </div>
                                @endforeach
                            </div>
                    @endfor     
                </div>
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