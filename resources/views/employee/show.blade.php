<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show employee</h2>
            </div>
            <div class="pull-right"> 
                <a class="btn btn-primary" href="{{ Route('employees.index') }}"> Back</a>
                @csrf
            </div>
        </div>
    </div>
    @foreach ($list as $employee)
<div class="container d-flex">
    <table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Name:</th>
      <td>{{ $employee->name }}</td>
    </tr>
    <tr>
      <th scope="row">Last name:</th>
      <td>{{ $employee->lastName }}</td>
    </tr>
    <tr>
      <th scope="row">Number:</th>
      <td>{{ $employee->number }}</td>
    </tr>
    <tr>
      <th scope="row">Department:</th>
      <td>{{ $employee->DepartmentName }}</td>
    </tr>
    </tbody>
 </table>
</div>
@endforeach

</body>
</html>