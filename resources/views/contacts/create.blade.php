@extends('layouts.master')
@section('content')
<div class="card">
    <!-- Default card contents -->
    <div class="card-header bg-primary">
        <h3 class="card-title text-white">Add Contact</h3>
    </div>
    <div class="card-body">
    <form action="{{route('contacts.store')}}"method="POST">
            @csrf
            @include('contacts.form')
        </form>
    </div>
</div>
@endsection