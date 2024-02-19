<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit employee</h2>
                </div>
                <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}">
                    @csrf
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('message'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('message') }}
        </div>
        @endif
        <form action="{{ Route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>employee Name:</strong>
                        <input type="text" name="name" value="{{ $employee->name }}" class="form-control"
                            placeholder="employee name">
                        <!-- @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror -->
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>employee last name:</strong>
                        <input type="text" name="lastName" class="form-control" placeholder="employee last name"
                            value="{{ $employee->lastName }}">
                        <!-- @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror -->
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>employee number:</strong>
                        <input type="number" name="number" value="{{ $employee->number }}" class="form-control"
                            placeholder="employee number">
                        <!-- @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror -->
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>employee department:</strong></br>
                        <select  type="text" name="DepartmentId" value="{{$employee->DepartmentId}}"  class="form-select form-select-sm" aria-label=".form-select-sm example">
                        
                        @foreach ($departments as $item)
                            <option value="{{$item->DepartmentId}}" {{$employee->DepartmentId == $item->DepartmentId ? 'selected':''}}>
                                {{$item->name}} </option>
                        @endforeach   
                        </select>   
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>