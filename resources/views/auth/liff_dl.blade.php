<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>CHOKCHAI.SHOP</title> 
    <link rel="shortcut icon" href="images/LOGO_black.png">
</head>
<body>
<script src="{{ asset('js/app.js') }}"></script> 
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>                        
<script src="{{ asset('js/jquery.easing.min.js') }}" type="text/javascript"></script>  
<script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
<script>
    // ========================================== //  
    async function getUserProfile() {
        const profile = await liff.getProfile()
        var email = '-';
        if(liff.getDecodedIDToken().email != 'undefined'){
            email = liff.getDecodedIDToken().email;
        }  
        $.post("{{ route('login.line') }}", {
            _token: "{{ csrf_token() }}",
            userId: profile.userId,
            pictureUrl: profile.pictureUrl,
            statusMessage: profile.statusMessage,
            displayName: profile.displayName,
            decodedIDToken: email 
        })
        .done(function(data, status, error){ 
            if(error.status == 200){  
                console.log(error.status);
                window.location.href = "https://shop.chokchaisteakhouse.com/delivery"
            } 
            
        })
        .fail(function(xhr, status, error) { 
            alert('เกิดข้อผิดผลาดโปรดทำรายการใหม่อีกครั้ง'); 
        }); 
    }

    function closed() {
        liff.closeWindow()
    }

    function getEnvironment() {
        var getOS =  liff.getOS();
        var getLanguage = liff.getLanguage();
        var getVersion = liff.getVersion();
        var getAccessToken =  liff.getAccessToken();
        var isInClient = liff.isInClient();
    }
    
    async function main() {
        liff.ready.then(() => {
                
            if (liff.isLoggedIn()) {
                getUserProfile()
                getEnvironment()
            } else {
                liff.login()
            }
        })
        await liff.init({ liffId: "1656041621-azwNqzYO" })
    }
    main();
</script>
</body>
</html>
