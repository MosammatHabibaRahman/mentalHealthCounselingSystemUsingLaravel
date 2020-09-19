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
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
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
                                        <td><strong>Full Name</strong></td>
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
