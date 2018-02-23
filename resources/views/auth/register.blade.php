@extends('layouts.app')

@section('content')
<!-- banner -->
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
