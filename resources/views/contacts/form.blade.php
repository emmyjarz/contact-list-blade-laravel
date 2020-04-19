<div class="form-row">
    <div class="col">
        @input_text([
        'label' => 'First Name',
        'input' => 'firstname',
        'data' => $contact ?? null
        ])
    </div>
    <div class="col">
        @input_text([
        'label' => 'Last Name',
        'input' => 'lastname',
        'data' => $contact ?? null
        ])
    </div>
    <div class="col">
        @input_text([
        'label' => 'Email',
        'input' => 'email',
        'data' => $contact ?? null
        ])
    </div>
</div>
<div class="form-row">
    <div class="col">
        @input_text([
        'label' => 'Phone',
        'input' => 'phone',
        'data' => $contact ?? null
        ])
    </div>
    {{-- <div class="form-group col-md-4">
        <label for="">Phone</label>
        <input type="tel" class="form-control" name="phone" id="phone" pattern="[0-9]{10}" placeholder="8007775555">
    </div> --}}
    <div class="form-group col-md-4">
        <label for="">Birthday</label>
        <input type="date" class="form-control" name="birthday">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-8">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="" name="address1" placeholder="1234 Main St">
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" id="" name="address2" placeholder="Apartment, studio, or floor">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">City</label>
        <input type="text" class="form-control" id="" name="city" placeholder="City">
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select class="form-control" id="" name="state">
            <option value="">State</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="">Zip</label>
        <input type="text" pattern="[0-9]{5}" name="zip" class="form-control" id="" placeholder="90001">
    </div>
</div>
<div class="form-group float-right">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route ('contacts.index')}}" class="btn btn-secondary">Back</a>
</div>
@section('additional_scripts')
<script defer src="{{url('/assets/js/phone.js', [], $URL_HTTPS)}}"></script>
@endsection