@extends('layout.layout')
    
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action="{{ route('logout') }}">

                @csrf

                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
            
            <h1>Welcome to login!</h1>
        </div>
    </div>
</div>
    
@endsection