@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title text-white">Details</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> 
                    {{ucwords($contact->firstname)}} {{ucwords($contact->lastname)}}
                </p>
                <p><strong>Email:</strong> 
                    {{$contact->email}}
                </p>
                <p><strong>Phone:</strong> 
                    {{$contact->phone}}
                </p>
                <p><strong>Birthday:</strong> 
                    {{Carbon\Carbon::parse($contact->birthday)->toFormattedDateString()}}
                </p>
                <p><strong>Address:</strong> 
                    {{ucwords($contact->address1)}} {{ucwords($contact->address2)}}
                </p>
                <p><strong>City:</strong> 
                    {{ucwords($contact->city)}}
                </p>
                <p><strong>State:</strong> 
                    {{$contact->state}}
                </p>
                <p><strong>Zip:</strong> 
                    {{$contact->zip}}
                </p>
                <a href="{{route ('contacts.index')}}" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-md-6">

                <div style="width: 400px; height: 500px;">

                    {!! Mapper::render() !!}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection