<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Appointments</title>
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
                        <a class="dropdown-item active" href="/patient/appointment">Request Appointment</a>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                      <strong>Request Appointment</strong>
                    </div>
                    <div class="card-body">
                        <form method="post">
                          @csrf
                          <div class="row">
                            <div class="col-12 col-md-12">
                              <div class="form-group">
                                <select class="form-control @error('doctor') is-invalid @enderror" name="doctor" id="doctor">
                                  @for($i=0; $i<count($doctors); $i++)
                                    <option value="{{$doctors[$i]->id}}">{{$doctors[$i]->name}}</option>
                                  @endfor
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-md-12">
                              @error('doctor')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-md-12">
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-md-12">
                              @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-12 col-md-12">
                              <button type="submit" class="btn btn-primary btn-block">Send Request</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
              @if(count($list)<=0)
                <div class="alert alert-info mt-4" role="alert" name="alert">
                  No appointments requested or scheduled as of now. Fill the form above to submit an appointment request!
                </div>
              @else
              <div class="card mt-4">
                <div class="card-header bg-primary text-light">
                  <strong>My Appointments</strong>
                </div>
                <div class="card-body">
                  <table class="table table-hover mt-2">
                    <thead class="text-center">
                        <tr>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Delete Request</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                      @for($i=0; $i < count($list); $i++)
                      <tr>
                        <td>{{$list[$i]->name}}</td>
                            @if(!$list[$i]->schedule)
                              <td>Not Scheduled Yet</td>
                            @else
                              <td>{{$list[$i]->schedule}}</td>
                            @endif
                            <td>{{$list[$i]->reqStatus}}</td>
                            <td>
                            <a class="btn btn-primary btn-sm" href="{{route('patient.deleteReq', [$list[$i]->aid])}}">Delete</a>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                  </table>
                  
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <a class="btn btn-primary btn-block" href="{{route('patient.getList')}}">Download List</a>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
