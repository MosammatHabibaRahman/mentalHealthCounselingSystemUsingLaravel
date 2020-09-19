<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Health Record</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                      <strong>Update Health Record</strong>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="height"><strong>Height:</strong></label>
                                        <input type="number" class="form-control @error('height') is-invalid @enderror" name="height" id="height" value="{{$record[0]['height']}}"/>
                                        
                                        @error('height')
                                            <div class="alert alert-danger mt-4">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="weight"><strong>Weight:</strong></label>
                                        <input type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" id="weight" value="{{$record[0]['weight']}}"/>
                                        
                                        @error('weight')
                                            <div class="alert alert-danger mt-4">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="bp"><strong>Blood Pressure:</strong></label>
                                        <input type="number" class="form-control @error('bp') is-invalid @enderror" name="bp" id="bp" value="{{$record[0]['bp']}}"/>

                                        @error('bp')
                                            <div class="alert alert-danger mt-4">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="pulseRate"><strong>Pulse Rate:</strong></label>
                                        <input type="number" class="form-control @error('pulseRate') is-invalid @enderror" name="pulseRate" id="pulseRate" value="{{$record[0]['pulseRate']}}"/>

                                        @error('pulseRate')
                                            <div class="alert alert-danger mt-4">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="mood"><strong>Mood:</strong></label>
                                        <select class="form-control @error('mood') is-invalid @enderror" name="mood" id="mood">
                                            <option {{ $record[0]['mood'] == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option {{ $record[0]['mood'] == 'Good' ? 'selected' : '' }}>Good</option>
                                            <option {{ $record[0]['mood'] == 'Okay' ? 'selected' : '' }}>Okay</option>
                                            <option {{ $record[0]['mood'] == 'Bad' ? 'selected' : '' }}>Bad</option>
                                            <option {{ $record[0]['mood'] == 'Awful' ? 'selected' : '' }}>Awful</option>
                                        </select>

                                        @error('mood')
                                            <div class="alert alert-danger mt-4">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="sleepDuration"><strong>Sleep Hours:</strong></label>
                                        <input type="number" class="form-control @error('sleepDuration') is-invalid @enderror" name="sleepDuration" id="sleepDuration" value="{{$record[0]['sleepDuration']}}"/>

                                        @error('sleepDuration')
                                            <div class="alert alert-danger mt-4">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="description"><strong>Description</strong></label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{$record[0]['description']}}</textarea>

                                        @error('description')
                                            <div class="alert alert-danger mt-4">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block" name="update" id="update">Update</button>
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
