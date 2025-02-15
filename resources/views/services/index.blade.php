@extends('layouts.app')

@section('content')
    <h1>Servicios Disponibles</h1>
    <ul>
        @foreach($services as $service)
            <li>
                <a href="{{ route('services.show', $service->id) }}">{{ $service->title }}</a>
                - {{ $service->description }}
            </li>
        @endforeach
    </ul>
@endsection
