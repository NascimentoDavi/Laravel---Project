<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Minha Aplicação')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>

<body>
    <!-- Navbar Padrão com Bootstrap -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark text-light sticky-top mb-2">

        <div class="container">

            <a class="navbar-brand" href="#">
                <i class="bi-bootstrap-fill fs-1 me-2"></i>
                My Application
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavBar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuNavBar">
                <div class="navbar-nav ms-auto">

                    <a href="#" class="nav-link">My Supports</a>
                    <a href="#" class="nav-link">Search</a>
                    <a href="#" class="nav-link">About</a>

                    <div class="dropdown">

                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="#" class="dropdown-item">Settings</a></li>
                            <li><a href="#" class="dropdown-item">Boughts</a></li>
                            <li><a href="#" class="dropdown-item">Knowledge Area</a></li>
                            <li><a href="#" class="dropdown-item">Log Out</a></li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

        {{--
            <form action="" class="d-flex">
                <div class="input-group">
                    <input type="search" name="" id="" class="form-control" placeholder="Buscar...">
                    <button type="submit" class="btn btn-outline-success">Buscar</button>
                </div>
            </form>
        --}}

    </nav>

    <div class="container">
        @yield('content')
    </div>

    <div class="footer-placeholder invisible"></div>
    <footer class="p-4 bg-dark text-light text-center fixed-bottom">
        Todos os Direitos Reservados
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
