<div class="new-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-red">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="{{ asset('img/logo.png')}}" width="160px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 lef-menu">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="alert('coming soon'); return false;" href="#">Women</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="alert('coming soon'); return false;" href="#">Couples</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="alert('coming soon'); return false;" href="#">Trans</a>
                    </li>
                </ul>
                @if(auth()->user())

                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{route('profile')}}">Account Setting</a></li>
                            <li><a class="dropdown-item" href="{{route('change-password')}}">Change Password</a></li>
                            <li><a class="dropdown-item" onclick="alert('coming soong'); return false;" href="favorites.php">My Favorites</a></li>
                            <li><a class="dropdown-item" onclick="alert('coming soong'); return false;" href="funds-tokens.php">Funds / Tokens</a></li>
                            <li><a class="dropdown-item" onclick="alert('coming soong'); return false;" href="messages.php">Messages</a></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Log out</a></li>
                        </ul>
                    </li>
                </ul>
                @else
                <ul class="d-flex navbar-nav">
                    <li class="nav-item user-login">
                        <a class="nav-link" aria-current="page" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item user-singup">
                        <a class="nav-link" aria-current="page" onclick="alert('coming soon'); return false;" href="sign-up.php">Sign Up</a>
                    </li>
                    <li class="nav-item modal-login">
                        <a class="nav-link" aria-current="page" href="{{ route('become-a-model') }}">Become a Model</a>
                    </li>
                </ul>
                @endif


            </div>
        </div>
    </nav>
</div>
<!-- Header Start -->
<div class="container-fluid bg-dark px-0" style="display:none">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 display-4 text-primary text-uppercase">
                    <img src="{{ asset('img/logo.png') }}" width="230px;">
                </h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-secondary d-lg-flex">
                <div class="col-lg-8 px-5">
                </div>
                <div class="col-lg-4 px-5 text-end" style="position: relative;">
                    <div class="py-2">
                        <div class="">
                            <a href="model-sign-up.php" class="btn btn-dark">become a model</a> &nbsp;
                            <span data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search text-dark" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </span> &nbsp;
                            <span data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle text-dark" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-caret-down-fill text-dark" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </span>
                        </div>
                        <div class="collapse ms-auto mt-2 user-menu w-50" id="collapseExample">
                            <div class="card card-body">
                                <ul class="p-0 mb-0 text-start">
                                    <li><a href="login.php">Log in</a></li>
                                    <li><a href="sign-up.php">Sign Up</a></li>
                                    <li><a href="#">Send Feedback</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="collapse ms-auto mt-2 w-100" id="collapseExample2">
                        <div class="card-body bg-dark">
                            <div class="col-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary text-uppercase"><img src="{{ asset('img/logo.png') }}" width="200px;"></h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">Discover</a>
                        <a href="#" class="nav-item nav-link">TAGS</a>
                        <a href="#" class="nav-item nav-link">Private Shows</a>
                        <a href="#" class="nav-item nav-link">Following</a>
                        <a href="#" class="nav-item nav-link">Broadcast Yourself</a>
                    </div>
                    <div class="d-flex">
                        <a href="sign-up.php" class="btn btn-light d-lg-block me-2">Sign Up</a>
                        <a href="login.php" class="btn btn-primary d-lg-block">Log In</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->
<div class="container-fluid p-0" style="display:none;">
    <div class="row m-0">
        <div class="col-lg-12 p-0">
            <ul class="nav nav-pills bg-secondary text-uppercase">
                <li class="nav-item">
                    <a class="nav-link text-dark active" data-bs-toggle="pill" href="#">FEATURED</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-bs-toggle="pill" href="#">WOMEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-bs-toggle="pill" href="#">MEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-bs-toggle="pill" href="#">COUPLES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-bs-toggle="pill" href="#">TRANS</a>
                </li>
            </ul>
        </div>
    </div>
</div>