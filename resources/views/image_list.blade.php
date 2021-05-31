<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>
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
                <a href="{{ route('upload_form') }}">Upload</a>
                <hr />
                
                @foreach($images as $image)
                <div style="width: 18rem; float:left; margin: 16px;">
                    <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
                    <p>{{ $image->file_name }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
