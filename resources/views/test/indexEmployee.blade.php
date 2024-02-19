<!DOCTYPE html>
<html lang="en">
@csrf
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
          <a  class="nav-link mx-5" aria-current="page" href="{{url('tests/indexEmployee')}}"><strong class="text-light">List</strong></a>
        </li>
        <li class="nav-item">
          <a  class="nav-link mx-5" href="{{url('tests/createEmployee')}}"><strong class="text-light">Ajouter</strong></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
<body>
@include('test.navigation')
<h2 class=" mx-auto text-center"><strong>List d'Employees</strong></h2>


@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
@endif

<div class="container mx-auto pt-5">
<table class="table table-bordered text-center table-striped">
            <thead>
                <tr>
                    <th style="width:5cm">Id</th>
                    <th style="width:5cm">Employé Prénom</th>
                    <th style="width:5cm">Employé Nom</th>
                    <th style="width:5cm">Employé Numero</th>
                    <th style="width:5cm">Employé Department</th>
                    <th style="width:1cm"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->lastName }}</td>
                        <td>{{ $employee->number }}</td>
                        <td>{{ $employee->DepartmentName }}</td>
                        <td>
                            <form class="d-flex " action="{{ route('delete-tutorial4', [$employee->id])}}" method="Post">
                              <a class="btn btn-primary btn-sm ml-1" href="{{url('tests/editEmployee',[$employee->id])}}" >Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <div class='mx-auto'>
        {{$list->links() }}
        </div>
</div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>