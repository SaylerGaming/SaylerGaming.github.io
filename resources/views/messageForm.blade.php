@extends('layouts.body')
@section('content')
@php
    $senderEmail = session('senderEmail')
@endphp
<div class="row d-flex justify-content-center mt-4">
    <form action="/sendMessage" method="POST" style="width: 600px">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
        <input 
            type="email" 
            id="form4Example2" 
            class="form-control" 
            name="email"
            @isset($senderEmail)
                value="{{ $senderEmail }}"
            @endisset
        />
        
        <label class="form-label" for="form4Example2">Email address</label>
        </div>
    
        <!-- Message input -->
        <div class="form-outline mb-4">
        <textarea class="form-control" id="form4Example3" rows="4" name="text"></textarea>
        <label class="form-label" for="form4Example3">Message</label>
        </div>
    
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
    </form>
</div>
@endsection