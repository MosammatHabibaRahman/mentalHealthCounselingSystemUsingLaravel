<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Prescription</title>
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        <table class="table table-bordered">
            <thead class="text-center">
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Type</th>
                <th>Duration</th>
                <th>Timing</th>
                <th>Date</th>
                <th>Notes</th>
            </tr>
            </thead>
            <tbody class="text-center">
                @for($i=0; $i<count($presc); $i++)
                    <tr>
                        <td>{{$presc[$i]->medName}}</td>
                        <td>{{$presc[$i]->quantity}}</td>
                        <td>{{$presc[$i]->medType}}</td>
                        <td>{{$presc[$i]->duration}} Day(s)</td>
                        <td>{{$presc[$i]->timing}}</td>
                        <td>{{$presc[$i]->notes}}</td>
                        <td>{{$presc[$i]->created_at}}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </body>
    <script src="/js/app.js"></script>
</html>