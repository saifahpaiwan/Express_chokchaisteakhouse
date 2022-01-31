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
<link href="{{ asset('css/css-font/style3.css') }}" rel="stylesheet" type="text/css" />  
<style>
    .edit-pro{
        position: absolute;
        left: 14px;
        background: #ffffffb0;
        padding: 0.2rem 0.5rem;
        border-bottom-right-radius: 5px;
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
                        <h4 class="text-center"> รายการอาหารที่สั่ง </h4> 
                        <h4 class="text-center"> </h4> 
                    </div>
                </div>
            </div>
        </div>
        <section class="content-wrap section gradient">
            <div class="container"> 
                <div class="row hero-content text-center" style="background: #fff;"> 
                    @if(session('senderForm'))  
                        @if(session('senderForm')!=2)
                        <div class="col-md-12 text-left pb-1 pt-2">
                            <div class="box-add">
                                <div class="text-left text-dark d-flex" style="margin: 0; font-weight: 700;">  
                                    @if(session('mrakapp')) 
                                        <div class="white-space-nowrap1 w-100">
                                            <i class="mdi mdi-crosshairs-gps"></i> {{session('mrakapp')['location']}}   
                                        </div> 
                                        <a href="{{ url('/location?page=cart') }}" class="flex-shrink-1"><i class="icon-note"></i></a>
                                    @else 
                                        <div class="white-space-nowrap1 w-100">
                                            <i class="mdi mdi-crosshairs-gps"></i> ระบุตำแหน่งที่อยู่จัดส่ง .
                                        </div> 
                                        <a href="{{ url('/location?page=cart') }}" class="flex-shrink-1"><i class="icon-note"></i></a> 
                                    @endif 
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-12 text-left pb-1 pt-2">
                            <div class="box-add">
                                <div class=""> 
                                    <div class="text-left text-dark" style="margin: 0; font-weight: 700;"> 
                                        <i class="mdi mdi-map-marker-multiple"> </i> ที่อยู่จัดส่งเพิ่มเติม  
                                    </div> 
                                    <input id="address" type="text" class="mt-2 form-control form-control-sm @error('additional_address') is-invalid @enderror" name="additional_address" required autocomplete="additional_address" autofocus 
                                    value="@if($data['users']->additional_address) {{$data['users']->additional_address}} @endif" placeholder="ระบุที่อยู่จัดส่งเพิ่มเติมหรือสถานที่ใกล้เคียง.  " onblur="fnonblur()">
                                    @error('additional_address')
                                        <div class="alert alert-danger text-danger mt-2" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true" style="color: #dc3545;">×</span>
                                            </button>
                                            <i class="mdi mdi-information mr-2"></i> {{ $message}}
                                        </div>  
                                    @enderror 
                                </div>
                            </div>
                        </div>
                        @else 
                        <div class="col-md-12  pt-2">
                            <div class="box-add">
                                <h4 style="margin: 0;" class="text-center"> <i class="mdi mdi-shopping" aria-hidden="true"></i> รับเองที่ร้าน </h4>
                            </div>
                        </div> 
                        <div class="col-md-12 text-left pb-1 pt-2">
                            <div class="box-add">
                                <div class=""> 
                                    <div class="text-left text-dark" style="font-weight: 700;"> 
                                        <i class="mdi mdi-progress-clock"></i> ระบุเวลาที่มารับอาหาร
                                    </div> 
                                    <div class="ml-2 w-100">
                                        <input id="time_taking" type="time" class="mt-2 form-control form-control-sm @error('time_taking') is-invalid @enderror" name="time_taking" required autocomplete="time_taking" autofocus
                                        onblur="time_takingblur()">
                                        @error('time_takingHDF')
                                            <div class="alert alert-danger text-danger mt-2" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" style="color: #dc3545;">×</span>
                                                </button>
                                                <i class="mdi mdi-information mr-2"></i> {{ $message}}
                                            </div>  
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                    <div class="col-md-12 text-left pb-2 pt-1">
                        <div class="box-add"> 
                            <div class="text-left text-dark" style="margin: 0;font-weight: 700;"> 
                                <i class="mdi mdi-account-circle-outline"></i> ชื่อผู้จัดส่ง 
                                <a href="{{ url('/sender?page=cart') }}" style="float: right;"><i class="icon-note"></i></a>
                            </div> 
                            <div>ชื่อ-นามสกุล : {{$data['users']->sender_fname.' '.$data['users']->sender_lname}}</div>
                            <div>
                                เบอร์โทร : {{$data['users']->sender_phone}}
                                <span class="text-danger" style=" margin-left: 10px;"> (*โปรดระบุเบอร์โทรที่สามารถติดต่อได้) </span>
                            </div>  
                        </div> 
                        
                        @if(session("error"))
                            <div class="alert alert-danger text-danger mt-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="color: #dc3545;">×</span>
                                </button>
                                <i class="mdi mdi-information mr-2"></i> {{session("error")}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row  hero-content text-center mt-2 pb-2" style="background: #fff;">
                    <div class="col-6 text-left text-dark"> <h4>รายการ </h4> </div>
                    <div class="col-6 text-right text-dark">  <a href="{{ route('home') }}"> <h4><i class="mdi mdi-gesture-double-tap"></i> สั่งอาหารเพิ่ม</h4> </a> </div>
                    <?php $total=0; $total_op=0; ?>
                    @if(session('deliveryCart'))  
                        @foreach(session('deliveryCart') as $key=>$row) 
                            <div class="col-12 box-id-{{$row['detail_id']}}">  
                                <div class="d-flex mt-1 mb-1"> 
                                    <div class="">  
                                        <img src="{{ 'https://shop.chokchaisteakhouse.com/images/product/'.$row['Imgname'] }}" alt="" class="box-product">
                                        <!-- <a class="edit-pro" href="{{ url('/detail/'.$row['id'].'?op='.$row['indexid']) }}"><i class="icon-note"></i></a> -->
                                    </div>
                                    <div class="text-left pl-2 pr-2 text-product1 mr-auto"> 
                                        <div class="text-dark white-space-nowrap1" style="font-weight: 600;"> {{$row['proname']}} </div>    
                                        <div class="text-dark white-space-nowrap1">ราคา {{number_format($row['price'])}} บาท</div>  
                                        <div class="white-space-nowrap2">
                                            @if($row['moreDetails'])
                                                <i class="mdi mdi-circle-outline"></i> {{$row['moreDetails']}}
                                            @endif
                                        </div>  
                                    </div>
                                    <div class="white-space-nowrap1 text-price pl-2 pr-2">
                                        <select id="quantity{{$row['indexid']}}" name="quantity" class="form-control form-control-sm" style="width: 55px;" data-id="{{$row['indexid']}}">
                                            @for($i=1; $i<=15; $i++)
                                                <option @if($row['quantity']==$i) selected @endif value="{{$i}}">{{$i}}</option>  
                                            @endfor
                                        </select>
                                    </div> 
                                    <div class="white-space-nowrap1 text-price">
                                        <div style="padding: 0.3rem; border: 1px solid;  border-radius: .25rem;"> 
                                            <a style="color: #f44336;" href="#" class="remove-from-cart" data-id="{{$row['indexid']}}">ลบ</a>
                                        </div>
                                    </div>
                                </div>  
                            </div> 
                            @if($row['session_option'])  
                                <div class="col-md-12 pb-2">     
                                    @foreach($row['session_option'] as $row_op) 
                                    <div class="d-flex" style="padding: 0.2rem;margin: 0.2rem 0;border-radius: 5px;">  
                                        <div class="mr-auto text-left"> 
                                            <div class="white-space-nowrap1 text-dark"> 
                                                <i class="icon-plus mr-1"></i> {{$row_op['name']}} @if($row_op['price']>0) ราคา {{number_format($row_op['price'], 2)}} ฿ @endif
                                            </div>
                                        </div>  
                                        <div class="white-space-nowrap1">
                                            @if($row_op['quantity']!=0)
                                            <span class="mr-1 text-dark"> x{{$row_op['quantity']}} </span>
                                            @endif
                                        </div> 
                                    </div> 
                                    <?php 
                                        if($row_op['quantity']==0){
                                            $quantity_op=1;
                                        } else {
                                            $quantity_op=$row_op['quantity'];
                                        }
                                        $total_op+=($row_op['price']*$quantity_op); 
                                    ?>
                                    @endforeach   
                                </div>
                            @endif 
                            <?php $total+=($row['price']*$row['quantity']); ?>
                        @endforeach 
                    @endif  
                </div>   
                <?php 
                    $total=$total+$total_op; $km=''; $msg='';
                    $discount=0; $calculate_cost=0; $total_price=0;
                    if(session('calculate_cost')){
                        $total_price=session('calculate_cost')['total_price']; 
                        $calculate_cost=session('calculate_cost')['delivery_price']; 
                        $km=session('calculate_cost')['km'];  
                        $msg=session('calculate_cost')['msg']; 
                    }
                ?>  
                <div class="row pl-3 pr-3 mt-2 pb-2" style="background: #fff;">
                    <div class="col-6 text-left text-dark p-1">  ค่าอาหาร  </div>
                    <div class="col-6 text-right text-dark p-1">  {{number_format($total,2)}} ฿  </div> 
                    <div class="col-6 text-left text-dark p-1">  ส่วนลด  </div>
                    <div class="col-6 text-right text-dark p-1">  {{number_format($discount,2)}} ฿  </div> 
                    <div class="col-6 text-left text-dark p-1">  ค่าจัดส่ง <span> ({{$km}} km) @if($km>30) ({{$msg}})  @endif </span> </div>
                    <div class="col-6 text-right text-dark p-1">  {{number_format($calculate_cost,2)}} ฿  </div> 
                    <div class="col-6 text-left text-dark p-1">  <h4>ทั้งหมด</h4>  </div>
                    <div class="col-6 text-right text-dark p-1">  <h4>{{number_format(($total+$calculate_cost)-$discount,2)}} ฿</h4>  </div>  
                </div>    
                <div class="row" style="background: #fff;">
                    <div class="col-12 text-center"> <div style="padding: 0.5rem; background: #ddd; color: #333;">*อาจมีการคิดค่าธรรมเนียมหากยกเลิกออเดอร์หลังกดสั่งซื้อ</div> </div>
                </div>
                <div class="row pl-3 pr-3 mb-2" style="background: #fff;">  
                    <div class="col-12 pd-00 text-right">
                        <div class="d-none d-sm-block mt-2">  
                            <div class="text-left float-left"> กรุณาตรวจสินค้า, ราคา และจำนวนสินค้า <br>ที่ท่านต้องการสั่งให้เรียบร้อย หากตรวจสอบข้อมูลเรียบร้อยแล้ว คลิก "ชำระเงิน" </div>
                            @if($km>30) <span style="color: #f44336;"> ({{$msg}}) </span> <br><a href="https://lin.ee/mU472oG" style="color: #333;"> ติดต่อ Admin เพื่อขอรายละเอียดเพิ่มเติม </a>  @else 
                            <form method="POST" action="{{ route('additionalAddress.post') }}" id="formMaster">
                                @csrf 
                                <input type="hidden" name="additional_address" value="">
                                <input type="hidden" name="time_takingHDF" value=""> 
                                <input type="hidden" name="senderForm_hid" value="@if(session('senderForm')){{session('senderForm')}}@endif">  
                                <button type="submit" class="btn btn-md btn-dark waves-effect waves-light">
                                    <i class=" mdi mdi-cash-multiple"></i> ทำการชำระเงิน
                                </button>
                            </form>
                            @endif 
                        </div> 
                    </div>
                </div> 
            </div>
        </section> 
        <div class="box-fixed-cart d-block d-sm-none"> 
            <div class="">    
                <div class="p-2"> 
                    @if(session('deliveryCart')) 
                        @if(count(session('deliveryCart'))>0)   
                            @if($km>30)
                                <div class="text-center box-btn-action  "> 
                                    <h4 style="color: #FFF;margin-bottom: 0;"> ({{$msg}}) </h4> 
                                    <a href="https://lin.ee/mU472oG" style="color: #fff;"> ติดต่อ Admin เพื่อขอรายละเอียดเพิ่มเติม </a> 
                                </div> 
                            @else 
                                <div class="d-flex justify-content-between box-btn-action"> 
                                    <h4 style="color: #FFF;"> <i class="icon-basket-loaded"></i> {{count(session('deliveryCart'))}} </h4> 
                                    <form method="POST" action="{{ route('additionalAddress.post') }}" id="formMaster">
                                        @csrf 
                                        <input type="hidden" name="additional_address" value="">
                                        <input type="hidden" name="time_takingHDF" value="">  
                                        <input type="hidden" name="senderForm_hid" value="@if(session('senderForm')){{session('senderForm')}}@endif">  
                                        <button type="submit" class="btn btn-icon" style="padding: 0 3rem;">
                                            <h4 style="color: #FFF;"> ชำระเงิน</h4>
                                        </button>   
                                    </form>   
                                    <h4 style="color: #FFF;"> {{number_format(($total+$calculate_cost)-$discount,2)}} ฿</h4> 
                                </div>  
                            @endif
                        @endif 
                    @else 
                        <a class="btn btn-md btn-block btn-dark waves-effect waves-light" href="{{ route('home') }}">สั่งอาหาร</a> 
                    @endif 
                </div>   
            </div>
        </div> 
@endsection 
@section('script') 
<script>
    function fnonblur(){
        var val=$('#address').val(); 
        $('[name=additional_address]').val(val);
    }

    function time_takingblur(){
        var val=$('#time_taking').val(); 
        $('[name=time_takingHDF]').val(val);
    }
  
    $(document).on('change', '[name=quantity]', function(event) {    
        ajaxupdateTocart($(this)[0].dataset.id);
    }); 

    function ajaxupdateTocart(id) { 
        var quantity = $('#quantity'+id).val();
        $.post("{{ route('updateTocart.post') }}", {
            _token: "{{ csrf_token() }}", 
            indexid: id,
            quantity: quantity
        })
        .done(function(data, status, error){  
            if(error.status == 200){   
                location.reload();
            } 
        })
        .fail(function(xhr, status, error) { 
            alert('เกิดข้อผิดผลาดโปรดทำรายการใหม่อีกครั้ง'); 
        }); 
    } 
    
    $(".remove-from-cart").click(function (e) {
        var id = $(this)[0].dataset.id;
        $.post("{{ route('removeTocart.post') }}", {
            _token: "{{ csrf_token() }}",  
            indexid: id, 
        })
        .done(function(data, status, error){ 
            if(error.status == 200){  
                location.reload();
            } 
        })
        .fail(function(xhr, status, error) { 
            alert('เกิดข้อผิดผลาดโปรดทำรายการใหม่อีกครั้ง'); 
        });  
    }); 

    $(document).on('click', '#customRadio', function(event) { 
        var customRadio = $(this)[0].dataset.id;   
        fn_customRadio(customRadio);
    });

    fn_customRadio(1);
    function fn_customRadio(customRadio){
        $.post("{{ route('ajaxsenderDeliveryForm.post') }}", {
            _token: "{{ csrf_token() }}",
            customRadio: customRadio,   
        })
        .done(function(data, status, error){   
            if(data=="success"){
                location.reload();
            } 
        }) 
        .fail(function(xhr, status, error) { 
            alert('เกิดข้อผิดผลาดโปรดทำรายการใหม่อีกครั้ง'); 
        });
    }


    $(document).on('change', '[name=SideDishes_quantity]', function(event) {   
        var id = $(this)[0].dataset.id;
        var detid = $(this)[0].dataset.detid;  
        var quantity = $(this).val();
        ajaxupdateTocart_side_dishes(id, detid, quantity);
    }); 

    function ajaxupdateTocart_side_dishes(id, detid, quantity)
    { 
        $.post("{{ route('updateTocart_side_dishes.post') }}", {
            _token: "{{ csrf_token() }}",
            indexid: detid, 
            ids: id, 
            quantity: quantity
        })
        .done(function(data, status, error){  
            if(error.status == 200){   
                location.reload();
            } 
        })
        .fail(function(xhr, status, error) { 
            alert('เกิดข้อผิดผลาดโปรดทำรายการใหม่อีกครั้ง'); 
        }); 
    }

    $(".remove-from-cart_side_dishes").click(function (e) {
        var id = $(this)[0].dataset.id;
        var indexid = $(this)[0].dataset.detid; 
        $.post("{{ route('removeTocartSideDishes.post') }}", {
            _token: "{{ csrf_token() }}", 
            indexid: indexid, 
            ids: id, 
        })
        .done(function(data, status, error){ 
            if(error.status == 200){  
                location.reload();
            } 
        })
        .fail(function(xhr, status, error) { 
            alert('เกิดข้อผิดผลาดโปรดทำรายการใหม่อีกครั้ง'); 
        });  
    }); 
</script> 
@endsection