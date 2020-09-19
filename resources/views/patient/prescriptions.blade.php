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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <strong>My Prescriptions</strong>
                    </div>
                    <div class="card-body">
                      <% if(pres==null) { %>
                        <div class="alert alert-info" role="alert" name="alert">
                          No prescriptions available as of now.
                        </div>
                      <%} else{ %>
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
                                <% for(var i=0; i<pres.length; i++) { %>
                                    <tr>
                                      <td><%= pres[i].name %></td>
                                      <td><%= pres[i].qty %></td>
                                      <td><%= pres[i].type %></td>
                                      <td><%= pres[i].duration %></td>
                                      <td><%= pres[i].timing %></td>
                                      <td><%= pres[i].date %></td>
                                      <td><%= pres[i].notes %></td>
                                      <td>
                                        <button type="button" class="btn btn-primary btn-sm" name="download">Download</button>
                                      </td>
                                    </tr>
                                 <% }} %>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
