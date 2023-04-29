@extends('layouts.body')
@section('content')
@foreach ($messages as $message)
    <div class="card mt-4">
        <div class="card-body">
        <h5 class="card-title">{{ $message->user_sender }}</h5>
        <p class="card-text">{{ $message->text }}</p>
        <p class="fw-lighter">{{ $message->created_at }}</p>
        <form action="/answer" method="POST">
            @csrf
            <input type="hidden" value="{{ $message->user_sender_email }}" name="email">
            <button type="submit" class="btn btn-outline-success" data-mdb-ripple-color="dark">answer</button>
        </form>
        </div>
    </div>
@endforeach
@endsection