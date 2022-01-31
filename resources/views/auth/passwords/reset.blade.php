@extends('layouts.app') 
@section('content')
 
<div class="container " style="min-height: 720px">
    <div class="row justify-content-center content-wrap">
        <div class="col-md-12">
            <div class="card mt-3"> 
                <div class="card-body"> 
                <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        
                        <input type="hidden" name="token" value="{{ $token }}">  
                        <div class="form-group row">
                            <div class="col-md-12"> 
                                <h4 class="text-dark">แก้ไขรหัสผ่าน</h4>
                            </div>
                            <div class="col-md-12"> 
                                <span> คุณต้องแก้ไขรหัสผ่านเพื่อดำเนินการต่อต่อไปหรือไม่ </span>
                            </div>
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('รีเซ็ตรหัสผ่าน') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-4 pt-2 pb-2">
                        <div class="col-sm-12 text-center">
                            @if (Route::has('login'))
                                <p class="text-muted mb-0">มีบัญชีอยู่แล้ว?
                                    <a class="text-dark ml-1" href="{{ route('login') }}"><b>{{ __('ลงชื่อเข้าใช้งาน') }}</b></a>
                                </p> 
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center mt-3 mb-3" style="background: #fff;">
        <div class="col-12"> 
            <img src="{{ asset('images/SH-Main-01.webp') }}" alt="" style="width: 100%;">
        </div>
        <div class="col-12 pt-2">
            <div style="color: #333;font-size: 0.7rem;"> 
                Copyright ©2021 All Rights Reserved by Chokchaisteakhouse. 
            </div>  
        </div> 
    </div>
</div>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
