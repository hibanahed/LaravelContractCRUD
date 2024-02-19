<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="text-center pt-5">
    <h2><strong>Modifier Numero</strong></h2>
</div>
<div class="container mx-auto pt-3">
    
        
        @if(session('message'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('message') }}
        </div>
        @endif
        <form action="{{ Route('numeros.update',$numero->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container border border-5 rounded p-4" style="width:15cm">
            <div class="">
                <a class="btn btn-primary" href="{{ route('numeros.index') }}">
                    @csrf
                        Retour</a>
                  </div>
            <div class="row " style="height: 50vh;">
                <div class="mx-auto col-10 col-md-8">
                    <div class="form-outline mb-4 ">
                        <strong class="mb-3">Numero:</strong></br>
                        <input type="number" name="number" value="{{ $numero->number }}" class="form-control" disabled>
                    </div>
                </div>
                <div class="mx-auto col-10 col-md-8 ">
                    <div class="form-outline mb-4 ">
                        <strong class="mb-3">Status:</strong></br>
                        <label class="radio-inline">
                        <input type="radio" name="status" value="active" {{($numero->status=="active")? "checked":""}}>Active</label>
                        <label class="radio-inline">
                        <input type="radio" name="status" value="disactive" {{($numero->status=="disactive")? "checked":""}}>Disactive</label>
                        
                    </div>
                </div>
                <div class="mx-auto col-10 col-md-8 ">
                    <div class="form-outline mb-4 ">
                        
                        <strong><label for="disabledSelect" class="form-label">Contrat numero:</label></strong></br>
                        <select type="text" name="idContrat" id="disabledSelect" class="form-control-sm"style="width:5cm" value="{{$numero->idContrat}}" disabled>
                        @foreach($contrats as $n)
                          <option value="{{$n->id}}" {{$numero->idContrat == $n->id ? 'selected':''}}>
                            {{$n->numero}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mx-auto col-10 col-md-8 ">Submit</button>
            </div>
</div>
        </form>
    </div>
</body>
</html>