<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Form</title>
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
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                	<ul>
                		@foreach ($errors->all() as $error)
                			<li>{{ $error }}</li>
                		@endforeach
                	</ul>
                </div>
                @endif
                <form 
                	method="post"
                	action="{{ route('upload_image') }}"
                	enctype="multipart/form-data"
                >
                	@csrf
                	<input type="file" name="image" accept="image/png, image/jpeg">
                	{{--<textarea name="caption" placeholder="キャプション"></textarea>--}}
                	<input type="submit" value="投稿">
                </form>                
            </div>
        </div>
    </body>
</html>
