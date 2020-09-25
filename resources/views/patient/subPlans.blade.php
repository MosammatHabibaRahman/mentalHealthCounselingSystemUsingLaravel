<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Subscription Plans</title>
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
                        <a class="dropdown-item active" href="/patient/subPlans">Subscription Plans</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/placeholder.jpg')}}" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title">{{$subs[0]->planName}}</h5>
                      <p class="card-text">
                        <ul>
                          <li>Duration: {{$subs[0]->duration}}</li>
                          <li>Price: {{$subs[0]->price}}</li>
                          <li>Features: {{$subs[0]->features}}</li>
                        </ul>
                      </p>
                      <a href="/patient/changeSub?btn=Basic" class="btn btn-primary">Switch to Basic</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/placeholder.jpg')}}" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">{{$subs[1]->planName}}</h5>
                      <p class="card-text">
                        <ul>
                            <li>Duration: {{$subs[1]->duration}}</li>
                            <li>Price: {{$subs[1]->price}}</li>
                            <li>Features: {{$subs[1]->features}}</li>
                        </ul>
                      </p>
                      <a href="/patient/changeSub?btn=Standard" class="btn btn-primary">Switch to Standard</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('img/placeholder.jpg')}}" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">{{$subs[2]->planName}}</h5>
                      <p class="card-text">
                        <ul>
                            <li>Duration: {{$subs[2]->duration}}</li>
                            <li>Price: {{$subs[2]->price}}</li>
                            <li>Features: {{$subs[2]->features}}</li>
                        </ul>
                      </p>
                      <a href="/patient/changeSub?btn=Premium" class="btn btn-primary">Switch to Premium</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
    </body>
</html>
