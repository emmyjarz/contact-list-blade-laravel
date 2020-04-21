@extends('layouts.master')
@section('content')
@if ($message = Session::get('message'))
<div class="flash-message alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<div class="card">
    <!-- Default card contents -->
    <div class="card-header bg-info">
        <div class="row">
            <div class="col-md-11">
                <a href="/" class="no-underline">
                    <h3 class="card-title text-white">Contact List</h3>
                </a>
            </div>
            <div class="col-md-1">
                <a href="{{ route('contacts.create')}}" title="Add Contact" class="btn btn-info float-right"><i class="fas fa-plus fa-2x"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <!-- Table -->
        <table id="sort" class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 20%">First Name</th>
                    <th style="width: 20%">Last Name</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 20%">Phone</th>
                    <th id="no-arrow" style="width: 15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($contacts)>0)
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ucwords($contact->firstname)}}</td>
                    <td>{{ucwords($contact->lastname)}}</td>
                    <td>{{$contact->email}}</td>
                    <td>
                        @if(!empty($contact->phone))
                        {{App\Contact::phoneFormat($contact->phone)}}
                        @endif
                    </td>
                    <td>
                        {{-- details --}}
                        <a class="float-left mr-2" href="{{route('contacts.show', $contact->id)}}"><i class="fas fa-info-circle" title="Details"></i></a>
                        {{-- update --}}
                            <a class="float-left mr-2" href="{{route('contacts.edit', $contact->id)}}" title="Edit"><i class="fas fa-edit"></i></a>
                        {{-- delete --}}
                        {!! Form::open([
                            'route' => [
                                'contacts.destroy', $contact->id
                            ], 
                            'method' => 'delete'
                            ]) !!}
                            <button type='submit' class="delete-button no-background" title="Delete">
                                <i class="fas fa-trash-alt text-danger" aria-hidden="true"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <!-- card body -->
</div>
<br>
@stop
@section('additional_scripts')
<script defer src="{{url('/assets/js/index.js', [], $URL_HTTPS)}}"></script>
@endsection