<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WeruhTani - Gapoktan')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .navbar-transparent {
            background-color: transparent !important;
        }
    
        .navbar-scrolled {
            background-color: #000000 !important; /* Sesuaikan warna sesuai keinginan */
        }
    </style>
</head>
<body class="font-sans">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark sticky-top" style="z-index: 2;">
        <div class="container">
            <a class="navbar-brand" href="#">WeruhTani</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#header">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#data-gabah">Data Gabah</a></li>
                    <li class="nav-item"><a class="nav-link" href="#prediksi">Prediksi</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-start">
                    <h5 class="text-uppercase fw-bold">Hubungi Kami</h5>
                    <p>Email: support@weruhtani.com</p>
                    <p>Telepon: +62 812 3456 7890</p>
                </div>
                <div class="col-md-4 text-center">
                    <h5 class="text-uppercase fw-bold">Sosial Media</h5>
                    <a href="#" class="text-white mx-2"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-white mx-2"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar');
            var headerHeight = document.getElementById('header') ? document.getElementById('header').offsetHeight : 0;
            if (window.scrollY > headerHeight) {
                navbar.classList.remove('navbar-transparent');
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
                navbar.classList.add('navbar-transparent');
            }
        });
    </script>
</body>
</html>
