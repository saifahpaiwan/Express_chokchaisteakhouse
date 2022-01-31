@extends('layouts.app')
@section('content')
    <section class="gradient content-wrap">
        <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-12 col-md-5 col-xl-5">
                    <div class="mt-4 mb-4" style="background: #FFF;"> 
                        <div class="">
                            <div class="row">
                                <div class="col-12 col-md-12 col-xl-12"> 
                                    <form method="POST" action="{{ route('login') }}" style="padding: 1rem;">
                                        @csrf    
                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <h3 class="text-uppercase mb-1 mt-1">
                                                    <b>ลงชื่อเข้าใช้งาน (สำหรับ Admin) </b>  
                                                </h3>  
                                                <label> ลงชื่อเข้าใช้งาน (สำหรับ Admin)  </label>
                                            </div>
                                            <div class="col-md-12">
                                                @error('email')
                                                    <div class="alert alert-danger" role="alert">
                                                       <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                                                    </div>
                                                @enderror  
                                                @error('password')
                                                    <div class="alert alert-danger" role="alert">
                                                       <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                                                    </div>
                                                @enderror   
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-12">
                                                <label for="email" class="col-form-label">{{ __('อีเมล') }}</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-12">  
                                                <label for="password" class="col-form-label">{{ __('รหัสผ่าน') }}</label> 
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            </div>
                                        </div>

                                        <div class="row mt-1">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label> 
                                                </div> 
                                            </div>
                                            <div class="col-md-6 text-right">
                                                @if (Route::has('password.request'))
                                                    <a class="text-muted" href="{{ route('password.request') }}">
                                                        {{ __('ลืมรหัสผ่าน?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-md btn-block btn-primary waves-effect waves-light fontWDB_Bangna">
                                                    {{ __('ลงชื่อเข้าใช้งาน') }}
                                                </button> 
                                            </div> 
                                        </div>
                                    </form>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
@endsection
