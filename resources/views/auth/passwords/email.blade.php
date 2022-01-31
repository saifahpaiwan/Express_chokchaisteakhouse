@extends('layouts.app') 
@section('content')
 
<div class="container" style="min-height: 400px; ">
    <div class="row justify-content-center content-wrap">
        <div class="col-md-12">
            <div class="card mt-3"> 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} 
                        </div>
                    @endif 
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf 
                        <div class="row"> 
                            <div class="col-md-12">
                                <h4 class="text-dark">ลืมรหัสผ่าน</h4>
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">{{ __('อีเมล') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-md btn-block btn-dark waves-effect waves-light fontWDB_Bangna">
                                    {{ __('ส่งลิงก์รีเซ็ตรหัสผ่าน') }}
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
@endsection
