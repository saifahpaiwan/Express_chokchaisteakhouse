 <!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- Primary Meta Tags -->
    <title>โชคชัยสเต็กเฮ้าส์ เดลิเวอรี่</title>
    <meta name="title" content="CHOKCHAI STEAKHOUSE.SHOP">
    <meta name="description" content="โชคชัยสเต็คเฮ้าส์ เสิร์ฟความอร่อยจากครัวส่งตรงถึงคุณ ด้วยบริการจัดเลี้ยงนอกสถานที่ ทางเลือกสำหรับการทานอาหาร ในรูปแบบปาร์ตี้ส่วนตัวที่บ้าน งานเลี้ยงระดับองค์กร งานเลี้ยงในโอกาสพิเศษต่างๆ ด้วยคุณภาพอาหารและพนักงานที่เชี่ยวชาญ พร้อมเครื่องมือครบครัน ในบรรยากาศและสถานที่ของคุณเอง เพื่อสร้างความประทับใจให้แก่คนพิเศษของคุณ ออกแบบความอร่อย ตามความต้องการของคุณ ติดต่อสอบถามเพิ่มเติมได้ที่ 0 2532 2846 ถึง 8 ต่อ 1710">
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
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <link rel="shortcut icon" href="{{ asset('images/LOGO_black.png') }}">
    <!-- Styles --> 
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />   

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
         @font-face {
            font-family: Copper Penny DTP;
            src: url({{ asset('/fonts/Copper Penny DTP.otf') }});
        }
         
        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 0;
        }
        .font-Copper {font-family: Copper Penny DTP;}
        body, .btn,li  {
            font-family: 'Kanit' ;  
            font-weight: 300;
            font-size: 13px;
        }
        .Kanit, h1, h2, h3, h4, .sub-header,.btn {
            font-family: 'Kanit' ; 
        }    
        html{
            height:100%; 
        }
        body{ 
            margin:0px;
            height:100%; 
        }
        #map {
            height: 100%;
        }

        .box-save-add{
            position: absolute;
            padding: 0.5rem;
            bottom: 0;
            width: 100%;
            background: #FFF;
        }

        .form-control { 
            background-color: #ffffffdb; 
            border: 1px solid #ced4da00;
        }
        .form-control:focus {
            color: #333;
            background-color: #ffffffdb;
            border-color: unset;
            outline: 0;
            box-shadow: unset; 
        } 
        .autocomplete-suggestions {
            background-color: #FFF;
            padding: 0.5rem;
        }
        .autocomplete-suggestion {
            padding: 0.5rem;
        }
       #suggest{ position: absolute;
            display: none;
            background: #fff;
            border: 1px solid #ddd;
            padding: 4px;
            flex-direction: column;
            z-index: 999;
            top: 3.5rem;
            margin: 0 1rem;
        }

        #suggest a{padding: 0.5rem;}
        .lo_box {
            position: absolute;
            top: 0;
            bottom: 60px;
            left: -35px;
            right: 0;
            width: 0;
            height: 0;
            margin: auto; 
            z-index: 8;
        } 
        .ldmap_placeholder .ldmap_frame .ldmap_tile_canvas { opacity: 0;}
        .ldmap_placeholder .ldmap_crosshair {  opacity: 0; }
    </style> 
 </head>
 <body onload="init();"> 
    <div style="position: absolute; top: 0; padding: 0 1rem; z-index: 999; width: 100%;"> 
        <form class="ui-filterable">
            <input id="search"  class="form-control" placeholder="ค้นหาสถานที่ ">
        </form> 
    </div> 
    <div id="suggest"></div>
    <div>
        <button type="button" class="ml-1 btn btn-dark waves-effect width-md waves-light ldmap_button ldmap_geolocation" id="Geolocation"
        style="position: absolute; top: 4rem; right: 1rem; z-index: 8;"> 
            <i class="mdi mdi-crosshairs-gps"></i> ระบุตำแหน่ง
        </button> 
    </div>
    <div class="lo_box">
        <img src="{{ asset('images/pin.png') }}" alt="" width="35">
    </div>
 
    <div id="map"></div>   
    <div class="box-save-add text-center"> 
        <h4 style="margin: 0;"> ระบุตำแหน่งที่อยู่ </h4>
        <div class="txt-add text-center p-2">
            @if(session('mrakapp')) {{session('mrakapp')['location']}} @endif
        </div>
        <div class="text-center mb-2 mt-2"> 
            <form method="POST" action="{{ route('mrak_location.post') }}">
                @csrf    
                <input type="hidden" name="get_page" value="@if(isset($_GET['page'])) cart @endif"> 
                <input type="hidden" name="address" id="address" value="">  
                <input type="hidden" name="lat" id="lat" value="">  
                <input type="hidden" name="lon" id="lon" value="">  

                <input type="hidden" name="no" id="no" value="">  
                <input type="hidden" name="parish" id="parish" value="">  
                <input type="hidden" name="district" id="district" value="">  
                <input type="hidden" name="province" id="province" value="">  
                <input type="hidden" name="zipcode" id="zipcode" value=""> 
                @error('address')
                    <div class="alert alert-danger" role="alert">
                        <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                    </div>
                @enderror   
                @error('lat')
                    <div class="alert alert-danger" role="alert">
                        <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                    </div>
                @enderror   
                @error('lon')
                    <div class="alert alert-danger" role="alert">
                        <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                    </div>
                @enderror   
                @error('no')
                    <div class="alert alert-danger" role="alert">
                        <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                    </div>
                @enderror   
                @error('parish')
                    <div class="alert alert-danger" role="alert">
                        <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                    </div>
                @enderror   
                @error('district')
                    <div class="alert alert-danger" role="alert">
                        <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                    </div>
                @enderror   
                @error('province')
                    <div class="alert alert-danger" role="alert">
                        <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                    </div>
                @enderror   
                @error('zipcode')
                    <div class="alert alert-danger" role="alert">
                        <strong> <i class="mdi mdi-alert-circle-outline"> </i> {{ $message }} </strong>
                    </div>
                @enderror   
                <div class="d-flex"> 
                    @if(isset($_GET['page']))   
                        <a href="{{ route('cart') }}" class="btn btn-outline-dark waves-effect waves-light mr-1" style="width: 100%;">  
                            ยกเลิก
                        </a>
                    @else 
                        <a href="{{ route('home') }}" class="btn btn-outline-dark waves-effect waves-light mr-1" style="width: 100%;">  
                            ยกเลิก
                        </a>
                    @endif
                    
                    <button type="submit" class="btn btn-dark waves-effect width-md waves-light ml-1" style="width: 100%;" id="save"> ตกลง </button> 
                </div>
            </form>
        </div>
    </div> 
    <!-- <div id="result"></div> -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>  
    <script src="{{ asset('js/app.js') }}"></script>   
    <script type="text/javascript" src="https://api.longdo.com/map/?key=3c1b841d540af619fd9766a87c32834d"></script>
    <script>  
        $( "#save" ).prop( "disabled", true );
        $(document).on('click', '#Geolocation', function(event) { 
            map_location();
        });
 
        map_location();
        function map_location(){
            map.location(longdo.LocationMode.Geolocation);
            var result = map.location(longdo.LocationMode.Pointer);   
            var wgs84 = new Number(result.lon).toFixed(6) + ', ' + new Number(result.lat).toFixed(6);
            console.log(wgs84);
            var result_lat = new Number(result.lat).toFixed(6);
            var result_lon = new Number(result.lon).toFixed(6);
            rerverseGeocoding(result_lat, result_lon);   
        }
 
        function init() {
            map = new longdo.Map({
                placeholder: document.getElementById('map')
            }); 
            // map.Route.placeholder(document.getElementById('result'));
            // map.Route.add(new longdo.Marker({ lon: 100.619387, lat: 13.968925 }));
            // map.Route.mode(longdo.RouteMode.Distance);
            // map.Route.enableRestrict(longdo.RouteRestrict.Bike, true);
            // map.Route.add({ lon: 100.665942, lat: 13.977414});

            map.Ui.DPad.visible(false);
            map.Ui.Zoombar.visible(false);
            map.Ui.Geolocation.visible(false);
            map.Ui.Toolbar.visible(false);
            map.Ui.LayerSelector.visible(false);
            map.Ui.Fullscreen.visible(false);
            map.Ui.Crosshair.visible(true);
            map.Ui.Scale.visible(false);  
            map.zoom(18, true);
             
            map.Event.bind('drop', function() {
                var location = map.location(); // Cross hair location
                console.log(location);
                var result_lat = new Number(location.lat).toFixed(6);
                var result_lon = new Number(location.lon).toFixed(6);
                rerverseGeocoding(result_lat, result_lon);   
            }); 
            search = document.getElementById('search');  
            search.oninput = function() {
                if (search.value.length < 3) {
                    suggest.style.display = 'none';
                    return;
                }
                
                map.Search.suggest(search.value, {
                    limit: 10, 
                });
            };
            map.Event.bind('suggest', function(result) {
                if (result.meta.keyword != search.value) return; 
                suggest.innerHTML = '';
                for (var i = 0, item; item = result.data[i]; ++i) {
                    longdo.Util.append(suggest, 'a', {
                    innerHTML: item.d,
                    href: 'javascript:doSuggest(\'' + item.w + '\')'
                    });
                }
                suggest.style.display = 'flex';
            }); 
        }

        function doSuggest(value) {
            $('#search').val(value); 
            $('#suggest').hide();
            $.get("https://search.longdo.com/mapsearch/json/search?", {
                _token: "{{ csrf_token() }}", 
                key: '3c1b841d540af619fd9766a87c32834d',
                keyword: value, 
            })
            .done(function(data, status, error){ 
                if(error.status == 200){  
                    console.log(); 
                    map.location({ lon:data.data[0].lon, lat:data.data[0].lat }, true); 
                    var result_lat = new Number(data.data[0].lat).toFixed(6);
                    var result_lon = new Number(data.data[0].lon).toFixed(6);
                    rerverseGeocoding(result_lat, result_lon);  
                }
            })
            .fail(function(xhr, status, error) { 
                alert('เกิดข้อผิดผลาดโปรดทำรายการใหม่อีกครั้ง'); 
            }); 
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
                    console.log(data);
                    var road="";
                    if(data.road){ road=data.road } 
                    $('.txt-add').text(road+" "+data.subdistrict+"  "+data.district+" "+data.province+" "+data.postcode);
                    $('#address').val(road+" "+data.subdistrict+" "+data.district+" "+data.province+" "+data.postcode);
                    $('#lat').val(result_lat);
                    $('#lon').val(result_lon);

                    $('#no').val(road);  
                    $('#parish').val(data.subdistrict);  
                    $('#district').val(data.district);
                    $('#province').val(data.province);
                    $('#zipcode').val(data.postcode);
                    $( "#save" ).prop( "disabled", false );
                }
            })
            .fail(function(xhr, status, error) { 
                alert('เกิดข้อผิดผลาดโปรดทำรายการใหม่อีกครั้ง'); 
            }); 
        }
 
    </script>
 </body>
 </html>