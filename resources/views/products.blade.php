@extends('layout.app')

@section('content')
    <div class="row">
        @foreach ($products as $p)
            <div class="col-sm-3">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <i>({{ $p['nickname'] }})</i><br> 
                        <h3 class="card-title"><b>{{ $p['name'] }}</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid" src="{{ $p['url'] }}" alt="Photo"
                                style="width: 200px; content-fit: cover">
                        </div>
                        <p class="mt-3 mb-0">Account List :</p>
                        @if (count($p['account']) > 0)
                            <ul class="mb-0">
                                @foreach ($p['account'] as $acc)
                                    <li>
                                        <p class="my-0">Name: <b>{{ $acc['name'] }}</b></p>
                                        <p class="my-0">Number: <b>{{ $acc['number'] }}</b></p>
                                        <p class="my-0">Info: {{ $acc['info'] }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="mb-0">-</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
