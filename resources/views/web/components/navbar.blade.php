 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
     <div class="container">
         <a class="navbar-brand" href="#">
             <img src="{{ asset('assets') }}/img/logo_small.png" alt="Hefa Store">
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav text-uppercase mx-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="@yield('redirect')">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Category</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Designer</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">About</a>
                 </li>
             </ul>

             @if (Auth::check() == true)
                 <a href="{{ route('cart') }}" class="nav-link text-white"><i class="fas fa-shopping-cart"></i>
                     MyCart (<span>{{ $countcart }}</span>)</a>
                 <div class="dropdown">
                     <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         {{ Auth::user()->email }}
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                         <a class="dropdown-item" href="#">Profile</a>
                         <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </div>
                 </div>
             @else
                 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalLogin">
                     <i class="fas fa-user"></i> {{ __('Log In') }}
                 </button>
             @endif
         </div>
     </div>
 </nav>
 <!-- Akhir Navbar -->

 <!-- Modal -->
 <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="{{ route('login') }}">
                     @csrf
                     <div class="input-group mb-3">
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                             name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                         <div class="input-group-append">
                             <div class="input-group-text">
                                 <span class="fas fa-envelope"></span>
                             </div>
                             @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>
                     <div class="input-group mb-3">
                         <input id="password" type="password"
                             class="form-control @error('password') is-invalid @enderror" name="password" required
                             autocomplete="current-password">
                         <div class="input-group-append">
                             <div class="input-group-text">
                                 <span class="fas fa-lock"></span>
                             </div>
                         </div>
                         @error('password')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>

                     <p class="mb-1">
                         <a href="{{ route('password.update') }}">I forgot my password</a>
                     </p>
                     <p class="mb-0">
                         <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                     </p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">login</button>
             </div>
             </form>
         </div>
     </div>
 </div>
