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
<link href="{{ asset('css/css-font/style6.css') }}" rel="stylesheet" type="text/css" />  
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
                        <h4 class="text-center"> ออเดอร์วันนี้ </h4>
                        <div> </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-wrap section gradient">
            <div class="container"> 
                <div class="row hero-content text-center border-002"> 
                    <div class="col-12 pd-00">
                        <ul class="nav nav-tabs tabs-bordered nav-justified">
                            <li class="nav-item">
                                <a href="{{ url('/order') }}" class="nav-link @if(!isset($_GET['st'])) active @endif"> 
                                    <span class="">ออเดอร์</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/order?st=2') }}" class="nav-link @if(isset($_GET['st'])) @if($_GET['st']==2) active @endif @endif"> 
                                    <span class="">กำลังทำ</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/order?st=3') }}" class="nav-link @if(isset($_GET['st'])) @if($_GET['st']==3) active @endif @endif"> 
                                    <span class="">กำลังส่ง</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/order?st=4') }}" class="nav-link @if(isset($_GET['st'])) @if($_GET['st']==4) active @endif @endif"> 
                                    <span class="">สำเร็จ</span>
                                </a>
                            </li>
                        </ul>
                        <div class="mt-2 p-2">
                            <div> 
                                @if(count($data['result_order'])>0)
                                    @foreach($data['result_order'] as $row) 
                                        <a href="{{ url('/orderviwe/'.$row->orders_id) }}">
                                            <div class="d-flex text-left mb-2">
                                                <div> 
                                                    <div class="st-1 text-center"> 
                                                        <div class="white-space-nowrap1">{{$row->order_code}}</div>
                                                        <div>
                                                            @if($row->delivery_form2==1)
                                                                <i class="fa fa-motorcycle" aria-hidden="true"></i> เดลิเวอรี่
                                                            @else 
                                                                <i class="mdi mdi-shopping" aria-hidden="true"></i> รับเองที่ร้าน
                                                            @endif
                                                        </div> 
                                                    </div>     
                                                </div>
                                                <div class="pl-2 pr-2"> 
                                                    <div class="white-space-nowrap2">จัดส่ง {{$row->sender_address}}</div>
                                                    <div class=""> {{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</div>
                                                </div>
                                                <div class="text-right ml-auto"> 
                                                    <div style="width: 70px;color: #f10; font-weight: 700;"> {{number_format($row->net_total, 2)}} ฿ </div>     
                                                </div>
                                            </div>
                                        </a>  
                                    @endforeach
                                @else 
                                    <div class="text-center mt-5">
                                        <img src="{{ asset('images/black.png') }}" alt="" style="width: 30%;filter: contrast(0);">
                                        <div> <h4 style="color: #c7c7c7;"> คุณไม่มีรายการในขณะนี้ !</h4> </div> 
                                    </div>
                                @endif 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>  
@endsection 
@section('script') 
@endsection