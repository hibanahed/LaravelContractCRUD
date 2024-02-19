<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class=" pb-2 pt-4 ">
<h2 class="text-center"><strong>List de numeros de contrat {{$contrat->numero}} </strong></h2>
  
  
</div>

    <div class="d-flex  pt-4">
        <div class="col-lg-12 margin-tb">
          
            
          
            <div class="container mx-auto pb-3"> 
                <a class="btn btn-primary" href="{{ Route('contrats.index') }}">Retour</a>
                @csrf
            </div>
        </div>
    </div>
<div class="container ">
<div class="row gy-4">
@if($list->isNotEmpty())
@foreach ($list as $n)

<div class="col mr-0">
<div class="card mb-3" style="width: 6cm;">
  <div class="card-body">
    <div class="d-flex mb-3">
    <strong><tr class="card-subtitle  ">Numero:</tr></strong><div class="pl-4">{{ $n->number }}</div>
    </div>
    <div class="d-flex mb-3">
    <strong><tr class="card-subtitle ">Status:</tr></strong><div class="pl-4">{{ $n->status }}</div>
    </div>
    <!-- <div class="d-flex mb-3">
    <strong><tr class="card-subtitle">idContrat:</tr></strong><div class="pl-4">{{ $n->idContrat }}</div>
    </div> -->
  </div>
</div>
</div>

@endforeach
</div>
</div>
<div class="container mx-auto">
<a class="btn btn-primary" href="{{ Route('numeros.index') }}"> Tous les Numeros</a>
</div>
@else 
    <div>
        <p class="pl-3">Aucun numéro</p>
    </div>
@endif


</body>
</html>