<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="mt-5 mx-auto">
                <h2 class="text-center"> Show Number</h2>
            </div>
    <div class="row">
        <div class="col-lg-12 m-5">
            
            <div class="pull-right"> 
                <a class="btn btn-primary" href="{{ Route('numeros.index') }}"> Back</a>
                @csrf
            </div>
        </div>
    </div>
<div class="container d-flex">
<div class="row gy-4">
@foreach ($list as $numero)

<div class="col mr-0">
<div class="card mb-3" >
  <div class="card-body">
    <div class="d-flex mb-3">
    <strong><tr class="card-subtitle  ">Numero:</tr></strong><div class="pl-4"> {{ $numero->number }}</div>
    </div>
    <div class="d-flex mb-3">
    <strong><tr class="card-subtitle ">Status:</tr></strong><div class="pl-4">{{ $numero->status }}</div>
    </div>
    <div class="d-flex mb-3">
    <strong><tr class="card-subtitle">idContrat:</tr></strong><div class="pl-4">{{ $numero->ContratNumero }}</div>
    </div>
  </div>
@endforeach
</div>
</div>

</body>
</html> -->