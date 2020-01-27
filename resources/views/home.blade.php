<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                color: black;
                /* padding: 5px 25px; */
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                margin: 5px;
                /* background-color: red; */
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .m-b-md img {
                height: 300px;
                width: 300px;
                border-radius: 50%; 
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
                    JSON Management
                    <h3>Welcome Mr. Yuichiro Sakurada</h3>
                    <img src="/assets/images/profile.jpg"  alt="">
                </div>

                <div class="links">
                    <a href="{{route('createnewjson')}}" class="btn btn-primary btn-lg">Create New Json</a>
                    <a href="{{route('createnewjson')}}" class="btn btn-primary btn-lg" >Add in existing Json</a>
                    <a href="#" onclick="showjson()" class="btn btn-primary btn-lg" >show Json</a>
                    <select name="" id="json_list">
                        <option value="">Select One Jsonfile</option>
                        @foreach ($jplist as $item)
                        <option value="{{$item->id}}"> {{$item->json_name}} </option>   
                        @endforeach
                    </select>
                    {{-- <a href="https://blog.laravel.com" class="btn btn-primary btn-lg" >Blog</a>
                    <a href="https://nova.laravel.com" class="btn btn-primary btn-lg">Nova</a>
                    <a href="https://forge.laravel.com" class="btn btn-primary btn-lg" >Forge</a>
                    <a href="https://vapor.laravel.com" class="btn btn-primary btn-lg">Vapor</a>
                    <a href="https://github.com/laravel/laravel" class="btn btn-primary btn-lg" >GitHub</a> --}}
                </div>

                <div>
                   
                </div>
            </div>
        </div>

        <script>
            function showjson()
            {

                var id = document.getElementById('json_list').value;
                if(!id)
                    {
                        alert("Please select a JSON file");
                        return false;
                    }
                    window.location.href = '/showjson?id='+id;

            }
        </script>
    </body>
</html>
