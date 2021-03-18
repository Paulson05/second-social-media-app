<nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav"  style="background: red;">
    <div class="container"><a class="navbar-brand js-scroll-trigger" href="">Bucci app </a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler float-right" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

                        @if (Auth::check())



            <form class="navbar-form mr-auto"  role="search" action="{{route('search.result')}}">

                <ul class="nav navbar-nav">
                    <li ><a class="nav-link js-scroll-trigger" href="">Timeline</a></li>
                    <li ><a class="nav-link js-scroll-trigger" href="{{route('friends.index')}}">Friends</a></li>
                    <li><input class = "nav-item form-control" type="text" name="query" id="" placeholder="find people"></li>
                    <li><button type="submit" class="nav-item btn btn-sm pt-1 ml-3">search</button></li>
                </ul>

            </form>
                        @endif
            <ul class="nav navbar-nav ml-auto">
                                @if (Auth::check())

                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('profile.index', ['username'=>Auth::user()->username])}}">{{Auth::user()->getFirstNameOrUsername()}}</a></li>

                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('profile.edit')}}">update profile</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('auth.logout')}}">sign out</a></li>
                                @else
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('auth.signup')}}">Sign up</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('auth.login')}}">Sign in</a></li>
                                @endif
            </ul>
        </div>
    </div>
</nav>
