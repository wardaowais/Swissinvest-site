<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>

        <title>Latest News</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        

    </head>
    
    <body class="antialiased" onload="loader()">

        <div id="loading">
            <img id="loading-image" src="{{asset('assets/images/gradiant.gif')}}" />
        </div>

        <ul id="lang" class="language-list list-group list-group-horizontal">
            <a class="language-item text-decoration-none fw-bold" href="{{url(url()->current().'?lang=de')}}">de</a>
            <a class="language-item text-decoration-none fw-bold" href="{{url(url()->current().'?lang=fr')}}">fr</a>
            <a class="language-item text-decoration-none fw-bold" href="{{url(url()->current().'?lang=en')}}">en</a>
            <a class="language-item text-decoration-none fw-bold" href="{{url(url()->current().'?lang=it')}}">it</a>
        </ul>

        @yield('content')

        <div class="subscribe-section">
            <h1>Subscribe to our Newsletter</h1>
            <p>Stay updated with our latest news and offers!</p>
            <form class="subscribe-form">
                <div class="form-group d-flex">
                    <input type="email" class="form-control form-control-sm" placeholder="Enter your email address" required>
                    <button type="submit" class="btn btn-sm btn-primary btn-animated">Subscribe</button>
                </div>
            </form>
        </div>
        
        <!-- Footer Section -->
        <footer id="footer" class="text-center text-white fw-600 py-4">
            <p class="mb-0">© 2024 NewsSite. All rights reserved.</p>
        </footer>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('/script.js')}}" /></script>
    <script>
        function loader() {
            const loading = document.getElementById('loading');
            loading.style.display = 'none';  
        }
    </script>
</html>