<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

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
          <a  class="nav-link mx-5" aria-current="page" href="{{url('tests/indexEmployee')}}"><strong class="text-light">List</strong></a>
        </li>
        <li class="nav-item">
          <a  class="nav-link mx-5" href="{{ url('tests/createEmployee') }}"><strong class="text-light">Ajouter</strong></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
</head>
<body>
@include('test.navigation')
<h2 class="text-center pt-5 pb-2"><strong>Ajouter Employee</strong></h2></br>

<div class="container mx-auto pt-2">
<div class="container border border-5 rounded p-4" style="width:15cm">
 
<form action="{{url('tests/storeEmployee')}}"method="get">
@csrf 

<div class="row " style="height: 60vh;">
                <div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
                    <strong>Prenom:</strong>
                    <input type="text" name="name" class="form-control" required/>
    </div></div>
    
<div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
                        <strong>Nom:</strong>
                        <input type="text" name="lastName" class="form-control" required/>
                    </div>
                </div>
                <div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
                        <strong>Numero:</strong>
                        <input type="number" name="number"class="form-control" required/>
                    </div>
                </div>
                <div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
                        <strong>Department:</strong>
                        <select type="text" class="form-select" name="DepartmentId" required>
                        @foreach($departments as $d)
                            <option value='{{$d->DepartmentId}}'>{{$d->name}} </option>
                            @endforeach    
                        </select>
                    </div>
                </div>
                <div class="text-center  ">
                <button type="submit" class="btn btn-primary " name="valider">Enter</button>
    </div>      </div>
</div>
</div>
@if(session('message'))
<p>
    {{session('message')}}
</p>
@endif

@if(count($errors)>0)
 @foreach($errors->all() as $e)
<li>{{$e}}</li>
 @endforeach
@endif
<ul>
</ul>
</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>