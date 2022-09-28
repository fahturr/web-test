@extends('layout.app')

@section('content')
    <form method="POST" action="{{ route('menu.users.add.post') }}" autocomplete="off">
        @csrf
        <div class="card col-lg-3">
            <div class="card-body" style="display: block;">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="">
                    @error('name')
                        <small id="emailHelp" class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputName">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="">
                    @error('email')
                        <small id="emailHelp" class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputName">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="">
                    @error('password')
                        <small id="emailHelp" class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit"class="btn btn-success">Create</button>
    </form>
@endsection
