<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

@extends('layouts.app')

@section('content')
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
            <div class="sign-in-form">
                <div class="in-form">
                    <h3>Sign in your Account</h3>
                    <p class="use">Having hands on experience in creating innovative 
                            designs,I do offer design solutions which harness.</p>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                   
                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                            <div>
                                <input id="password" type="password" name="password" required placeholder="Password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <!-- <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required=""> -->
                    
                    <div class="ckeck-bg">
                        <div class="checkbox-form">
                            <div class="check-left">
                                <div class="check">
                                    <label class="checkbox"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><i> </i> Remember Me</label>
                                </div>
                                
                            </div>
                            <div class="check-right">
                                <form>
                                    <input type="submit" value="Login">
                                </form>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>

                    </form>
                    
                    <p class="forget"><a href="{{ route('password.request') }}" class="pass">Forgot your Password?</a></p>
                </div>
            </div>
            <div class="new-people">
                <h4>For New People</h4>
                <p>Having hands on experience in creating innovative designs,I do offer design solutions which harness</p>
                <a href="/register">Register Here</a>
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