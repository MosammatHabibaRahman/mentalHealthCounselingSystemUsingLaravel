<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Profile</title>
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
        </nav>

        <div class="container mt-4">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-light">
                            <strong>Update Profile</strong>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name"><strong>Name:</strong></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$patient[0]->name}}"/>
                                        </div>
                                    </div>
        
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="email"><strong>Email:</strong></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$patient[0]->email}}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="phone"><strong>Phone:</strong></label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{$patient[0]->phone}}"/> 
                                        </div>
                                    
                                    </div>
        
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="gender"><strong>Gender:</strong></label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option {{ $patient[0]->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option {{ $patient[0]->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option {{ $patient[0]->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="bloodtype"><strong>Blood Type:</strong></label>
                                            <select class="form-control" name="bloodtype" id="bloodtype">
                                                <option {{ $patient[0]->bloodType == 'A+' ? 'selected' : '' }}>A+</option>
                                                <option {{ $patient[0]->bloodType == 'A-' ? 'selected' : '' }}>A-</option>
                                                <option {{ $patient[0]->bloodType == 'B+' ? 'selected' : '' }}>B+</option>
                                                <option {{ $patient[0]->bloodType == 'B-' ? 'selected' : '' }}>B-</option>
                                                <option {{ $patient[0]->bloodType == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                <option {{ $patient[0]->bloodType == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                <option {{ $patient[0]->bloodType == 'O+' ? 'selected' : '' }}>O+</option>
                                                <option {{ $patient[0]->bloodType == 'O-' ? 'selected' : '' }}>O-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label for="propic"><strong>Profile Picture:</strong></label>
                                            <input type="file" class="form-control-file @error('propic') is-invalid @enderror" name="propic" id="propic" value=""/>
                                        </div>    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        @error('propic')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <input type="submit" class="btn btn-block btn-primary" value="Update" id="update"/>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="/patient/profile" class="btn btn-primary btn-block">Back</a>
                                    </div>
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