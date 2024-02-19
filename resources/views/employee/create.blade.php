<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<form action="{{Route('employees.store')}}"method="POST">
@csrf 
<div class="container mt-2">
<fieldset>
    <legend>Ajouter employee</legend>
    <div class="row">
    <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
    </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name"/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last name:</strong>
                        <input type="text" name="lastName"/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Number:</strong>
                        <input type="number" name="number"/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Department:</strong>
                        <select type="text" name="DepartmentId">
                        @foreach($departments as $d)
                            <option value='{{$d->DepartmentId}}'>{{$d->name}} </option>
                            @endforeach    
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3" name="valider">Submit</button>
    </div>
</div>
</fieldset>
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
</html>