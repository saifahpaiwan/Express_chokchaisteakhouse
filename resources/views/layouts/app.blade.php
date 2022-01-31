<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J3WWH08S46"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date()); 
        gtag('config', 'G-J3WWH08S46');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- Primary Meta Tags -->
    <title>โชคชัยสเต็กเฮ้าส์ เดลิเวอรี่</title>
    <meta name="title" content="CHOKCHAISTEAK.EXPRESS">
    <meta name="description" content="โชคชัยสเต็คเฮ้าส์ เสิร์ฟความอร่อยจากครัวส่งตรงถึงคุณ ด้วยบริการจัดเลี้ยงนอกสถานที่ ทางเลือกสำหรับการทานอาหาร ในรูปแบบปาร์ตี้ส่วนตัวที่บ้าน งานเลี้ยงระดับองค์กร งานเลี้ยงในโอกาสพิเศษต่างๆ ด้วยคุณภาพอาหารและพนักงานที่เชี่ยวชาญ พร้อมเครื่องมือครบครัน ในบรรยากาศและสถานที่ของคุณเอง เพื่อสร้างความประทับใจให้แก่คนพิเศษของคุณ ออกแบบความอร่อย ตามความต้องการของคุณ ติดต่อสอบถามเพิ่มเติมได้ที่ 0 2532 2846 ถึง 8 ต่อ 1710">
     
    @yield('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <link rel="shortcut icon" href="{{ asset('images/LOGO_black.png') }}">
    <!-- Styles --> 
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />  
    <link href="{{ asset('libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" /> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/css-font/style1.css') }}" rel="stylesheet" type="text/css" />  
    <style>
         @font-face {
            font-family: Copper Penny DTP;
            src: url({{ asset('/fonts/Copper Penny DTP.otf') }});
        }
    </style>
    @yield('style')
</head>
<body class="custom-background">
    <header class=""> 
        <!-- //==========NAV===========// -->
        <nav class="navbar navbar-expand-lg navbar-custom navbar-dark borderBottom-nav" style="padding: .5rem 1rem .5rem 0.1rem;"> 
            <div class="container">    
                <div class="d-flex">
                    <div>
                        <a class="navbar-brand logo" href="{{ route('home') }}" class="">  
                            @guest
                                <div class="ml-1" style="color: #333">โชคชัยสเต็กเฮ้าส์ <span style="color: #E89E5E;font-size: 13px;"> เดลิเวอรี่ </span> </div>
                            @else
                                @if(Auth::user()->avatar)
                                    <!-- <img src="{{ Auth::user()->avatar }}" alt="" style="width: 25px;"> -->
                                    <img src="{{ asset('images/Express-Logo2.png') }}" alt=""   height="35" class="">
                                    <!-- <div style="color: #333">สวัสดี <span style="color: #E89E5E;font-size: 13px;">  {{ Auth::user()->name }} </span> </div> -->
                                @else 
                                    <div class="d-flex"> 
                                        <img src="{{ asset('images/Express-Logo2.png') }}" alt=""   height="35">
                                        <!-- <div style="color: #333" class="ml-2">สวัสดี <span style="color: #E89E5E;font-size: 13px;">  {{ Auth::user()->name }} </span> </div>  -->
                                    </div> 
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
                        <div class="dropdown d-none d-sm-block">
                            <button class="btn dropdown-toggle" type="button" id="itmes2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="padding: 10px 0;">
                                <i class="icon-basket-loaded" style="font-size: 20px;"></i>
                                <span class="num-cart2">
                                    @if(session('deliveryCart')) 
                                        @if(count(session('deliveryCart'))>0)   
                                            {{count(session('deliveryCart'))}}
                                        @endif
                                    @else 
                                        0
                                    @endif
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg" x-placement="bottom-end">
                                <div class="dropdown-header noti-title">
                                    <h4 class="text-overflow m-0"><span class="float-right">
                                    <span class="badge badge-danger float-right num-cart3">
                                        @if(session('deliveryCart')) 
                                            @if(count(session('deliveryCart'))>0)   
                                                {{count(session('deliveryCart'))}}
                                            @endif
                                        @else 
                                            0
                                        @endif
                                    </span>
                                    </span>ตะกร้าสินค้า</h4>
                                </div> 
                                <div class="slimScrollDiv">
                                    <div class="slimscroll noti-scroll drop-cart"> 
                                        <?php $total=0; $total_op=0; ?> 
                                        @if(session('deliveryCart')) 
                                            @if(count(session('deliveryCart'))>0)   
                                                @foreach(session('deliveryCart') as $key=>$row) 
                                                    @if($row['session_option'])   
                                                        @foreach($row['session_option'] as $row_op) 
                                                        <?php 
                                                            if($row_op['quantity']==0){
                                                                $quantity_op=1;
                                                            } else {
                                                                $quantity_op=$row_op['quantity'];
                                                            }
                                                            $total_op+=($row_op['price']*$quantity_op); ?>
                                                        @endforeach
                                                    @endif
                                                    <?php $total+=($row['price']*$row['quantity']); ?> 
                                                    <a href="{{ url('/cart') }}" class="dropdown-item">
                                                        <div class="d-flex">
                                                            <div> <img src="{{ 'https://shop.chokchaisteakhouse.com/images/product/'.$row['Imgname'] }}" alt="slider-img" style="width: 50px; height: 50px;"> </div>
                                                            <div class="ml-1" style="font-size: 13px;"> 
                                                                <div style="width: 130px;" class="white-space-nowrap1">{{$row['proname']}}</div> 
                                                                <div style="width: 130px;font-size: 10px;" class="white-space-nowrap1 text-muted" style="font-size: 10px;">ราคา {{$row['price']}} บาท</div> 
                                                                <div style="width: 130px;font-size: 10px;" class="white-space-nowrap1 text-muted" style="font-size: 10px;">จำนวน {{$row['quantity']}} ชิ้น</div> 
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @endif
                                        @else 
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div style="font-size: 13px; margin: 0 1rem;">  
                                                <i class="icon-basket-loaded"></i> 
                                                ไม่มีรายการสินค้า !  
                                            </div>
                                        </a>
                                        @endif 
                                    </div> 
                                </div>  
                                @if(session('deliveryCart')) 
                                    @if(count(session('deliveryCart'))>0)  
                                        <div class="d-flex"> 
                                            <a href="{{ url('/cart') }}" class="dropdown-item  text-primary notify-item notify-all"
                                            style="padding-right: 0;">
                                                ชำระเงิน <i class="fi-arrow-right"></i>
                                            </a>
                                            <a href="#" class="dropdown-item text-right text-primary notify-item notify-all totle-price-01"
                                            style="padding-left: 0;">
                                                <?php echo number_format(($total+$total_op),2); ?> ฿ 
                                            </a> 
                                        </div> 
                                    @endif
                                @else  
                                    <div class="box-all1"> 
                                        <a href="{{ url('/') }}" class="dropdown-item text-center text-primary notify-item notify-all">
                                            เลือกสินค้า <i class="fi-arrow-right"></i>
                                        </a> 
                                    </div>
                                @endif   
                            </div>
                        </div>
                        <div class="ml-3">
                            <a href="{{ route('order') }}">   
                                <span class="d-block d-sm-none"><i class="mdi mdi-file-document-box-outline" style="font-size: 25px;"></i></span>
                                <span class="d-none d-sm-block"><i class="mdi mdi-file-document-box-outline" style="font-size: 25px;"></i> บิล </span> 
                            </a>      
                        </div> 
                        <div class="ml-3">
                            <a href="{{ route('profile') }}">  
                                <span class="d-block d-sm-none"><i class="mdi mdi-account-circle-outline" style="font-size: 25px;"></i></span>
                                <span class="d-none d-sm-block"><i class="mdi mdi-account-circle-outline" style="font-size: 25px;"></i> โปรไฟล์ </span> 
                            </a>      
                        </div>
                        
                    @endguest   
                </div> 
            </div>
        </nav> 
        @yield('content') 
        <footer class="footer d-none d-sm-block">
	        <div class="container">
				<div class="row"> 
                    <div class="col-6 col-md-3">
                        <div style="color: #FFF;"><h4>โชคชัยสเต็ก</h4></div>
                        <div class="font-footerbox"> <a style="color: #FFF;" href="{{ route('home') }}">หน้าแรก </a></div> 
                        <div class="font-footerbox"> <a style="color: #FFF;" href="{{ route('profile') }}">โปรไฟล์ </a></div> 
                    </div>
                    <div class="col-6 col-md-3">
                        <div style="color: #FFF;"><h4>Social </h4></div>
                        <div class="font-footerbox"> <a style="color: #FFF;" href="https://www.facebook.com/chokchaisteakhouse"><i class="mdi mdi-facebook-box"></i> Facebook </a></div> 
                        <div class="font-footerbox"> <a style="color: #FFF;" href="https://www.instagram.com/chokchaisteakhouse/"><i class="mdi mdi-instagram"></i> Instagram </a></div> 
                        <div class="font-footerbox"> <a style="color: #FFF;" href="https://lin.ee/mU472oG"><i class="fab fa-line"></i> Line Official </a></div>  
                        <div class="font-footerbox"> <a style="color: #FFF;" href="https://www.youtube.com/channel/UC7FZt-3FvqufUOQ9ggoKdKQ"><i class="icon-social-youtube"></i> Youtube Channel</a></div> 
                    </div> 
                    <div class="col-12 col-md-3">
                        <div style="color: #FFF;"><h4>สมาชิก</h4></div>
                        <div class="font-footerbox"> <a style="color: #FFF;" href="{{ url('/login') }}">ล็อกอินเข้าสู่ระบบ </a></div> 
                        <div class="font-footerbox"> <a style="color: #FFF;" href="{{ url('/register') }}">ลงทะเบียนเป็นสมาชิก </a></div>
                        <div class="font-footerbox"> <a style="color: #FFF;" href="{{ url('/order') }}">การสั่งซื้อ </a></div>  
                    </div>
                    <div class="col-12 col-md-3">
                        <div style="color: #FFF;"><h4>ติดต่อเรา</h4></div>
                        <div class="font-footerbox" style="color: #FFF;">
                            บริษัท โชคชัยฟู้ด แอนด์ เรสโทรองท์ จำกัด
                            294 หมู่ 8 ถ. วิภาวดีรังสิต ต. คูคต อ. ลำลูกกา จ.ปทุมธานี 12130
                            <br>โทรศัพท์ : 025320168 ถึง 9
                            <br>Email : mkt@farmchokchai.net 
                        </div> 
                    </div> 
                </div> 
                <div class="pt-2">
                    <div style="color: #FFF;font-size: 0.7rem;"> 
                        Copyright ©2021 All Rights Reserved by Chokchai Steakhouse. 
                    </div>  
                </div> 
            </div>  
        </footer>
    </header> 
 
    <!-- Scripts --> 
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>                        
    <script src="{{ asset('js/jquery.easing.min.js') }}" type="text/javascript"></script>  
    <script src="{{ asset('js/app.js') }}"></script> 
    <script src="{{ asset('js/jspage.main.js') }}"></script> 
    <script src="{{ asset('libs/jquery-toast/jquery.toast.min.js') }}"></script>   
    <script>     
        $(window).scroll(function(){
            if ($(window).scrollTop() >= 205) {
                $('#menu-nav').addClass('fixed-header');   
            }
            else {
                $('#menu-nav').removeClass('fixed-header');   
            }
        }); 
    </script>
    @yield('script')
</body>
</html>