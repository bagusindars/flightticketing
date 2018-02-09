@extends('layouts.app')

@section('content')
<!-- banner -->
    <div class="banner1">
        <div class="navigation">
            <div class="container-fluid">
                <nav class="pull">
                    <ul class="nav">
                        <li><a href="index.html" class="active"> Home</a></li>
                        <li><a href="index.html"> About</a></li>
                        <li><a href="index.html" class="menu">Popular Places<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
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
                        <li><a href="index.html"> Events</a></li>
                        <li><a href="index.html"> Mail us</a></li>
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
    </div>
<!-- banner -->
<!-- sign-in -->
    <div class="sign-in">
        <div class="container">
            <div class="in-form">
                <h3>Register Here</h3>
                <p class="use">Having hands on experience in creating innovative 
                                designs,I do offer design solutions which harness.</p>
                <div class="sign-in-form">
                    <div class="in-form Personal">
                        <h4>Personal Information</h4>
                        <form method="POST" action="{{ route('register') }}">
                         {{ csrf_field() }}
                           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                         
                                <div>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama Lengkap">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                               
                                <div>
                                    <input id="email" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                               
                                <div>
                                    <input id="alamat" placeholder="Alamat" type="text" name="alamat" value="{{ old('alamat') }}" required>

                                    @if ($errors->has('alamat'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('alamat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                               
                                <div>
                                    <input id="phone" placeholder="No. Hp (+628572837)" type="text" name="phone" value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    
                        <div class="form-group">
                            <select name="gender" id="">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <h4 class="kij">Login Information</h4><br>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div>
                                    <input id="password" placeholder="Password" type="password" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                             
                                <div>
                                    <input id="password-confirm"  placeholder="Ulangi password" type="password"  name="password_confirmation" required>
                                </div>
                            </div>

                            <input type="submit" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- //sign-in -->
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
                    <li><a href="index.html"><i>X</i>treme Travel</a><span> |</span></li>
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
