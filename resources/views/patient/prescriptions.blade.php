<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Prescriptions</title>
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
                        <a class="dropdown-item active" href="/patient/prescriptions">Prescriptions</a>
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
                        <strong>My Prescriptions</strong>
                    </div>
                    <div class="card-body">
                        @if(count($pres) <= 0)
                            <div class="alert alert-info" role="alert" name="alert">
                            No prescriptions available as of now.
                            </div>
                        @else
                            <table class="table table-hover mt-4">
                                <thead class="text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Type</th>
                                    <th>Duration</th>
                                    <th>Timing</th>
                                    <th>Date</th>
                                    <th>Notes</th>
                                    <th>Download</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                    @for($i=0; $i<count($pres); $i++)
                                        <tr>
                                            <td>{{$pres[$i]->medName}}</td>
                                            <td>{{$pres[$i]->quantity}}</td>
                                            <td>{{$pres[$i]->medType}}</td>
                                            <td>{{$pres[$i]->duration}} Day(s)</td>
                                            <td>{{$pres[$i]->timing}}</td>
                                            <td>{{$pres[$i]->notes}}</td>
                                            <td>{{$pres[$i]->created_at}}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{route('patient.getPresc', [$pres[$i]->created_at])}}">Download</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
