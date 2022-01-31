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
<link href="{{ asset('css/css-font/style2.css') }}" rel="stylesheet" type="text/css" />   
<style>
    .nav-pills .nav-link { 
        background: #ffffffab;
    }
    .nav>li>a:focus, .nav>li>a:hover {
        text-decoration: none;
        background-color: #ffffffe8;
        color: #eda85e;
    } 

    .bg-container-01 { 
        background-image: linear-gradient(rgb(0 0 0 / 50%), rgb(0 0 0 / 50%)), url({{ asset('images/BG0001.jpg') }});
        background-position: center;
        background-size: cover;
    }
    .location {
        font-size: 20px;
        padding: 0.5rem;
        background: #ffffffcf;
    }
   
</style>
@endsection

@section('content')     
    <div class="container pd-00 border1-nav bg-container-01">
        <div class="location">
            <div class="d-flex">
                <div class="text-danger mr-2">  <i class="mdi mdi-map-marker-multiple"> </i> </div>
                <div class="text-location white-space-nowrap1 w-100 txt-add">
                    @if(session('mrakapp')) {{session('mrakapp')['location']}} @else โปรดระบุตำแหน่งที่จัดส่ง. @endif
                </div>
                <a href="{{ url('/location') }}" class="ml-2 flex-shrink-1" ><i class="icon-note"></i></a> 
            </div>
        </div>   
        <div class="text-center padding-bg">
            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#dl1" class="nav-link @if(session('senderForm')) @if(session('senderForm')==1) active @endif @else active  @endif" id="customRadio" data-id="1"> 
                        <span class=""><i class="fa fa-motorcycle" aria-hidden="true"></i> เดลิเวอรี่</span>
                    </a>
                </li>
                <li class="ml-2 nav-item">
                    <a href="#dl2" class="nav-link @if(session('senderForm')) @if(session('senderForm')==2) active @endif  @endif" id="customRadio" data-id="2"> 
                        <span class=""><i class="mdi mdi-shopping" aria-hidden="true"></i> รับเองที่ร้าน</span>
                    </a>
                </li>  
            </ul> 
        </div>   
    </div> 
    <!-- //==========NAV===========// -->
     <section class="content-wrap section gradient" id="">
        <div class="container">   
            <div class="row"> 
                <div class="col-12 col-md-12 pd-00">
                    <div class="table-responsive" id="menu-nav" style="border-bottom: 1px solid #dee2e6;background: #FFF;">  
                        <ul class="nav tabs-bordered nav-justified" style="display: flex; flex-wrap: nowrap;"> 
                            <li class="nav-item ml-1 mr-1">
                                <a href="{{ route('home') }}" class="nav-link active"> 
                                    <span class="white-space" style="font-weight: 700;"> เมนูทั้งหมด </span>
                                </a>
                            </li> 
                            @if(isset($data['Querysubs'])) 
                                @foreach($data['Querysubs'] as $row) 
                                <li class="nav-item ml-1 mr-1">
                                    <a href="#subs{{$row->id}}" data-toggle="tab" aria-expanded="false" class="nav-link" data-id="{{$row->id}}"> 
                                        <span class="white-space" style="font-weight: 700;">{{$row->name}}</span>
                                    </a>
                                </li>    
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-12 pb-5"> 
                    <div class="tab-content">
                        <?php $n=1; ?>
                        @foreach($data['QueryproductItems'] as $row1) 
                            <div class="tab-pane mt-2 mb-2" id="subs{{$row1['productSubid']}}">
                                <div class="row pd-55">
                                    <div class="text-dark col-12 text-left" id="subs{{$row1['productSubid']}}"> 
                                        <h4> {{$row1['productSubname']}} </h4>
                                    </div> 
                                @foreach($row1['list'] as $row)   
                                    <div class="col-6 col-md-3 text-center pd-00"> 
                                        <a href="{{ url('detail/'.$row['id']) }}">
                                            <div class="mt-1 mb-1" style="background: #fff; border: 2px solid #fff; margin-bottom: 10px;  box-shadow: 2px 2px 4px #ddd;"> 
                                                <div style="background-image: url('https://shop.chokchaisteakhouse.com/images/product/{{$row['proImgname']}}'); 
                                                background-position: center; background-size: cover; height: 200px; width: 100%;"> 
                                                </div>
                                                <div class="text-left" style="font-size: 14px;font-weight: 500;">
                                                    <div class="p-2">   
                                                        <div class="text-dark white-space-nowrap1">{{$row['itemsName_th']}}</div>
                                                        <div class="text-dark white-space-nowrap1">{{$row['itemsName_en']}}</div>
                                                        <div class="white-space-nowrap1 text-price ml-auto">{{$row['price_range']}}</div>
                                                    </div>
                                                    @if($row['tags_deleted_at']!=1)
                                                        <div class="badge box-tag" style="background: {{$row['bg_color']}}; position: absolute; top: 0; left: 7px;">{{$row['tagName']}}</div>
                                                    @endif   
                                                    <div class="box-type">
                                                        <img src="{{ asset('images/bgMenu/'.$row['typeicon']) }}" alt="" 
                                                        style="width: 15px; filter: invert(1)"> 
                                                    </div>
                                                    <div class="d-flex bg-btn-product"> 
                                                        <div class="p-1 w-100 text-center"> <span style="color: #FFF;"> ADD TO ORDER </span> </div> 
                                                    </div> 
                                                </div>  
                                            </div>
                                        </a>
                                    </div> 
                                @endforeach
                                </div>
                            </div>   
                        <?php $n++; ?>
                        @endforeach
 
                        <div class="mt-2 mb-2" id="subs-all">
                            <div class="row pd-55"> 
                            <?php $n=1; ?>
                            @foreach($data['QueryproductItems'] as $row1) 
                            @foreach($row1['list'] as $row)   
                                <div class="col-6 col-md-3 text-center pd-00"> 
                                    <a href="{{ url('detail/'.$row['id']) }}">
                                        <div class="mt-1 mb-1" style="background: #fff; border: 2px solid #fff; margin-bottom: 10px;  box-shadow: 2px 2px 4px #ddd;"> 
                                            <div style="background-image: url('https://shop.chokchaisteakhouse.com/images/product/{{$row['proImgname']}}'); 
                                            background-position: center; background-size: cover; height: 200px; width: 100%;"> 
                                            </div>
                                            <div class="text-left" style="font-size: 14px;font-weight: 500;">
                                                <div class="p-2">   
                                                    <div class="text-dark white-space-nowrap1">{{$row['itemsName_th']}}</div>
                                                    <div class="text-dark white-space-nowrap1">{{$row['itemsName_en']}}</div>
                                                    <div class="white-space-nowrap1 text-price ml-auto">{{$row['price_range']}}</div>
                                                </div>
                                                @if($row['tags_deleted_at']!=1)
                                                    <div class="badge box-tag" style="background: {{$row['bg_color']}}; position: absolute; top: 0; left: 7px;">{{$row['tagName']}}</div>
                                                @endif   
                                                <div class="box-type">
                                                    <img src="{{ asset('images/bgMenu/'.$row['typeicon']) }}" alt="" 
                                                    style="width: 15px; filter: invert(1)"> 
                                                </div>
                                                <div class="d-flex bg-btn-product"> 
                                                    <div class="p-1 w-100 text-center"> <span style="color: #FFF;"> สั่งเลย! </span> </div> 
                                                </div> 
                                            </div>  
                                        </div>
                                    </a>
                                </div> 
                            @endforeach
                            <?php $n++; ?>
                            @endforeach
                            </div>
                        </div>  
                        
                    </div>
                </div>
            </div> 
        </div>
    </section>  
    <div class="box-fixed-cart d-block d-sm-none"> 
        <div class="">    
            <div class="p-2">
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
                        @endforeach   
                            <div class="d-flex justify-content-between box-btn-action"> 
                                <h4 style="color: #FFF;"> <i class="icon-basket-loaded"></i> {{count(session('deliveryCart'))}} </h4>
                                <h4> <a style="color: #FFF;padding: 0 3rem;" href="{{ url('/cart') }}"> ตะกร้าสินค้า </a></h4>
                                <h4 style="color: #FFF;"> <?php echo number_format(($total+$total_op),2); ?> ฿</h4> 
                            </div> 
                    @endif
                @else 
                    <div class="d-flex justify-content-between box-btn-action"> 
                        <h4 style="color: #FFF;"> <i class="icon-basket-loaded"></i> 0 </h4>
                        <h4 style="color: #FFF;"> เลือกสินค้า </h4>
                        <h4 style="color: #FFF;"> 0 ฿</h4> 
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
                                <a href="https://liff.line.me/1656041621-p2eN2RJV" class="btn btn-xs btn-line waves-effect width-lg waves-light mt-1 ml-1"><i class="fab fa-line"></i> Login Line</a> 
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
<!-- <script type="text/javascript" src="https://api.longdo.com/map/?key=3c1b841d540af619fd9766a87c32834d"></script> -->
<script>
    $(document).on('click', 'a[data-toggle="tab"]', function(event) {    
        $('#subs-all').hide();
        if(id==0){
            $('.tab-pane').css({'display':'block'});
        } else {
            $('.tab-pane').hide();
            var id=$(this)[0].dataset.id;
            $('#subs'+id).show();
        } 
    });

    $(document).on('click', '#customRadio', function(event) { 
        var customRadio = $(this)[0].dataset.id;   
        fn_customRadio(customRadio);
    });
 
    function fn_customRadio(customRadio){
        $.post("{{ route('ajaxsenderForm.post') }}", {
            _token: "{{ csrf_token() }}",
            customRadio: customRadio,   
        })
        .done(function(data, status, error){  
            location.reload();  
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

@if(!session('mrakapp')) 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }  
    function showPosition(position) {
        // console.log("Latitude: " +position.coords.latitude+" Longitude: " + position.coords.longitude); 
        var result_lat = new Number(position.coords.latitude).toFixed(6);
        var result_lon = new Number(position.coords.longitude).toFixed(6);
        rerverseGeocoding(result_lat, result_lon);  
    }

    function rerverseGeocoding(result_lat, result_lon) { 
        $('.txt-add').html(' <i style="font-size: 20px;" class="mdi mdi-spin mdi-loading"></i>');
        $.get("https://api.longdo.com/map/services/address?", {
            _token: "{{ csrf_token() }}", 
            key: '3c1b841d540af619fd9766a87c32834d',
            lon: result_lon,
            lat: result_lat
        })
        .done(function(data, status, error){  
            if(error.status == 200){  
                var road=" ";
                if(data.road){ road=data.road } 
                $('.txt-add').text("ตำแหน่งที่อยู่จัดส่ง "+road+" "+data.subdistrict+"  "+data.district+" "+data.province+" "+data.postcode); 
                $.post("{{ route('mrakapp.post') }}", {
                    _token: "{{ csrf_token() }}",
                    road: road,
                    subdistrict: data.subdistrict,
                    district: data.district,
                    province: data.province,
                    postcode: data.postcode,
                    lat: result_lat, 
                    lon: result_lon,   
                })
                .done(function(data, status, error){   
                })
                .fail(function(xhr, status, error) { 
                   location.reload();
                });   
            }
        })
        .fail(function(xhr, status, error) { 
           location.reload();
        }); 
    }
@endif 
</script>

@endsection