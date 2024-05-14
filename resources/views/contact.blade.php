@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact</h1>
                <p>Heb je een vraag of wil je meer informatie over een woning? Neem dan contact met ons op.</p>
                <form action="/contact" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Naam">
                    </div>
                    <div class="form-group
                    ">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group
                    ">
                        <label for="message">Bericht</label>
                        <textarea class="form-control" id="message" name="message" placeholder="Bericht"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Verstuur</button>
                </form>
            </div>
        </div>
    </div>

@endsection