<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="csrf-token" content="{{csrf_token()}}">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body style="background-color: #05113b">
        <div>
            <div class="container-fluid m-0 d-flex p-2" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 1) 0px 3px 7px -3px;">
                <div class="pl-2" style="width: 40px; height: 50px; font-size:180%">
                    <i class="fa fa-angle-double-left text-white mt-2"></i>
                </div>
                <div style="width: 50px; height:50px;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF2U00jxGw2_AYY6IZqo4gc5HqDo7hreGmcQ&usqp=CAU" 
                    width="100%" height="100%" style="border-radius: 50px;" alt="">
                </div>
                <div class="text-white font-weight-bold ml-2 mt-2">
                    Lara ChatBot
                </div>
            </div>
            <div id="content-box" class="container-fluid p-2" style="height: calc(100vh - 130px);overflow-y:scroll;">
                
                
            </div>
            <div class="container-fluid w-100 px-3 py-2 d-flex" style="background: #132f45;height:62px;">
                <div class="mr-2 pl-2" style="background: #ffffff1c;width: calc(100% - 45px);border-radius: 10px;">
                    <input type="text" name="message" id="message" class="text-white" style="background: none;width:100%;height:100%;border:0;outline:none;">
                </div>
                <div class="text-center" id="btn-submit" style="background: #41C9E2;height:100%;width:50px;border-radius:10px;cursor: pointer;">
                    <i class="fa fa-paper-plane text-white" aria-hidden="true" style="line-height: 45px;"></i>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#btn-submit').on('click', function() {
        $value = $('#message').val();
        $('#content-box').append(`<div class="mb-2">
                    <div class="float-right px-3 py-2" style="width:270px;background:#41C9E2;border-radius:10px;float:right;font-size:85%;">
                        `+ $value +`
                    </div>
                    <div style="clear: both"></div>
                </div>`);

        $.ajax({
            type: 'post',
            url: '{{url('send')}}',
            data: {
                'message': $value
            },
            success: function(data) {
                $('#content-box').append(`<div class="d-flex mb-2">
                    <div class="mr-2" style="width: 45px;height:45px;">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF2U00jxGw2_AYY6IZqo4gc5HqDo7hreGmcQ&usqp=CAU" 
                        width="100%" height="100%" style="border-radius: 50px;" alt="">
                    </div>
                    <div class="text-white px-3 py-2" style="width:270px;background:#13254b;border-radius:10px;font-size:85%;">
                        `+ data +`
                    </div>
                </div>`);
            $value = $('#message').val("");
            }
        });
    });
</script>
