<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .content {
                text-align: center;
                width: 100%;
                height: 100vh;
                background-position: center;
                background-size: cover;
            }
            .container{
                width: 100%;
                height: 100vh;
                background-color: rgb(0 0 0 / 88%);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            
            }
            .container .heading h2{
                padding: 0 15px;
                color: #fff;
                text-transform: uppercase;
                font-size: 40px;
                letter-spacing: 2px;
            }
            .user a{
                color: rgba(255, 255, 255, 0.623);
                text-decoration: none;
                margin: 0 10px;
                font-weight: 600;
                font-size: 18px;
                padding: 5px 15px;
                border: 2px solid rgba(255, 255, 255, 0.623);
                transition: .3s;
            }
            .user a:hover{
                color: #fff;
                border-color: #fff;
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
            <div class="content"style="background-image: url({{ asset('backend') }}/img/bg.png)">
                <div class="container m-b-md">
                    <div class="heading">
                        <h2>Meal Managment System</h2>
                    </div>
                @if (Route::has('login'))
                <div class="user">
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
                </div>
            </div>
        </div>
    </body>
</html>
