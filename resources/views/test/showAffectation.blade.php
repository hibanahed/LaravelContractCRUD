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
<h2 class=" mx-auto text-center mt-4"><strong>Suivi affectation</strong></h2>



@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
@endif


<div class="container mx-auto pt-5">
 
<table class="table table-bordered text-center table-striped">
            <thead>
                <tr>
                    <th style="width:5cm">Employé</th>
                    <th style="width:5cm">Telephone</th>
                    <th style="width:5cm">Status</th>
                    <th style="width:5cm">Date affectation</th>
                    <th style="width:5cm">Date rupture</th>
                    <th style="width:1cm"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $affectation)
                    <tr>
                        <td>{{ $affectation->EmployeeName }}</td>
                        <td>{{ $affectation->Number }}</td>
                        @if($affectation->active==1)
                            <td>Active</td>
                        
                        @else
                            <td>Disactive</td>
                        
                        @endif
                        <td>{{ $affectation->dataAffectation }}</td>
                        @if(!is_null($affectation->dataRupture))
                         <td>{{ $affectation->dataRupture }}</td>
                        @else
                        <td>--</td>
                        @endif
                        <td>
                        
                            <form action="{{ route('delete-tutorial', [$affectation->id])}}" 
                            method="post" class="d-flex">
                            <a class="btn btn-primary btn-sm " href="{{url('tests/editAffectation',[$affectation->id])}}" >Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm mx-2 " onclick="return confirm('Are you sure?')" 
                            type="submit" name="Delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

</div>
        <div class='mx-auto'>
        {{$affectations->links() }}
        </div>
</div>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>