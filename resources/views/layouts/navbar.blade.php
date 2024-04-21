<!-- Navigation-->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}">Test Project</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
        @if(session('user'))
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
            <li class="nav-item dropdown">
                <form class="d-flex">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill" id="userCartCount">{{count($userCartProduct)}}</span>
                    </button>
                </form>
            </li> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user">&nbsp;{{session('user')->fullname}}</i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{route('profile-page')}}"><i class="fas fa-sliders-h fa-fw"></i> Profile</a></li>
              @if(session('role_type') == 'admin')
              <li><a class="dropdown-item" href="{{route('dashboard')}}"><i class="fas fa-sliders-h fa-fw"></i> Admin Panel</a></li>
              @endif
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" style="cursor: pointer;" onclick="this.disabled=true;document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
                <form id="logout-form" action="{{route('logout')}}" method="POST">
                    @csrf
                </form>
            </ul>
          </li>
       </ul>
       @else
       <button class="btn btn-outline-light m-1" type="button" data-bs-toggle="modal" data-bs-target="#authModal">
            <i class="bi-cart-fill me-1"></i>
            Login/Register
        </button>
        @endif
      </div>
    </div>
  </nav>