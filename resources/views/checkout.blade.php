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
<link href="{{ asset('/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/css-font/style4.css') }}" rel="stylesheet" type="text/css" />  
@endsection 
@section('content')   
        <div class="box-fixed-title2 d-block d-sm-none"> 
            <div class="container-fluid">    
                <div class="">
                    <div class="d-flex justify-content-between"> 
                        <h4 class="text-center"> 
                            <a href="{{ route('cart') }}" style="color: #333;"> 
                                <i class="icon-arrow-left"></i>
                            </a>     
                        </h4>  
                        <h4 class="text-center"> ชำระเงิน </h4>
                        <div> </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $total_op=0; 
            if(session('deliveryCart')){
                if(count(session('deliveryCart'))>0){
                    foreach(session('deliveryCart') as $key=>$row){ 
                        if($row['session_option']){  
                            foreach($row['session_option'] as $row_op){
                                if($row_op['quantity']==0){
                                    $quantity_op=1;
                                } else {
                                    $quantity_op=$row_op['quantity'];
                                }
                                $total_op+=($row_op['price']*$quantity_op);  
                            }
                        }
                    }
                } 
            } 
            $discount=0; $calculate_cost=0; $total_price=0;
            if(session('calculate_cost')){
                $total_price=session('calculate_cost')['total_price']+$total_op; 
                $calculate_cost=session('calculate_cost')['delivery_price']; 
                $km=session('calculate_cost')['km'];  
            }
        ?>  
        <form method="POST" action="{{ route('confirm_order.post') }}" enctype="multipart/form-data">
        @csrf  
            <section class="content-wrap section gradient" id="">
                <div class="container"> 
                    <div class="row hero-content text-center" style="background: #fff;"> 
                        <div class="col-12 col-md-6 text-left pb-1 pt-2">
                            <div class="box-add">
                                <div class="">
                                    <div class="text-left text-dark" style="margin: 0;font-weight: 700;"> ชื่อที่อยู่ผู้จัดส่ง </div> 
                                    <div>ชื่อ-นามสกุล : {{$data['users']->sender_fname.' '.$data['users']->sender_lname}}</div>
                                    <div>เบอร์โทร : {{$data['users']->sender_phone}}</div>   
                                    @if(session('senderForm'))  
                                        @if(session('senderForm')==1)
                                            <input type="hidden" name="time_takingHDF" id="time_takingHDF" value="">
                                            <div class=""> {{$data['users']->sender_address}} </div>     
                                        @elseif(session('senderForm')==2)
                                            <input type="hidden" name="time_takingHDF" id="time_takingHDF" value="{{$data['users']->time_taking}}">
                                            <span class="badge badge-warning" style="font-size: 12px; font-weight: 400;">
                                                <i class="mdi mdi-progress-clock"></i> 
                                                เวลาที่มารับอาหาร {{date("H:i",strtotime($data['users']->time_taking))}} น.
                                            </span>  
                                        @endif
                                    @endif
                                </div> 
                            </div>
                            @if(session('senderForm'))  
                                @if(session('senderForm')!=2)
                                    @if($data['users']->additional_address!="")
                                    <div class="box-add mt-2">
                                        <div class="text-left text-dark" style="margin: 0;font-weight: 700;"> ที่อยู่จัดส่งเพิ่มเติม </div>
                                        <div class=""> {{$data['users']->additional_address}} </div>  
                                    </div>
                                    @endif
                                @endif
                            @endif
                            <div class="box-add mt-2"> 
                                @if(session('senderForm'))  
                                    @if(session('senderForm')==1)  <i class="fa fa-motorcycle" aria-hidden="true"></i> เดลิเวอรี่ @else <i class="mdi mdi-shopping" aria-hidden="true"></i> รับเองที่ร้าน @endif 
                                @else 
                                    <i class="fa fa-motorcycle" aria-hidden="true"></i> เดลิเวอรี่
                                @endif
                                <div class="float-right" style="font-weight: 700;"> ยอดที่ต้องชำระ {{number_format(($total_price+$calculate_cost)-$discount,2)}} ฿</div>
                            </div>
                            <div class="d-none d-sm-block">
                                <h4 class="header-title text-left text-dark"> ชำระเงินด้วยการโอนผ่านธนาคาร</h4> 
                                <div> กรุณาตรวจสอบความถูกต้องในการโอนเงิน และเก็บหลักฐานการโอนเงินจนกว่าจะได้รับสินค้า เพื่อความสะดวกและรวดเร็วในการโอนเงิน</div>  
                                <hr>
                                <div class="font-13 text-right">  <?php echo "Date : ".date('d/m/Y', strtotime(date('Y-m-d'))); ?></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-left pb-1 pt-2"> 
                            @if(session('deliveryForm'))  
                                @if(session('deliveryForm')==1)
                                    <input type="hidden" name="delivery_form" id="delivery_form" value="1">  
                                    <div class="text-left pd-rev transfer mt-2"> 
                                        <div class="text-left pd-rev">
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <img class="float-right" src="{{asset('images/scb.png')}}" alt="" width="120px;" style="border: 1px solid #9e9e9e;"> 
                                                    <div class="text-dark"> ไทยพาณิชย์ (SCB) </div>
                                                    <div class="text-dark"> ชื่อบัญชี : บริษัท โชคชัยฟู้ด แอนด์ เรสโทรองท์ จำกัด </div>
                                                    <div class="mt-3 text-dark">  
                                                        เลขที่บัญชี : <span style="font-weight: 700;"> 311-3-03246-5 </span>
                                                        <button class="btn btn-md btn-dark waves-effect waves-light fontWDB_Bangna font-13 float-right mt-1" style="padding: 0 1rem;" type="button"
                                                        onclick="setClipboard('311-3-03246-5')"> 
                                                            <i class="mdi mdi-content-copy"></i> คัดลอก
                                                        </button>
                                                    </div>
                                                    <div class="row mt-3"> 
                                                        <div class="col-6 col-md-6"> 
                                                            <label for="date_transferred" class="col-form-label font-13">{{ __('วันที่โอนเงิน') }}</label> 
                                                            <input id="date_transferred" type="date" class="form-control @error('date_transferred') is-invalid @enderror" name="date_transferred" required autocomplete="date_transferred" autofocus>
                                                            @error('date_transferred')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-6 col-md-6"> 
                                                            <label for="time_transferred" class="col-form-label font-13">{{ __('เวลาโอนเงิน') }}</label> 
                                                            <input id="time_transferred" type="time" class="form-control @error('time_transferred') is-invalid @enderror" name="time_transferred" required autocomplete="time_transferred" autofocus>
                                                            @error('time_transferred')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 text-dark">
                                                        <div class="text-center mb-1 up-img" style="padding: 0.2rem;border: 1px solid #ec9e5e; border-radius: 5px;display: none;">
                                                            <img for="file-upload" src="" class="img-file-upload" style="width: 25%; border: 1px solid #ddd;">
                                                        </div>  
                                                        <label for="file-upload" class="custom-file-upload">
                                                            <div> <i style="font-size: 20px;" class="icon-cloud-upload"> </i> </div>
                                                            <div>แนบสลิปโอนเงิน</div>
                                                            <div>ขนาดรูปไม่ควรเกิน 1 MB เฉพาะไฟล์ .jpg และ .png เท่านั้น</div> 
                                                        </label>
                                                        <input id="file-upload" name="file_upload" type="file"/> 
                                                    </div>   
                                                    <div class="d-block d-sm-none">
                                                        <h4 class="header-title text-left text-dark"> ชำระเงินด้วยการโอนผ่านธนาคาร</h4> 
                                                        <div> กรุณาตรวจสอบความถูกต้องในการโอนเงิน และเก็บหลักฐานการโอนเงินจนกว่าจะได้รับสินค้า เพื่อความสะดวกและรวดเร็วในการโอนเงิน</div>  
                                                        <hr>
                                                        <div class="font-13 text-right">  <?php echo "Date : ".date('d/m/Y', strtotime(date('Y-m-d'))); ?></div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>  
                                        <div class="p-2 d-none d-sm-block mt-3 text-right">  
                                            <div class="text-left "> หากตรวจสอบข้อมูลเรียบร้อยแล้ว คลิก "ยืนยันการสั่งซื้อ" </div>
                                            <button type="submit" class="btn btn-md btn-dark waves-effect waves-light float-right"> ยืนยันการสั่งซื้อ </button>  
                                        </div> 
                                    </div>
                                @else
                                    <input type="hidden" name="delivery_form" id="delivery_form" value="2"> 
                                    @if(session('senderForm'))  
                                        @if(session('senderForm')==1) 
                                            <div>
                                                <img src="{{ asset('images/dll.png') }}" alt="" style="width: 50%;">
                                                <div> ชำระเป็นเงินสดกับไรเดอร์ </div>
                                            </div>
                                        @else
                                            <div>
                                                <img src="{{ asset('images/3058931.png') }}" alt="" style="width: 50%;filter: grayscale(1);">
                                                <div class="mt-2"> ชำระเป็นเงินสดที่ร้าน  </div>
                                            </div>
                                        @endif
                                    @endif
                                @endif 
                            @endif
                        </div>
                    </div>
                </div>
            </section>  
            <div class="box-fixed-cart d-block d-sm-none"> 
                <div class="p-2"> 
                    <div class="text-center box-btn-action"> 
                        <button type="submit" class="btn" style="padding: 0 3rem;"> 
                            <h4 style="color: #FFF;"> ยืนยันการสั่งซื้อ </h4>    
                        </button>  
                    </div>   
                </div>
            </div> 
        </form>   
@endsection 
@section('script') 
<script src="{{ asset('/libs/dropzone/dropzone.min.js') }}"></script>
<script>
    @error('file_upload')     
        $.toast({
            heading:"ผิดผลาด ?",
            text:'กรุณาแนบหลักฐานการชำระเงิน !',
            hideAfter:!1,
            position:"top-right",
            loaderBg:"#bf441d",
            icon:"error", 
            stack:1
        })
    @enderror

    $(document).on('change', '#file-upload', function(event) { 
        $('.up-img').hide();
        $('.img-file-upload').attr('src', "{{asset('images/no-image.jpg')}}");
        var Images = $('#file-upload'); 
        if ( Images[0].files[0] ){
            $('.up-img').show();
            $('.img-file-upload').attr('src', window.URL.createObjectURL(Images[0].files[0]) );
        }
    });

    function setClipboard(value) {
        $.toast({
            heading: "<div class='text-center' style='font-family: WDB_Bangna;'> คัดลอกเลขที่บัญชี </div>", 
            position:"top-right",
            loaderBg:"#333",
            stack:1
        })
        var tempInput = document.createElement("input");
        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
        tempInput.value = value; 
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
    }
</script>
@endsection