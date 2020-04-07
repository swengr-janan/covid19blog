<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="container" >
      <a class="navbar-brand" href="/"><img src="https://urgentcarekids.com/wp-content/uploads/2020/03/Coronavirus.png" style="width:40px;height:40px;">COVID-19 BLOG</a>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            </ul>
            <ul class="navbar-nav mr-auto" >
              <li class="nav-item" >
                <a class="nav-link" href="/"><i class="fas fa-home"></i> Home </span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about"><i class="fas fa-info"></i> About </span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/report"><i class="fas fa-tv"></i> Tracker </span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/posts"><i class="fas fa-blog"></i> Blog </span></a>
              </li>
              
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> 
                            {{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i> 
                            {{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user"> </i> 
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="/dashboard"><i class="fas fa-list"></i> Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>              
                                {{ __('Logout') }}
                                
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
