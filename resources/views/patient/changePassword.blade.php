<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Change Password</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>
          
                  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
          
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/patient">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/patient/profile">My Profile</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/patient/appointment">Request Appointment</a>
                        <a class="dropdown-item" href="/patient/docList">Find a Doctor</a>
                        <a class="dropdown-item" href="/patient/prescriptions">Prescriptions</a>
                        <a class="dropdown-item" href="/patient/subPlans">Subscription Plans</a>
                    </div>
                </li>
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-6 offset-3">
          <div class="card">
            <div class="card-header bg-primary text-light">
              Change Password
            </div>
            <div class="card-body">
              <form method="post">
                @csrf
                <div class="form-group">
                  <label for="password">
                    <strong>Current Password</strong>
                  </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"/>
                
                @error('password')
                <div class="alert alert-danger mt-4">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                  <label for="password">
                    <strong>New Password</strong>
                  </label>
                  <input type="password" class="form-control @error('newpassword') is-invalid @enderror" id="newpassword" name="newpassword" placeholder="New Password" value="{{Old('newpassword')}}"/>
                  
                  @error('newpassword')
                  <div class="alert alert-danger mt-4">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">
                    <strong>Retype Password</strong>
                  </label>
                  <input type="password" class="form-control @error('newpassword_confirmation') is-invalid @enderror" id="newpassword_confirmation" name="newpassword_confirmation" placeholder="Retype Password" value="{{Old('newpassword_confirmation')}}"/>
                  
                  @error('newpassword_confirmation')
                  <div class="alert alert-danger mt-4">{{ $message }}</div>
                  @enderror
                </div>
                <div>
                  <input type="submit" class="btn btn-primary btn-block" value="Change"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/js/app.js"></script>  
  </body>
</html>

