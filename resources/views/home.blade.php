<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <img src="{{URL::to('images/logo.png')}}" alt="" class="logo">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                <div class="collapse navbar-collapse bg-nav" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto" >
                         <li class="nav-item active">
                            <a class="nav-link" href="#" style="color: azure;">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#" style="color: azure;">Link</a> -->
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: azure;">
                                Thể loại
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                                
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                        <li class="nav-item">
                            <form class="form-inline my-2 my-md-0 ">
                                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                                <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: azure;">Search</button> -->
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: azure;">Đăng nhập</a>
                        </li>
                        <!-- <li class="nav-item">
                            <p class="nav-link">/</p>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: azure;">Đăng ký</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
    </header>

</body>

</html>