<!DOCTYPE html>
<html lang="en">
@csrf
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('employees.create') }}"> add employee</a>  
</div>


@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
@endif

<div class="container mx-auto pt-5">
<table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>employee Name</th>
                    <th>employee Last Name</th>
                    <th>employee Number</th>
                    <th>employee Department</th>
                    <th width="280px">Action</th>
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
                            <form action="{{ Route('employees.destroy',$employee->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ Route('employees.edit',$employee->id) }}">Edit</a>
                                <a class="btn btn-success" href="{{ Route('employees.show',$employee->id) }}">Show</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
</div>
    
</body>
</html>