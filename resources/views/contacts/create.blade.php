@extends('layouts.master')
@section('content')
<div class="card">
    <!-- Default card contents -->
    <div class="card-header bg-primary">
        <h3 class="card-title text-white">Add Contact</h3>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'contacts.store'])!!}
            @include('contacts.form')
        {!! Form::close() !!}
    </div>
</div>
@endsection