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
    <link href="{{ asset('libs/slick-slider/slick.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('libs/slick-slider/slick-theme.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/css-font/style5.css') }}" rel="stylesheet" type="text/css" />  
    <style>
        .custom-control-label::before {
            position: absolute;
            top: .25rem;
            left: -2rem;
            display: block;
            width: 1.5rem;
            height: 1.5rem;
            pointer-events: none;
            content: "";
            background-color: #fff;
            border: #adb5bd solid 1px;
        }
        .custom-control-label::after {
            position: absolute;
            top: .25rem;
            left: -2rem;
            display: block;
            width: 1.5rem;
            height: 1.5rem;
            content: "";
            background: no-repeat 50%/50% 50%;
        }
    </style>
@endsection

@section('content') 
    @foreach ($data['QueryProdtail'] as $row)
        <div class="box-fixed-title d-block d-sm-none" style="background: unset; border-bottom: unset;"> 
            <div class="container-fluid">    
                <div class="">
                    <div class="d-flex justify-content-between"> 
                        <h4 class="text-center"> 
                            <a href="{{ route('home') }}" style="color: #FFF;"> 
                                <i class="icon-arrow-left"></i>
                            </a>     
                        </h4> 
                        <h4 class="text-center"> </h4> 
                        <h4 class="text-center"> </h4> 
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('addToCart.post') }}">
        @csrf 
        <input type="hidden" name="itmesid" id="itmesid" value="{{$row['id']}}">  
            <section class="content-wrap section gradient" id="">
                <div class="container">
                    <div class="row hero-content text-center">
                        <div class="col-12 col-md-5"> 
                            <div class="row">
                                <div class="col-md-12 col-xl-12 text-center pd-00"> 
                                    <div class="p-0">   
                                        @if($row['tags_deleted_at']!=1)
                                            <div class="mt-1 tag-001" style="background: {{$row['bg_color']}};font-size: 1rem;">{{$row['tagName']}}</div>
                                        @endif 
                                        <div class="single-item-3" style="background: #FFF;"> 
                                            <picture>
                                                <source type="image/webp" srcset="{{ ('https://shop.chokchaisteakhouse.com/images/product/'.$row['ImgnameMain']) }}">
                                                <source type="image/jpeg" srcset="{{ ('https://shop.chokchaisteakhouse.com/images/product/'.$row['ImgnameMain']) }}">
                                                <img class=" img-fluid" src="{{ ('https://shop.chokchaisteakhouse.com/images/product/'.$row['ImgnameMain']) }}" alt="">
                                            </picture> 
                                            @if (isset($row['listimg']))
                                                @foreach ($row['listimg'] as $rowImg)
                                                <picture>
                                                    <source type="image/webp" srcset="{{ ('https://shop.chokchaisteakhouse.com/images/product/'.$rowImg['Imgname']) }}">
                                                    <source type="image/jpeg" srcset="{{ ('https://shop.chokchaisteakhouse.com/images/product/'.$rowImg['Imgname']) }}">
                                                    <img class=" img-fluid" src="{{ ('https://shop.chokchaisteakhouse.com/images/product/'.$rowImg['Imgname']) }}" alt="">
                                                </picture> 
                                                @endforeach
                                            @endif
                                        </div>   
                                        <div class="text-left box-name" style="padding: 0.5rem 15px;"> 
                                            <h2 class="header-title white-space-nowrap1" style="color: #FFF;font-weight: 600; margin-bottom: 0;"> 
                                                {{$row['name_th']}}   
                                            </h2>  
                                            <div class="white-space-nowrap1 mb-2" style="color: #FFF;"> {{$row['name_en']}} </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="row mt-2 mb-3 d-none d-sm-block">
                                <div class="col-md-12 text-left detail-pro">    
                                    <div class="text-dark text-left txt-15"> รายละเอียด </div> 
                                    <?php echo $row['detail']; ?>  
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7"> 
                            <div class="row ">
                                <div class="col-md-12">   
                                    <div class="text-dark text-left mb-1 txt-15"> เลือกสินค้า </div>  
                                    <div class="ml-2 mb-2 text-left">  
                                        <?php $n=1; ?>
                                        @foreach ($row['listdetail'] as $key=>$rowdetail)  
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="itmesdetailid" id="itmesdetailid_{{$key}}" class="custom-control-input" value="{{$rowdetail['itemsdetailId']}}" @if($n==1) checked @endif>
                                                <label class="custom-control-label" for="itmesdetailid_{{$key}}"> {{$rowdetail['options']}} <span style="color: #d48430;">{{$rowdetail['prict']}} ฿</span> </label>
                                            </div>
                                            <?php $n++; ?>
                                        @endforeach   
                                    </div>  
                                </div> 
                                @if(isset($row['list_option']))
                                    @if(count($row['list_option'])>0)
                                        @foreach ($row['list_option'] as $rowOption) 
                                            <div class="col-12 col-md-6">   
                                                <div class="text-dark text-left mb-1 mt-1 txt-15"> {{$rowOption['optionTitle']}} </div>  
                                                <div class="ml-2 text-left">   
                                                @if($rowOption['optionTypeRedio']==1)
                                                    @foreach ($rowOption['option_detail'] as $rowOptionDetail) 
                                                        <div class="d-flex mb-1">
                                                            <div class="custom-control custom-radio mr-auto">
                                                                <input type="radio" class="custom-control-input" id="listoption{{$rowOptionDetail['optionDtailid']}}" name="listoption[R-{{$rowOption['optionid']}}][Op_id]" value="{{$rowOptionDetail['optionDtailid']}}">
                                                                <label class="custom-control-label" for="listoption{{$rowOptionDetail['optionDtailid']}}"> 
                                                                    {{$rowOptionDetail['optionName']}} 
                                                                    @if($rowOptionDetail['optionPrice']!=0)
                                                                    <span style="color: #d48430;">{{$rowOptionDetail['optionPrice']}} ฿</span>
                                                                    @endif    
                                                                </label>
                                                            </div>
                                                            @if($rowOption['quantityType']=="Y")
                                                            <select id="listoption-select{{$rowOptionDetail['optionDtailid']}}" name="listoption[R-{{$rowOption['optionid']}}][quantity]" class="form-control form-control-sm" style="width: 55px;">
                                                                @for($i=1; $i<=10; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>  
                                                                @endfor
                                                            </select>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @elseif($rowOption['optionTypeRedio']==2)
                                                    @foreach ($rowOption['option_detail'] as $rowOptionDetail) 
                                                        <div class="d-flex mb-1">
                                                            <div class="custom-control custom-checkbox mr-auto">
                                                                <input type="checkbox" class="custom-control-input" id="listoption{{$rowOptionDetail['optionDtailid']}}" name="listoption[C-{{$rowOptionDetail['optionDtailid']}}][Op_id]" value="{{$rowOptionDetail['optionDtailid']}}">
                                                                <label class="custom-control-label" for="listoption{{$rowOptionDetail['optionDtailid']}}">
                                                                    {{$rowOptionDetail['optionName']}} 
                                                                    @if($rowOptionDetail['optionPrice']!=0)
                                                                    <span style="color: #d48430;">{{$rowOptionDetail['optionPrice']}} ฿</span>
                                                                    @endif
                                                                </label>
                                                            </div> 
                                                            @if($rowOption['quantityType']=="Y")
                                                            <select id="listoption-select{{$rowOptionDetail['optionDtailid']}}" name="listoption[C-{{$rowOptionDetail['optionDtailid']}}][quantity]" class="form-control form-control-sm" style="width: 55px;">
                                                                @for($i=1; $i<=10; $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>  
                                                                @endfor
                                                            </select>
                                                            @endif
                                                        </div>
                                                    @endforeach 
                                                @endif 
                                                </div>  
                                            </div> 
                                        @endforeach
                                    @endif 
                                @endif
                                <div class="col-12 pt-2"> 
                                    <div class="text-dark text-left txt-15"> ระบุจำนวน </div>  
                                    <select id="quantity" name="quantity" class="form-control mt-2">
                                        @for($i=1; $i<=15; $i++)
                                            <option value="{{$i}}">{{$i}}</option>  
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-12 pt-2"> 
                                    <div class="text-dark text-left txt-15"> รายละเอียดเพิ่มเติม </div>  
                                    <input type="text" id="moreDetails"  name="moreDetails" class="form-control mt-2" placeholder="เช่น ไม่เอาผัก, ไม่เผ็ด">
                                </div>
                                <div class="col-12 pt-2 d-none d-sm-block">
                                    <div class="text-center d-flex mb-2 mt-2">
                                        <a href="{{ route('home') }}" class="btn btn-outline-dark waves-effect waves-light mr-1">  
                                            เลือกสินค้า
                                        </a>
                                        <button type="submit" class="btn btn-dark waves-effect width-md waves-light ml-1">เพิ่มลงตะกร้า</button> 
                                    </div> 
                                </div>
                            </div> 
                            <div class="row mt-2 mb-3 d-block d-sm-none">
                                <div class="col-md-12 text-left detail-pro">    
                                    <div class="text-dark text-left txt-15"> รายละเอียด </div> 
                                    <div class="d-block d-sm-none"> 
                                        <?php echo $row['detail']; ?> 
                                    </div> 
                                    <div class="overflow-auto-120 d-none d-sm-block">
                                        <?php echo $row['detail']; ?>  
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>  
                    <div class="row mt-2">  
                        @foreach($data['QueryRelateds'] as $row) 
                            <div class="col-6 col-md-3 text-center pd-55"> 
                                <a href="{{ url('detail/'.$row->id) }}">
                                    <div class="mt-1 mb-1" style="background: #fff; border: 2px solid #fff; margin-bottom: 10px;  box-shadow: 2px 2px 4px #ddd;"> 
                                        <div style="background-image: url('https://shop.chokchaisteakhouse.com/images/product/{{$row->Imgname}}'); 
                                        background-position: center; background-size: cover; height: 200px; width: 100%;"> 
                                        </div>
                                        <div class="text-left" style="font-size: 14px;font-weight: 500;">
                                            <div class="p-2">   
                                                <div class="text-dark white-space-nowrap1">{{$row->name_th}}</div>
                                                <div class="text-dark white-space-nowrap1">{{$row->name_en}}</div>
                                                <div class="white-space-nowrap1 text-price ml-auto">{{$row->price_range}}</div>
                                            </div>
                                            @if($row->tags_deleted_at!=1)
                                                <div class="badge box-tag" style="background: {{$row->bg_color}}; position: absolute; top: 0; left: 7px;">{{$row->tagName}}</div>
                                            @endif   
                                            <div class="box-type">
                                                <img src="{{ asset('images/bgMenu/'.$row->typeicon) }}" alt="" 
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
            </section> 
            <div class="box-fixed-cart d-block d-sm-none" style="background: #FFF; border-top: 1px solid #ddd;"> 
                <div class="container-fluid">    
                    <div class="text-center p-2 d-flex mb-2 mt-2">
                        <a href="{{ route('home') }}" class="btn btn-outline-dark waves-effect waves-light mr-1" style="width: 100%;">  
                            ยกเลิก
                        </a>
                        <button type="submit" class="btn btn-dark waves-effect width-md waves-light ml-1" style="width: 100%;">เพิ่มลงตะกร้า</button> 
                    </div>   
                </div>
            </div> 
        </form>
    @endforeach
@endsection 
@section('script')
<script src="{{ asset('libs/slick-slider/slick.min.js') }}"></script>
<script> 
    $(".single-item-3").slick({ 
        dots: true, 
        slidesToScroll: 1, 
        arrows: true, 
        autoplay: true,
        autoplaySpeed: 5000,  
        slidesToShow: 1,  
    });    
</script>
@endsection