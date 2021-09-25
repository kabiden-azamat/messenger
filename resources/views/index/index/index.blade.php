@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            @include('index.index.partials.user')
        @else
            @include('index.index.partials.guest')
        @endif
    </div>
@endsection
