<!DOCTYPE html>
<html lang="en">
@csrf
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    
</head>
<body>
<h2 class="text-center pt-5 pb-2"><strong>Suivi numero de téléphone</strong></h2>

<div class="mr-5  text-center mb-2">
<a class="btn btn-success" href="{{ route('numeros.create') }}"> Ajouter numero</a>  
</div>
 

@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
@endif

<div class="container mx-auto pt-2">
<div class="form-search" style="float:right">
    <form action="{{url('numeros/search')}}" method="get" accept-charset="utf-8">
     <div class="form-outline mb-3" style="display:flex">
      <input type="text" name="search_name" class="form-control mr-1" placeholder="recherche numero">
      <button tyme="submit" class="btn btn-primary">Recherche</button>
     </div>
    </form>
    </div> 
<table class="table table-bordered text-center table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Numero</th>
                    <th>Status</th>
                    <th>Contrat Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $numero)
                    <tr>
                        <td>{{ $numero->id }}</td>
                        <td>{{ $numero->number }}</td>
                        <td>{{ $numero->status }}</td>
                        <td>{{ $numero->ContratNumero}}</td>
                        <td>
                            <form action="{{ Route('numeros.destroy',$numero->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ Route('numeros.edit',$numero->id) }}">Edit</a>
                                <!-- <a class="btn btn-success" href="{{ Route('numeros.show',$numero->id) }}">Show</a> -->
                                @csrf
                                <!-- @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button> -->
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
            </tbody>
        </table>
        <div class="mx-auto">
        {{$list->links() }}
</div>
</div>

</body>
</html>