<!DOCTYPE html>
<html lang="en">
@csrf
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<h2 class=" mx-auto text-center mt-4"><strong>Suivi contrats de téléphone</strong></h2>



@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
@endif


<div class="container mx-auto pt-5">
    <div class="form-search" style="float:right">
    <form action="{{url('contrats/search')}}" method="get" accept-charset="utf-8">
     <div class="form-group" style="display:flex">
      <input type="text" name="search_name" class="form-control mr-1" placeholder="search">
      <button tyme="submit" class="btn btn-primary">Search</button>
     </div>
    </form>
    </div>  
<table class="table table-bordered text-center table-striped">
            <thead>
                <tr>
                    <th>contrat Numero</th>
                    <th>contrat Data</th>
                    <th>contrat Heurs</th>
                    <th>contrat Prix</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contrats as $contrat)
                    <tr>
                        <td>{{ $contrat->numero }}</td>
                        <td>{{ $contrat->data }}G.o</td>
                        <td>{{ $contrat->heurs }}H</td>
                        <td>{{ $contrat->prix }}DH</td>
                        <td>
                            <form action="{{ Route('contrats.destroy',$contrat->id) }}" method="Post">
                                <!-- <a class="btn btn-primary" href="{{ Route('contrats.edit',$contrat->id) }}">Edit</a> -->
                                <a class="btn btn-success" href="{{ Route('contrats.show',$contrat->id) }}">List de numeros</a>
                                @csrf
                                <!-- @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button> -->
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <div class='mx-auto'>
        {{$contrats->links() }}
        </div>
</div>

    
</body>
</html>