<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Profile</title>
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
                <a class="nav-link active disabled" href="/patient/profile">My Profile</a>
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
            <div class="col-md 12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                      <strong>My Profile</strong>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td>{{$patient[0]->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>{{$patient[0]->email}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone</strong></td>
                                        <td>{{$patient[0]->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td>{{$patient[0]->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Blood Type</strong></td>
                                        <td>{{$patient[0]->bloodType}}</td>
                                    </tr>
                                </tbody>
                            </table>
                          <div class= "row">
                            <div class="col-12 col-md-6">
                            <a href="{{ route('patient.updateProfile') }}" class="btn btn-primary btn-block">Update Profile</a>
                            </div>
                            <div class="col-12 col-md-6">
                            <a href="{{ route('patient.changePassword') }}" class="btn btn-primary btn-block">Change Password</a>
                            </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
