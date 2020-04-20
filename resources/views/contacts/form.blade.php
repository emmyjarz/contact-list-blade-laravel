<div class="form-row">
    <div class="col">
        @input([
        'label' => 'First Name',
        'input' => 'firstname',
        'data' => $contact ?? null
        ])
    </div>
    <div class="col">
        @input([
        'label' => 'Last Name',
        'input' => 'lastname',
        'data' => $contact ?? null
        ])
    </div>
    <div class="col">
        @input([
        'label' => 'Email',
        'input' => 'email',
        'data' => $contact ?? null
        ])
    </div>
</div>
<div class="form-row">
    <div class="col">
        @input([
        'type' => 'tel',
        'label' => 'Phone',
        'input' => 'phone',
        'options' => [
            'id' => 'phone'
        ],
        'data' => $contact ?? null
        ])
    </div>
    <div class="col">
        @input([
        'type' => 'date',
        'label' => 'Birthday',
        'input' => 'birthday',
        'data' => $contact ?? null
        ])
    </div>
</div>
<hr class="border-top border-primary">
<div class="form-row">
    <div class="col-md-8">
        @input([
        'label' => 'Address',
        'input' => 'address1',
        'data' => $contact->address ?? null
        ])
    </div>
    <div class="col-md-4">
        @input([
        'label' => 'Address 2',
        'input' => 'address2',
        'options' => [
            'placeholder' => 'Apartment, studio, or floor'
        ],
        'data' => $contact->address ?? null
        ])
    </div>
</div>
<div class="form-row">
    <div class="col">
        @input([
        'label' => 'City',
        'input' => 'city',
        'data' => $contact->address ?? null
        ])
    </div>
    <div class="col">
        @input_select([
        'label' => 'State',
        'input' => 'state',
        'select_items' => ['' => 'State'] + config('options.states'),
        'data' => $contact->address ?? null])
    </div>
    <div class="col">
        @input([
        'label' => 'Zip',
        'input' => 'zip',
        'data' => $contact->address ?? null
        ])
    </div>
</div>
<div class="form-group float-right">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    <a href="{{route ('contacts.index')}}" class="btn btn-secondary">Back</a>
</div>
@section('additional_scripts')
<script defer src="{{url('/assets/js/phone.js', [], $URL_HTTPS)}}"></script>
@endsection