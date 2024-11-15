<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Restaurant Website</title>
    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional custom styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <style>
        body{
            margin: 0px;
            padding:0px;
        }
    </style>
    
    <!-- Header with Navigation -->
     <!-- Jump to Top Button -->

    @include('layouts.header')

    <!-- Dynamic Banner Section -->
<section id="home" class="banner-section">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/banners/banner-1.jpg" class="d-block w-100" alt="Banner 1">
                <div class="carousel-caption d-flex justify-content-center align-items-center text-center" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5);">
                    <div>
                        <h5 class="display-3 text-white">Delicious Dishes</h5>
                        <p class="lead text-white">Experience the best of gourmet dining.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/banners/banner-2.jpg" class="d-block w-100" alt="Banner Image 2">
                <div class="carousel-caption d-flex justify-content-center align-items-center text-center" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5);">
                    <div>
                        <h5 class="display-3 text-white">Exquisite Ambiance</h5>
                        <p class="lead text-white">Where great food meets a fantastic atmosphere.</p>
                    </div>
                </div>
            </div>
            <!-- Add more images here if necessary -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

    <!-- Main Content Section -->
    <main class="container mt-5">
        @yield('content')
    </main>
    
    <!-- Footer Section -->
   

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
