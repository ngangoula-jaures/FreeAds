@extends('base')

@section('title')
    Verification Email|Freeads
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4 d-flex  align-items-center vh-100">
        <div class="card p-4 ">
            <h3 class="text-center mb-4 text-primary">Freeads Verifie votre Email en 1er Lieu</h3>
                <form method="POST" action="{{ route('test') }}" class="row g-3">
                    @csrf
                    <div class="md-3">
                        <label class="form-label" for="Username" >Entrez votre Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}" required placeholder="Votre Email">
                         @error('email')
                            <span>{{$message}}</span>
                        @enderror
                    </div>
                 
                    <div class="col-md-12 justify-content-center my-2">
                        <button type="submit" class=" btn btn-primary w-100 rounded-3 px-5">Valider Email</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
        
