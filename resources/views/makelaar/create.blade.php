@extends('layouts.base')

@section('content')
<div class="forms">
    <div class="formmini">
        <h1>Voeg hier jouw makelaar toe</h1>

        <form action="/dashboard/makelaar/store" enctype="multipart/form-data"  method="POST" class="form__categorie">
            @csrf

            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Makelaar name">
            </div>

            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Makelaar lastname">
            </div>

            <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Makelaar phone">
            </div>

            <div class="form-group">
                <label for="reference">Reference</label>
                <input type="text" class="form-control" id="reference" name="reference" placeholder="Makelaar reference">
            </div>

            <div class="form-group">
                <label for="image">Foto</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Makelaar image">
            </div>



            <button type="submit" class="form__categorie__btn">Add</button>

        </form>
    </div>
</div>



@endsection