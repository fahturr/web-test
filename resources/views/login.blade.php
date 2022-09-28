@extends('layout.auth')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            @if (session('message'))
                <div class="alert alert-{{ session('class') }} alert-dismissible fade show mt-2" role="alert">
                    <strong>{{ session('type') }}!</strong> {{ session('message') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('login.post') }}" method="POST" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <small id="emailHelp" class="form-text text-danger">
                        {{ $message }}
                    </small>
                @enderror
                <div class="input-group mt-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <small id="emailHelp" class="form-text text-danger">
                        {{ $message }}
                    </small>
                @enderror
                <div class="row mt-3">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>

            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </p>
        </div>
    </div>
@endsection
