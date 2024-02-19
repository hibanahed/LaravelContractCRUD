<!DOCTYPE html>
<html lang="en">
@csrf
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<header class="fixed-top">
    <nav id="nav" class="  navbar navbar-expand-lg navbar-light navcolor">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item button">
          <a  class="nav-link mx-5 " aria-current="page" href="{{route('tests.index')}}"><strong class="text-light">List</strong></a>
        </li>
        <li class="nav-item">
          <a  class="nav-link mx-5" href="{{route('tests.create')}}"><strong class="text-light">Ajouter</strong></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
<body>
@include('test.navigation')
<h2 class=" text-center "><strong>Suivi contrats de téléphone</strong></h2>



@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
@endif


<div class="container mx-auto  pt-5">
    <div class="form-search pb-3" style="float:right">
    <form action="{{url('tests/search')}}" method="get" accept-charset="utf-8">
     <div class="form-group" style="display:flex">
      <input type="text" name="search_name" class="form-control mr-1" placeholder="search">
      <button tyme="submit" class="btn btn-primary">Search</button>
     </div>
    </form>
    
    </div> 
<table class="table table-bordered text-center table-striped">
            <thead>
                <tr>
                    <th style="width:5cm">contrat Numero</th>
                    <th style="width:5cm">contrat Data</th>
                    <th style="width:5cm">contrat Heurs</th>
                    <th style="width:5cm">contrat Prix</th>
                    <th style="width:1cm"></th>
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
                            <form class="d-flex  " action="{{ Route('tests.destroy',$contrat->id) }}" method="Post">
                            <a class="btn btn-primary btn-sm mx-1" href="/tests/edit?id={{$contrat->id}}&numero={{$contrat->numero}}">Edit</a>
                                <!-- <button type="button" class="btn btn-success bt-sm" href="{{ Route('tests.show',$contrat->id) }}">List de numeros</button> -->
                               <a class="btn btn-success btn-sm mx-1" href="{{ Route('tests.show',$contrat->id) }}">Numeros</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-1" title='Delete' onclick="return confirm('Are you sure to delete?')">Delete</button>

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
<!-- <script>
    function myFunction() {
            if(){
                document.getElementById("x").setAttribute("href", "https://stackoverflow.com");

            }

}
    <script> -->

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>