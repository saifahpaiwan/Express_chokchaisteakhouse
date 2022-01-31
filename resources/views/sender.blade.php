@extends('layouts.app')
@section('meta')
     <!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://express.chokchaisteakhouse.com/">
<meta property="og:title" content="CHOKCHAISTEAK.EXPRESS">
<meta property="og:description" content="โชคชัยสเต็คเฮ้าส์ เสิร์ฟความอร่อยจากครัวส่งตรงถึงคุณ ด้วยบริการจัดเลี้ยงนอกสถานที่ ทางเลือกสำหรับการทานอาหาร ในรูปแบบปาร์ตี้ส่วนตัวที่บ้าน งานเลี้ยงระดับองค์กร งานเลี้ยงในโอกาสพิเศษต่างๆ ด้วยคุณภาพอาหารและพนักงานที่เชี่ยวชาญ พร้อมเครื่องมือครบครัน ในบรรยากาศและสถานที่ของคุณเอง เพื่อสร้างความประทับใจให้แก่คนพิเศษของคุณ ออกแบบความอร่อย ตามความต้องการของคุณ ติดต่อสอบถามเพิ่มเติมได้ที่ 0 2532 2846 ถึง 8 ต่อ 1710">
<meta property="og:image" content="{{ asset('images/Express_Platform.webp') }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://express.chokchaisteakhouse.com/">
<meta property="twitter:title" content="CHOKCHAISTEAK.EXPRESS">
<meta property="twitter:description" content="โชคชัยสเต็คเฮ้าส์ เสิร์ฟความอร่อยจากครัวส่งตรงถึงคุณ ด้วยบริการจัดเลี้ยงนอกสถานที่ ทางเลือกสำหรับการทานอาหาร ในรูปแบบปาร์ตี้ส่วนตัวที่บ้าน งานเลี้ยงระดับองค์กร งานเลี้ยงในโอกาสพิเศษต่างๆ ด้วยคุณภาพอาหารและพนักงานที่เชี่ยวชาญ พร้อมเครื่องมือครบครัน ในบรรยากาศและสถานที่ของคุณเอง เพื่อสร้างความประทับใจให้แก่คนพิเศษของคุณ ออกแบบความอร่อย ตามความต้องการของคุณ ติดต่อสอบถามเพิ่มเติมได้ที่ 0 2532 2846 ถึง 8 ต่อ 1710">
<meta property="twitter:image" content="{{ asset('images/Express_Platform.webp') }}">
@endsection
@section('style') 
    <style>
        @media (max-width: 780px) {
            .borderBottom-nav {display: none;} 
        }
    </style>
@endsection

@section('content')    
        <div class="box-fixed-title2 d-block d-sm-none"> 
            <div class="container-fluid">    
                <div class="">
                    <div class="d-flex justify-content-between"> 
                        <h4 class="text-center"> 
                            <a href="{{ route('home') }}" style="color: #333;"> 
                                <i class="icon-arrow-left"></i>
                            </a>     
                        </h4> 
                        <h4 class="text-center"> ข้อมูลผู้จัดส่ง </h4> 
                        <h4 class="text-center"> </h4> 
                    </div>
                </div>
            </div>
        </div>
        <section class="content-wrap section gradient">
            <div class="container"> 
                <div class="row hero-content mt-3" style="background: #fff;"> 
                    <div class="col-12 text-center"> 
                        <img src="{{ asset('images/logo.png') }}" alt="" style="width: 50%;">
                    </div>
                    <div class="col-12"> 
                        <form method="POST" action="{{ route('updateSenderData.post') }}" id="formMaster">
                            @csrf  
                            <input type="hidden" name="get_page" value="@if(isset($_GET['page'])) cart @endif">  
                            <div class="row">
                                <div class="col-12"> 
                                    <label for="fname" class="col-form-label font-13">{{ __('ชื่อจริง') }}</label> 
                                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" required autocomplete="fname" autofocus 
                                    value="@if($data['users']->sender_fname!='') {{$data['users']->sender_fname}} @endif">
                                    @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12"> 
                                    <label for="lname" class="col-form-label font-13">{{ __('นามสกุล') }}</label> 
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" required autocomplete="lname" autofocus
                                    value="@if($data['users']->sender_lname!='') {{$data['users']->sender_lname}} @endif">
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12"> 
                                    <label for="tel" class="col-form-label font-13">{{ __('หมายเลขโทรศัพท์') }}</label> 
                                    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" required autocomplete="tel" autofocus
                                    value="@if($data['users']->sender_phone!='') {{$data['users']->sender_phone}} @endif">
                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12"> 
                                    <label for="email" class="col-form-label font-13">{{ __('อีเมล') }}</label> 
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus
                                    value="@if($data['users']->sender_email!='') {{$data['users']->sender_email}} @endif">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-12 text-center"> 
                                    <button type="submit" class="btn btn-block btn-dark waves-effect waves-light fontWDB_Bangna mt-3"  id="save_sender">
                                        บันทึกข้อมูลผู้จัดส่ง
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>  
@endsection 
@section('script') 
@endsection