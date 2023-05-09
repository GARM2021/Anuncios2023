<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de DUAS</title>
</head>
<body>
    
    <h1> {{ $items->dua }}</h1>
     <h1>{{ $items->nomdua }}</h1>
    <div class="table-responsive">
        <table class="table-stripped">
            <thead class="thead-light">
                <tr> 
                    	
                    
                    <th>domdua</th>	
                    <th>colonia</th>
                    <th>ciudad</th>	
                    <th>prop</th>
                    <th>telprop</th>	
                    <th>rep_legal</th>	
                    <th>rfc_dua</th>	
                    <th>seguro</th>
                    <th>fechaini</th>
                    <th>fechafin</th>
                    <th>fbajax</th>
                  



                  </tr>
            </thead>
            <tbody>
                    <tr>

                    <td>{{ $items->domdua }}</td>
                    <td>{{ $items->colonia }}</td>
                    <td>{{ $items->ciudad}}</td>
                    <td>{{ $items->prop }}</td>
                    <td>{{ $items->telprop }}</td>
                    <td>{{ $items->rep_legal}}</td>
                    <td>{{ $items->rfc_dua }}</td>
                    <td>{{ $items->seguro }}</td>
                    <td>{{ $items->fechaini }}</td>
                    <td>{{ $items->fechafin }}</td>
                    <td>{{ $items->fbajax }}</td>

                    
                   
                 
                </tr>   
                 
            </tbody>
        </table>
    </div>
    
</body>
</html>