@extends('layout.layout')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading">
                <h1>Login</h1> <br/>
            </div>
        </div>
        <div class="col-md-12">
            <form action="/login" method="POST">
    
                @csrf
    
                <div class="form-group">
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"  placeholder="Email *" name="email" value=""{{ old('email') }} />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password *" name="password" />
                </div>
                <button type="submit" class="btn btn-success">Sign In</button>
            </form> <br />
        </div> 
        <div class="col-md-12">
            @include('errors')
        </div>
    </div>
</div>

@endsection