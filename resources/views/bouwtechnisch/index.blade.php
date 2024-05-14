@extends('layouts.app')

@section('content')

<div class="forms">
    <div class="formmini">
        <h1>Bouwtechnisch</h1>

        <ul class="list__render list__render--flex">
            @foreach ($bouwtechnisch as $bouwtechnisch)
                <li class="list__render__item">
                    <form method="post" action="/dashboard/bouwtechnisch/update/{{$bouwtechnisch->id}}">
                    @csrf
                    @method('put')

                    <div class="form-group">
                <label for="badkamer">Badkamer</label>
                <input type="number" class="form-control" id="badkamer" name="badkamer" value="{{$bouwtechnisch->badkamer}}">
            </div>
            
            <div class="form-group">
                <label for="berging">Berging</label>
                <input type="number" class="form-control" id="berging" name="berging" value="{{$bouwtechnisch->berging}}">
            </div>  
                  

                    <button type="submit"> Update </button>
                    </form>
                </li>
            @endforeach
        </ul>

        <div class="link__add">
            <a href="/dashboard/bouwtechnisch/create">Add Bouwtechnisch</a>
    </div>
</div>

@endsection


                        

