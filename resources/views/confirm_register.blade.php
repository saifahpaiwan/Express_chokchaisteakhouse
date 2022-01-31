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
    
@endsection

@section('content')   
        <div class="box-fixed-title"> 
            <div class="container-fluid">    
                <div class="">
                    <div class="d-flex justify-content-between"> 
                        <h4 class="text-center"> 
                            <a href="{{ route('home') }}" style="color: #333;"> 
                                <i class="icon-arrow-left"></i>
                            </a>     
                        </h4>  
                        <h4 class="text-center"> สมัครสมาชิกสำเร็จ </h4>
                        <div> </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-wrap section gradient" id="" style="margin-top: 75px;">
            <div class="container"> 
                <div class="row hero-content text-center mt-3" style="background: #fff;"> 
                    <div class="col-12">
                        <div class="text-center"> 
                            <img class="icon-colored" src="{{ asset('images/icons/ok.svg') }}" title="ok.svg" style="width: 40%;"> 
                            <div> 
                                สมัครสมาชิกเสร็จเรียบร้อยแล้ว โปรดติดตามข่าวสารโปรโมชั่นดีๆสำหรับสมาชิก 
                                <span style="color: #E89E5E;">โชคชัยสเต็กเฮ้าส์</span>  ขอบคุณค่ะ
                            </div> 
                            <div class="mt-2"> 
                                <a class="btn btn-md btn-block btn-dark waves-effect waves-light" href="{{ route('home') }}">สั่งอาหาร</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
@endsection 
@section('script') 
@endsection