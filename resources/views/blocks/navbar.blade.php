<div class="ml-4">
    <a href="{{route('home')}}">
        <img src="{{ asset( 'images/page/webgameonlineline.png') }}" alt="page avatar" width="130%" height="auto">
    </a>
</div>
<nav class="navbar navbar-expand" style="background-color: rgb(0,0,0);padding-top: 0px;padding-bottom: 0px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav navbar-brand mr-auto">

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link orangehover mt-1" >Home</a>
        </li>
        {{-- /////////////////////////////////////////////////////////////////////// --}}

        <li class="navbar-brand nav-item d-none d-sm-inline-block">
            <div class="dropdown show">
                <a class="dropdown-toggle nav-link orangehover" href="#" role="button"
                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" > Category </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                    style="top: 122%;left:-29px;">
                    {{-- @foreach ($data as $category) --}}
                        <div>
                            <hr>
                            {{-- <a href="{{route('game.gamebycategory',['id' => $category->id])}}" --}}
                                class="nav-link text-center" style="color: black;">
                                <h5>
                                    {{-- {{$category->category_name}} --}}
                                </h5>
                            </a>
                        </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </li>
        {{-- /////////////////////////////////////////////////////////////////////// --}}

        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link orangehover mt-1">Contact</a>
        </li> --}}
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-auto" action="{{ route('game.searchresult') }}" method="GET">
        @csrf
        <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar bg-light" id="search" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    {{-- Select option --}}
    @if (Auth::check())
    <ul class="navbar-nav ">
        <li class="nav-item dropdown show">
            <a class="nav-item nav-link navbar-brand dropdown-toggle mr-md-2 ml-md-2" href="#" id=   "bd-versions" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">    
                {{ Auth::user()->email }}               
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">

                <a class="dropdown-item ahover" href="{{ route('user.profile') }}">
                    <i class="fas fa-user-circle " aria-hidden="true"></i> Your Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item ahover" href="{{ route('user.logout') }}">
                    <i class="fas fa-sign-out" aria-hidden="true"></i> Logout</a>
            </div>
        </li>
    </ul>
    @else
    <a href="{{ route('user.login') }}" class="nav-link navbar-brand text-white">Login</a> 
    @endif
</nav>