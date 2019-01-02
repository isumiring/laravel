<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

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
                    Laravel
                </div>

                <div class="form">
                    <form class="needs-validation" method="POST" action="{{ $form_action }}">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-message">
                                    @if (session('form_message'))
                                        <div class="alert alert-{{ session('form_message')['status'] }}">
                                            {!! (is_array(session('form_message')['message'])) ? implode('<br/ >', session('form_message')['message']) : session('form_message')['message'] !!}
                                            @if ( ! isset(session('form_message')['dismissable']) || session('form_message')['dismissable'] == true)
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="card_number">No. Kartu</label>
                            <div class="input-group">
                                <input type="text" maxlength="16" class="form-control number-only" id="card_number" name="card_number" placeholder="No. Kartu" required="required" value="{{ (old('card_number')) ?? '' }}">
                                <div class="input-group-prepend">
                                    <button type="submit" class="input-group-button btn btn-primary check-card"><i class="fas fa-search"></i>
                                        Cari</button>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="product-list-data" style="display:none;">
                        </div>
                        <hr class="mb-4">
                    </form>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
