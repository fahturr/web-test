@extends('layout.auth')

@section('content')
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{ route('register.post') }}" method="POST" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('name')
                    <small id="emailHelp" class="form-text text-danger">
                        {{ $message }}
                    </small>
                @enderror
                <div class="input-group mt-3">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
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
                    <input type="password" name="password_1" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password_1')
                    <small id="emailHelp" class="form-text text-danger">
                        {{ $message }}
                    </small>
                @enderror
                <div class="input-group mt-3">
                    <input type="password" name="password_2" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password_2')
                    <small id="emailHelp" class="form-text text-danger">
                        {{ $message }}
                    </small>
                @enderror
                <div class="row mt-3">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>

            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
    </div>
@endsection
