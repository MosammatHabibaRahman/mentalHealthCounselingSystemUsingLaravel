<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>My Appointments</title>
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        <table class="table table-hover mt-2">
            <thead class="text-center">
                <tr>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Status</th>
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
                </tr>
                @endfor
            </tbody>
          </table>
        <script src="/js/app.js"></script>
    </body>
</html>