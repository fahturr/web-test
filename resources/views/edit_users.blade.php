@extends('layout.app')

@section('content')
    <form method="POST" action="{{ route('menu.users.edit.put', $user->id) }}" autocomplete="off">
        @method('PUT')
        @csrf
        <div class="card col-lg-3">
            <div class="card-body" style="display: block;">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                        placeholder="">
                    @error('name')
                        <small id="emailHelp" class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputName">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                        placeholder="" readonly>
                    @error('email')
                        <small id="emailHelp" class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputName">Old Password</label>
                    <input type="password" name="old_password" class="form-control" placeholder="">
                    @error('old_password')
                        <small id="emailHelp" class="form-text text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputName">New Password</label>
                    <input type="password" name="new_password" class="form-control" placeholder="">
                    @error('new_password')
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
