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
                        <li><a href="/" > Home</a></li>
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