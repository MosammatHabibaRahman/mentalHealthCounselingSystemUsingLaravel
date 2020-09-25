<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>List of Doctors</title>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
                        <a class="dropdown-item active" href="/patient/docList">Find a Doctor</a>
                        <a class="dropdown-item" href="/patient/prescriptions">Prescriptions</a>
                        <a class="dropdown-item" href="/patient/subPlans">Subscription Plans</a>
                    </div>
                </li>
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0" method="POST">
            <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
            <div id="list"></div>
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            {{ csrf_field() }}
        </form>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <strong>List of Doctors</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover mt-4">
                            <thead class="text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Qualifications</th>
                                    <th>Specialty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                              @for ($i=0; $i<count($doctors) ; $i++ )
                              <tr>
                                    <td>{{$doctors[$i]->name}}</td>
                                    <td>{{$doctors[$i]->gender}}</td>
                                    <td>{{$doctors[$i]->qualifications}}</td>
                                    <td>{{$doctors[$i]->specialty}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{route('patient.appointment')}}">Request Appointment</a>
                                    </td>
                               </tr>
                               @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){ 
        var search = $(this).val();
            if(search != '')
            {
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{ url('patient/docList') }}",
            method:"POST",
            data:{search:search, _token:_token},
            success:function(docs){
            $('#list').fadeIn();  
                        $('#list').html(docs);
            }
            });
            }
        });

        $(document).on('click', 'li', function(){  
            $('#search').val($(this).text());  
            $('#list').fadeOut();  
        });  

        });
    </script>
</body>
</html>
