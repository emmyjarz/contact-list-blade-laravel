@php
$options = $options ?? [];
$type = $type ?? 'text';
@endphp
<div class="form-group @if($errors->has($input)) has-error @endif">
    {{ Form::label($label, null, ['class' => 'control-label']) }}
    {{ Form::{$type}($input, old($input, ($data->{$input} ?? '')), array_merge($options, ['autocomplete' => 'off'], ['class' => 'form-control'])) }}
    @if($errors->has($input))
        <small class='text-danger'>
            {{$errors->first($input)}}
        </small>
    @endif
</div>