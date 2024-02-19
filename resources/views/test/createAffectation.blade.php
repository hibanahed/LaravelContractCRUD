<!DOCTYPE html>
<html lang="en">
@csrf
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
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
          <a  class="nav-link mx-5" aria-current="page" href="{{url('tests/showAffectation')}}"><strong class="text-light">List</strong></a>
        </li>
        <li class="nav-item">
          <a  class="nav-link mx-5" href="{{ url('tests/affectation2') }}"><strong class="text-light">Ajouter</strong></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
<body>
@include('test.navigation')
<h2 class="text-center pt-5 pb-2"><strong>Ajouter affectation</strong></h2></br>

@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
@endif

<div class="container mx-auto pt-2">
<div class="container border border-5 rounded pt-3" style="width:17cm">
 
<form action="{{url('tests/createAffectation')}}" method="GET">
@csrf 
<div class="row " style="height: 60vh;">
                <div class="mx-auto col-10 col-md-8  ">
                    <div class="form-outline mb-2 ">
                        <strong class="">Employee:</strong>
<select type="text" class="form-select"  name="idEmployee">
    @foreach($listEmployee as $e)
                            <option value="{{$e->id}}">{{$e->name}}</option>
    @endforeach
                 </select>
</div></div>
<div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
<strong class="mb-3">Telephone:</strong></br>
<select type="text"  class="form-select" name="idTelephone">
    @foreach($listTelephone as $n)
                            <option value="{{$n->id}}">{{$n->number}}</option>
    @endforeach
                 </select>
</div></div>
<div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
<strong class="mb-3">Active:</strong>
<select type="text" class="form-select"  name="active">
                        <option value="1">Active</option>
                        <option value="0">Disactive</option>
</select>
</div></div>
<div class="mx-auto col-10 col-md-8">
                    <div class="form-outline">
<strong class="mb-3">Date affectation:</strong></br>
<input name="dataAffectation" value="" type="date" class="form-control" required></br>
</div></div>
<div class="text-center  ">
<button type="submit"  class="btn btn-primary ">Save</button></br>

</div>
@if(count($errors)>0)
 @foreach($errors->all() as $e)
<strong class="text-danger text-center">{{$e}}</strong></br>
 @endforeach
@endif
</div>
</form>
</div></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>