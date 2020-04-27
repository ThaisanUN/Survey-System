<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: url("data:image/jpeg;base64,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"); /* The image used */
                background-color: #cccccc; /* Used if the image is unavailable */
                background-position: center; /* Center the image */
                background-repeat: no-repeat; /* Do not repeat the image */
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Survey System
                </div>

                <div class="links">
                    <a href="https://www.instagram.com/un_thaisan/">Thaisan UN</a>
                    <a href="https://www.instagram.com/chea_sorall/">Chea Sorall</a>
                    <a href="https://www.instagram.com/pinmonyoudom/">Pin MonyOudom</a>
                    <a href="https://www.instagram.com/prak.sophea/">Prak Sophea</a>
                  
                </div>
            </div>
        </div>
    </body>
</html>
