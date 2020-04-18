<?php
$placeholder = $placeholder ?? '';
?>
<div class="form-group @if($errors->has($input)) has-error @endif">
    <label for="{{$input}}">{!! $label !!}</label>
    <input type="text" class="form-control" name="{{$input}}" id="{{$input}}" placeholder="{{$placeholder}}" value="{{old($input, $data->{$input} ?? '')}}">
    @if($errors->has($input))
        <small class='text-danger'>
            {{$errors->first($input)}}
        </small>
    @endif
</div>