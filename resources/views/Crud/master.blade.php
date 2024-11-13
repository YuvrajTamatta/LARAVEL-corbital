<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/3favicon.jpg">
    <title>Infinity Shoes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark p-3">
        <div class="container">
            <div>
                <a href="" class="navbar-brand"><img src="{{asset('images/logo.png')}}" alt="" height="55px"></a>
            </div>

            <div>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar"><span
                        class="navbar-toggler-icon btn-sm"></span></button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a href="" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Service</a>
                        </li>
                        <li class="nav-item">
                        <a href="" class="nav-link">Contact Us</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </nav>

    <div class="row">
        <div class="col-10">
            @yield('content')
        </div>
        <div class="col-2">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Service</a></li>
                <li><a href="">Contact Us</a></li>
            </ul>
        </div>
    </div>



    <footer class="bg-dark " >
        <div class="row" >
            <div class="col-4">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Service</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-4">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Service</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-4">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Service</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
        </div>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
