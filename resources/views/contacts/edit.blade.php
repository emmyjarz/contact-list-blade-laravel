@extends('layouts.master') 
@section('content')
<br>
<div class="card">
    <!-- Default card contents -->
    <div class="card-header bg-primary">
        <h3 class="card-title text-white">Contact List</h3>
    </div>
    <div class="card-body">
        {!! Form::open(['action' => ['ContactController@update', $contact->id]]) !!}
        @include('contacts.form')
        {!! Form::close() !!}
    </div>
</div>
@endsection