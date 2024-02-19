<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="text-center pt-5 pb-2">
    <h2><strong>Ajouter number</strong></h2>
</div>
<form action="{{Route('numeros.store')}}"method="POST">
@csrf 
<div class="container border border-5 rounded p-4" style="width:15cm">
            <div class="">
                <a class="btn btn-primary" href="{{ route('numeros.index') }}">
                    @csrf
                        Retour</a>
                  </div>
            <div class="row " style="height: 50vh;">
                <div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-2 ">
                        <strong class="mb-3">Numero:</strong></br>
                        <input type="number" name="number"  class="form-control" >
                    </div>
                </div>
                </br>
                <div class="mx-auto col-10 col-md-8 ">
                    <div class="form-outline mb-4 ">
                        
                        <strong>Contrat Number:</strong></br>
                        <select class="form-select "  type="text" name="idContrat" class="form-control-sm"style="width:5cm" >
                        @foreach($contrats as $c)
                            <option value='{{$c->id}}'>{{$c->numero}} </option>
                            @endforeach    
                        </select>
                    </div>
                </div>
                <div class="mx-auto col-10 col-md-8 ">
                    <div class="d-flex ml-3">
                    <strong >Active:</strong>
                    <div class="form-check form-switch px-0">
                     <input class="form-check-input" name="status" value="disactive" type="hidden" >
                    </div>
                    <div class="form-check form-switch px-4 ">
                     <input class="form-check-input ml-4" name="status" value="active" type="checkbox"  >
                    </div></div>
                    
                    <!-- <input type="hidden" name="status" value="disactive">
                    <input name="status" type="checkbox" value="active"/> -->
                </div></br>
                
                <button type="submit" class="btn btn-primary mx-auto col-6  ">Submit</button>
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