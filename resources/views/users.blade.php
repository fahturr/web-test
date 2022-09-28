@extends('layout.app')

@section('content')
    <a class="btn btn-success" href="{{ route('menu.users.add') }}">
        <i class="fas fa-plus"></i> Create
    </a>
    @if (session('message'))
        <div class="alert alert-{{ session('class') }} alert-dismissible fade show mt-2" role="alert">
            <strong>{{ session('type') }}!</strong> {{ session('message') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card mt-3">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->id == Auth::user()->id)
                            @continue
                        @else
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('menu.users.edit', $user->id) }}">
                                        <i class="fas fa-pencil-alt"></i> Update
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('menu.users.delete', $user->id) }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
