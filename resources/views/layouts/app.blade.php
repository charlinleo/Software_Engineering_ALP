<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NoGooc</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">SU IMT</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="/images/IMT-SU-logo.png" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#interests">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#awards">Awards</a></li>
                    @if (Auth::check())
                        @if (Auth::user()->isAdmin())
                        @endif
                    @endif
                    @if (Auth::check())
                        @if (Auth::user()->isMember() || Auth::user()->isAdmin())
                        @endif
                    @endif
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item my-2" href="{{ route('Users.index') }}">
                                View Profile
                            </a>
                            <a class="dropdown-item my-2 " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
            </div>
        </nav>
        <main class="py-4" style="display: flex; flex-direction: column; justify-content: center; height: 100vh;">
            @yield('content')
        </main>
    </div>
</body>
</html>
