@extends('layouts.app')
@section('meta')
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://shop.chokchaisteakhouse.com/">
    <meta property="og:title" content="CHOKCHAI STEAKHOUSE.SHOP">
    <meta property="og:description" content="โชคชัยสเต็คเฮ้าส์ เสิร์ฟความอร่อยจากครัวส่งตรงถึงคุณ ด้วยบริการจัดเลี้ยงนอกสถานที่ ทางเลือกสำหรับการทานอาหาร ในรูปแบบปาร์ตี้ส่วนตัวที่บ้าน งานเลี้ยงระดับองค์กร งานเลี้ยงในโอกาสพิเศษต่างๆ ด้วยคุณภาพอาหารและพนักงานที่เชี่ยวชาญ พร้อมเครื่องมือครบครัน ในบรรยากาศและสถานที่ของคุณเอง เพื่อสร้างความประทับใจให้แก่คนพิเศษของคุณ ออกแบบความอร่อย ตามความต้องการของคุณ ติดต่อสอบถามเพิ่มเติมได้ที่ 0 2532 2846 ถึง 8 ต่อ 1710">
    <meta property="og:image" content="{{ asset('images/bg-login.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://shop.chokchaisteakhouse.com/">
    <meta property="twitter:title" content="CHOKCHAI STEAKHOUSE.SHOP">
    <meta property="twitter:description" content="โชคชัยสเต็คเฮ้าส์ เสิร์ฟความอร่อยจากครัวส่งตรงถึงคุณ ด้วยบริการจัดเลี้ยงนอกสถานที่ ทางเลือกสำหรับการทานอาหาร ในรูปแบบปาร์ตี้ส่วนตัวที่บ้าน งานเลี้ยงระดับองค์กร งานเลี้ยงในโอกาสพิเศษต่างๆ ด้วยคุณภาพอาหารและพนักงานที่เชี่ยวชาญ พร้อมเครื่องมือครบครัน ในบรรยากาศและสถานที่ของคุณเอง เพื่อสร้างความประทับใจให้แก่คนพิเศษของคุณ ออกแบบความอร่อย ตามความต้องการของคุณ ติดต่อสอบถามเพิ่มเติมได้ที่ 0 2532 2846 ถึง 8 ต่อ 1710">
    <meta property="twitter:image" content="{{ asset('images/bg-login.jpg') }}">
@endsection
@section('style') 
<style> 
    :root {
            --color-black: #232323;
        --color-pink: #ff6393;
        --color-dark-pink: #df4775;
        --color-purple: #342a47;
        --color-blue: deepskyblue;
        --color-gray: #525252;
        --color-green: #bbe187;
        
        --transition-fast: 0.1s;
    }

    .InputGroup {
        display: inline-block;
    }

    input[type="radio"] {
        visibility: hidden; /* 1 */
        height: 0; /* 2 */
        width: 0; /* 2 */
    }

    .labelPro {  
        vertical-align: middle;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-weight: 600;
        cursor: pointer;
        background-color: #ffffff;
        border: 1px solid #929292;
        color: #5a5a5a;
        padding: 0 10px; 
        transition: color --transition-fast ease-out, 
                    background-color --transition-fast ease-in;
        user-select: none; 
        font-size: 0.8rem;
    }

    .labelPro:last-of-type {
        margin-right: 0;
    }

    input[type="radio"]:checked + .labelPro {
        background-color: #fb1706de;
        border: 1px solid #b20c00de;
        font-weight: 600;
        color: #333;
    }

    input[type="radio"]:hover:not(:checked) + .labelPro {
        background-color: #ffe1c8;
        border: 1px solid #e89e5e;
        font-weight: 600;
        color: #333;
    } 
</style>
@endsection

@section('content') 
    <!-- //==========NAV===========// -->
    <nav class="navbar navbar-expand-lg navbar-custom navbar-dark navbar-custom"> 
        <div class="container-fluid">    
            <div class="d-flex">
                <div>
                    <a class="navbar-brand logo" href="{{ route('home') }}" class="">  
                        @guest
                            <div style="color: #333">โชคชัยสเต็กเฮ้าส์ <span style="color: #E89E5E;font-size: 13px;"> เดลิเวอรี่ </span> </div>
                        @else
                            @if(Auth::user()->avatar)
                                <!-- <img src="{{ Auth::user()->avatar }}" alt="" style="width: 25px;"> -->
                                <div style="color: #333">สวัสดี <span style="color: #E89E5E;font-size: 13px;">  {{ Auth::user()->name }} </span> </div>
                            @else 
                                <div style="color: #333">สวัสดี <span style="color: #E89E5E;font-size: 13px;">  {{ Auth::user()->name }} </span> </div>
                            @endif      
                        @endguest 
                    </a> 
                </div>   
            </div>  
            <div class="d-flex justify-content-end">  
                @guest
                    <a href="{{ url('/login') }}" class="btn btn-dark waves-effect waves-light btn-sm" style="padding: 0.2rem 0.5rem;">
                        <i class="mdi mdi-account-circle"></i> เข้าสู่ระบบ
                    </a> 
                @else
                    <a href="{{ route('profile') }}" class="btn btn-dark waves-effect waves-light btn-sm" style="padding: 0.2rem 0.5rem;">  
                        <i class="mdi mdi-account-circle-outline"></i> โปรไฟล์
                    </a>       
                @endguest   
            </div> 
        </div>
    </nav> 
    <div class="location">
        <div class="d-flex">
            <div class="text-danger mr-2">  <i class="mdi mdi-map-marker-multiple"> </i> </div>
            @guest
                <div class="text-location white-space-nowrap1">
                    โปรดระบุตำแหน่งที่จัดส่ง.
                </div>
            @else
                <div class="text-location white-space-nowrap1">
                    {{$data['users']->sender_address}}
                </div>
            @endguest   
            <a href="{{ url('/location') }}" class="ml-2" style="float: right;"><i class="icon-note"></i></a> 
        </div>
    </div>
    <div class="text-center pt-2 pl-5 pr-5" style="background: #FFF;">
        <ul class="nav nav-pills navtab-bg nav-justified">
            <li class="nav-item">
                <a href="#dl1" data-toggle="tab" aria-expanded="false" class="nav-link @if(session('senderForm')) @if(session('senderForm')==1) active @endif  @endif" id="customRadio" data-id="1"> 
                    <span class=""><i class="fa fa-motorcycle" aria-hidden="true"></i> เดลิเวอรี่</span>
                </a>
            </li>
            <li class="ml-2 nav-item">
                <a href="#dl2" data-toggle="tab" aria-expanded="true" class="nav-link @if(session('senderForm')) @if(session('senderForm')==2) active @endif  @endif" id="customRadio" data-id="2"> 
                    <span class=""><i class="mdi mdi-shopping" aria-hidden="true"></i> รับเองที่ร้าน</span>
                </a>
            </li>  
        </ul> 
    </div>
    <!-- <div class="table-responsive" id="menu-nav"> 
        <table class="table mb-0" style="background: #FFF;"> 
            <tbody>
                <tr> 
                    @if(isset($data['Querysubs'])) 
                        @foreach($data['Querysubs'] as $row) 
                        <td class="text-center white-space menu-vv">
                            <a href="#subs{{$row->id}}"> 
                                <div class="">{{$row->name}}</div>
                            </a>
                        </td>  
                        @endforeach
                    @endif
                </tr>
            </tbody>
        </table>
    </div>  -->
    <!-- //==========NAV===========// -->
    <!-- <section class="content-wrap section gradient" id="">
        <div class="container">
            <div>
                <div class="row hero-content-1 text-center">
                    @foreach($data['QueryproductItems'] as $row1) 
                        <div class="text-dark col-12 text-left" id="subs{{$row1['productSubid']}}"> 
                            <h4> {{$row1['productSubname']}} </h4>
                        </div>
                        @foreach($row1['list'] as $row)  
                        <div class="col-12"> 
                            <a href="{{ url('detail/'.$row['id']) }}">
                                <div class="d-flex mt-1 mb-1"> 
                                    <div class=""> 
                                        <img src="{{ asset('images/product/'.$row['proImgname']) }}" alt="" class="box-product">
                                    </div>
                                    <div class="text-left pl-2 pr-2 text-product">
                                        <div class="text-dark white-space-nowrap1">{{$row['itemsName_en']}}</div>
                                        <div class="text-dark white-space-nowrap1">{{$row['itemsName_th']}}</div>
                                        @if($row['tags_deleted_at']!=1)
                                            <div class="badge box-tag" style="background: {{$row['bg_color']}};">{{$row['tagName']}}</div>
                                        @endif    
                                    </div> 
                                    <div class="white-space-nowrap1 text-price ml-auto">{{$row['price_range']}}</div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    @endforeach
                </div> 
            </div>
        </div>
    </section>  -->  
    <section class="content-wrap section gradient" id="">
        <div class="table-responsive" id="menu-nav"> 
            <ul class="nav nav-tabs tabs-bordered nav-justified" style="display: flex; flex-wrap: nowrap;">
                @foreach($data['QueryproductItems'] as $row1)  
                    <li class="nav-item" style="padding: 0.5rem;">
                        <a href="#subs{{$row1['productSubid']}}" data-toggle="tab" aria-expanded="false" class="nav-link"> 
                            <span class="white-space">{{$row1['productSubname']}}</span>
                        </a>
                    </li>  
                @endforeach 
            </ul> 
        </div>
        <div class="container">  
            <div class="row hero-content-1 text-center">
                @foreach($data['QueryproductItems'] as $row1) 
                    <div class="text-dark col-12 text-left" id="subs{{$row1['productSubid']}}"> 
                        <h4> {{$row1['productSubname']}} </h4>
                    </div>
                    @foreach($row1['list'] as $row)   
                    <div class="col-6 pd-55"> 
                            <div class="box-product" id="product{{$row['id']}}">  
                                <div class="wrapper">
                                    <div class="parent" onclick=""> 
                                        <div class="child" style="background-image: url({{ ('images/product/'.$row['proImgname']) }}); background-position: center; background-size: cover;"> </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12 col-md-12 box-procontent-1"> 
                                        <div class="text-left p-1">
                                            <div class="text-dark white-space-nowrap1">{{$row['itemsName_en']}}</div>
                                            <div class="text-dark white-space-nowrap1">{{$row['itemsName_th']}}</div> 
                                            <div class="white-space-nowrap1" style="color:#f44336;">{{$row['price_range']}}</div>
                                        </div>    
                                    </div> 
                                </div>  
                            </div> 
                    </div>
                    @endforeach
                @endforeach
            </div>  
        </div>
    </section> 

    <div class="box-fixed-cart"> 
        <div class="container-fluid">    
            <div class="p-2 mb-2 mt-2">
                <?php $total=0; ?> 
                @if(session('deliveryCart')) 
                    @if(count(session('deliveryCart'))>0)   
                        @foreach(session('deliveryCart') as $key=>$row) 
                            <?php $total+=($row['price']*$row['quantity']); ?> 
                        @endforeach 
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-icon waves-effect btn-dark" style="padding: 0.5rem;">  
                                    <i class="icon-basket-loaded"></i> {{count(session('deliveryCart'))}}
                                </button> 
                                <h4> <a href="{{ url('/cart') }}">สั่งเลย </a></h4>
                                <h4> {{number_format($total,0)}}฿</h4> 
                            </div> 
                    @endif
                @else 
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-icon waves-effect btn-dark" style="padding: 0.5rem;">  
                            <i class="icon-basket-loaded"></i> 0
                        </button> 
                        <h4> เลือกสินค้า </h4>
                        <h4> 0฿</h4> 
                    </div>
                @endif 
            </div>   
        </div>
    </div> 
       
    @guest   
    <div class="modal fade modprofile" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered-flex-end">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0">เข้าสู่ระบบสมาชิก</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body"> 
                    <form method="POST" action="{{ route('login') }}">
                        @csrf   
                        <div class="row">  
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
                                <button type="submit" class="btn btn-md btn-block btn-dark waves-effect waves-light fontWDB_Bangna">
                                    {{ __('ลงชื่อเข้าใช้งาน') }}
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
                    <div class="row pt-2 pb-2">
                        <div class="col-sm-12 text-center">
                            @if (Route::has('register'))
                                <p class="text-muted mb-0">
                                    ยังไม่มีบัญชี?
                                    <a class="text-dark ml-1" href="{{ url('register') }}"><b>{{ __('สมัครสมาชิก') }}</b></a>
                                </p> 
                            @endif 
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </div> 
    @else
    @endguest
@endsection 
@section('script')
<script>
    $(document).on('click', '#customRadio', function(event) { 
        var customRadio = $(this)[0].dataset.id;   
        fn_customRadio(customRadio);
    });

    fn_customRadio(1);
    function fn_customRadio(customRadio){
        $.post("{{ route('ajaxsenderForm.post') }}", {
            _token: "{{ csrf_token() }}",
            customRadio: customRadio,   
        })
        .done(function(data, status, error){    
        })
        .fail(function(xhr, status, error) { 
            alert('เกิดข้อผิดผลาดโปรดทำรายการใหม่อีกครั้ง'); 
        });
    }
    var show=true;
    @guest   
        $('.modprofile').modal({
            backdrop: 'static',
            keyboard: true, 
            show: show
        }); 
    @else
    @endguest
</script>
@endsection