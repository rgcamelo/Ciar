<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <script>$(document).ready(function() {
                $('#tabla3').DataTable( {
                    "paging":   true,
                    "ordering": false,
                    "info":     true,
                    "language": {
                    "emptyTable": "<div><img style='width:200px;heigth:200px'  src='/admintle/img/mensaje6.png'></img></div>"
                    }
                } );
            } );
            </script>
    
    <table  border='1' style="width:90%">
                <tr>
                    <th>Docente</th>
                    <th width="300px" >Titulo</th>
                </tr>
                @foreach ($solicitudes as $s)
                <tr>
                  <td>{{$s->NombreCompleto}}</td>  
                  <td>{{$s->titulo}}</td>  
                </tr>               
                @endforeach
        </table>

                

    
</body>
</html>