<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Mental Health Counseling System</title>
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
          <li class="nav-item active">
            <a class="nav-link disabled" href="/patient">
              Home<span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="patient/profile">My Profile</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="patient/appointment">Request Appointment</a>
              <a class="dropdown-item" href="patient/docList">Find a Doctor</a>
              <a class="dropdown-item" href="patient/prescriptions">Prescriptions</a>
              <a class="dropdown-item" href="patient/subPlans">Subscription Plans</a>
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
        <div class="col-md 12">
          <div class="card">
            <div class="card-header bg-primary text-light">
              <strong>My Health Record</strong>
            </div>
            <div class="card-body">
              <div class="container">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td>
                        <strong>Height</strong>
                      </td>
                      <td>{{$record[0]['height']}}</td>
                    </tr>
                    <tr>
                      <td>
                        <strong>Weight</strong>
                      </td>
                      <td>{{$record[0]['weight']}}</td>
                    </tr>
                    <tr>
                      <td>
                        <strong>Blood Pressure</strong>
                      </td>
                      <td>{{$record[0]['bp']}}</td>
                    </tr>
                    <tr>
                      <td>
                        <strong>Pulse Rate</strong>
                      </td>
                      <td>{{$record[0]['pulseRate']}}</td>
                    </tr>
                    <tr>
                      <td>
                        <strong>Current Mood</strong>
                      </td>
                      <td>{{$record[0]['mood']}}</td>
                    </tr>
                    <tr>
                      <td>
                        <strong>Sleep Hours</strong>
                      </td>
                      <td>{{$record[0]['sleepDuration']}}</td>
                    </tr>
                    <tr>
                      <td>
                        <strong>Description</strong>
                      </td>
                      <td>{{$record[0]['description']}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <a href="patient/updateRecord" class="btn btn-primary btn-block">Update Record</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/js/app.js"></script>  
  </body>
</html>