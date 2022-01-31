@extends('layouts.app') 
@section('style') 
    <style>
        .bg-login {
            background-image: url(images/bg-login.jpg);
            background-position: center;
            background-size: cover;
            min-height: 100%; 
        }
        .bg-ww {background: #fff;border: 1px solid #ddd;}
         /* // ============ BTN =================== // */
         .btn-primary {
            color: #fff;
            background-color: #000000;
            border-color: #000000;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #252424;
            border-color: #252424;
        }
        .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #252424;
            border-color: #252424;
        }

        .btn-facebook {
            color: #fff;
            background-color: #1877f2;
            border-color: #1877f2;
        }
        .btn-facebook:hover {
            color: #fff;
            background-color: #4d9bff;
            border-color: #4d9bff;
        }
        .btn-facebook:not(:disabled):not(.disabled).active, .btn-facebook:not(:disabled):not(.disabled):active, .show>.btn-facebook.dropdown-toggle {
            color: #fff;
            background-color: #4d9bff;
            border-color: #4d9bff;
        }
        .btn-facebook:not(:disabled):not(.disabled).active, .btn-facebook:not(:disabled):not(.disabled):active, .show>.btn-facebook.dropdown-toggle {
            color: #fff;
            background-color: #1877f2;
            border-color: #1877f2;
        }

        .btn-google {
            color: #fff;
            background-color: #f44336;
            border-color: #f44336;
        }
        .btn-google:hover {
            color: #fff;
            background-color: #f56f65;
            border-color: #f56f65;
        }
        .btn-google:not(:disabled):not(.disabled).active, .btn-google:not(:disabled):not(.disabled):active, .show>.btn-google.dropdown-toggle {
            color: #fff;
            background-color: #f56f65;
            border-color: #f56f65;
        }
        .btn-google:not(:disabled):not(.disabled).active, .btn-google:not(:disabled):not(.disabled):active, .show>.btn-google.dropdown-toggle {
            color: #fff;
            background-color: #f44336;
            border-color: #f44336;
        }

        .btn-line {
            color: #fff;
            background-color: #00c300;
            border-color: #00c300;
        }
        .btn-line:hover {
            color: #fff;
            background-color: #4d9bff;
            border-color: #4d9bff;
        }
        .btn-line:not(:disabled):not(.disabled).active, .btn-line:not(:disabled):not(.disabled):active, .show>.btn-line.dropdown-toggle {
            color: #fff;
            background-color: #4d9bff;
            border-color: #4d9bff;
        }
        .btn-line:not(:disabled):not(.disabled).active, .btn-line:not(:disabled):not(.disabled):active, .show>.btn-line.dropdown-toggle {
            color: #fff;
            background-color: #00c300;
            border-color: #00c300;
        }
        .btn-xs { padding: 0.5rem; }
        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #000000;
            border-color: #000000;
        }
        /* // ============ BTN =================== // */
    </style>
@endsection 
@section('content')
     
    <section class="gradient content-wrap">
        <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-12 col-md-12">
                    <div class="bg-ww mt-2 mb-2"> 
                        <div class="">
                            <div class="row"> 
                                <div class="col-12 col-md-12 box-login-2">
                                    <form method="POST" action="{{ route('register') }}" style="padding: 1rem;">
                                        @csrf       
                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <h4 class="text-dark">สมัครสมาชิก</h4>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <label for="name" class="col-form-label">{{ __('ชื่อ - นามสกุล') }}</label> 
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <label for="email" class="col-form-label">{{ __('อีเมล') }}</label> 
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <label for="phone" class="col-form-label">{{ __('โทรศัพท์') }}</label>
                                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-6">
                                                <label for="password" class="col-form-label">{{ __('รหัสผ่าน') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                         
                                            <div class="col-md-6">
                                                <label for="password-confirm" class="col-form-label">{{ __('ยืนยันรหัสผ่าน') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-3 ">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="requirements" id="requirements"> 
                                                    <label class="form-check-label" for="requirements">
                                                        <div style="font-size: 0.7rem;"> ฉันได้อ่านและยอมรับ
                                                            <!-- <span class="font-weight-bold">ข้อกำหนดการใช้งาน</span>
                                                            และ  -->
                                                            <span class="font-weight-bold">
                                                            <a href="https://shop.chokchaisteakhouse.com/Privacy_Policy" target="_blank">นโยบายความเป็นส่วนตัว</a></span>
                                                            ของฟาร์มโชคชัย<br> 
                                                        </div>
                                                    </label> 
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <button type="submit" id="register" class="btn btn-md btn-block btn-primary waves-effect waves-light fontWDB_Bangna">
                                                    {{ __('ลงทะเบียน') }}
                                                </button>
                                            </div> 
                                            <div class="col-md-12 text-center">
                                                <hr class="mt-4">
                                                <div class="txt-or"> 
                                                    <lable class="fontWDB_Bangna txt-or-lable"> หรือลงชื่อเข้าใช้งานด้วย </lable>    
                                                </div>
                                                <a href="{{ route('login.facebook') }}" class="btn btn-xs btn-facebook waves-effect width-lg waves-light mt-1 ml-1"><i class="fab fa-facebook-f"></i>  Facebook</a>
                                                <a href="{{ route('login.google') }}" class="btn btn-xs btn-google waves-effect width-lg waves-light mt-1 ml-1"><i class="fab fa-google"></i> Google</a>
                                                <a href="https://liff.line.me/1656041621-z0NPek6R" class="btn btn-xs btn-line waves-effect width-lg waves-light mt-1 ml-1"><i class="fab fa-line"></i> Login Line</a> 
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row mt-4 pt-2 pb-2">
                                        <div class="col-sm-12 text-center">
                                            @if (Route::has('login'))
                                                <p class="text-muted mb-0">มีบัญชีอยู่แล้ว?
                                                    @if(isset($_GET['page']))
                                                        <a class="text-dark ml-1" href="{{ url('login?page=dl') }}"><b>{{ __('ลงชื่อเข้าใช้งาน') }}</b></a>
                                                    @else
                                                        <a class="text-dark ml-1" href="{{ url('login') }}"><b>{{ __('ลงชื่อเข้าใช้งาน') }}</b></a>
                                                    @endif
                                                </p> 
                                            @endif 
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
@endsection
@section('script')
<script>
    $( "#register" ).prop( "disabled", true );
    $(document).on('click', '#requirements', function(event) {   
        if($(this)[0].checked == true){ 
            $( "#register" ).prop( "disabled", false );
        } else {
            $( "#register" ).prop( "disabled", true );   
        }
    }); 
</script>
@endsection

