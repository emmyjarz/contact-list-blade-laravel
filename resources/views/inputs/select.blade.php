@php
$options = ['class' => 'form-control'];
@endphp
<div class="form-group @if($errors->has($input)) has-error @endif">
    {{ Form::label($label, null, ['class' => 'control-label']) }}
    {{ Form::select($input, $select_items, old($input, (empty($data) ? '' : $data->{$input})), $options) }}
    @if($errors->has($input))
        <small class="text-danger">
            {{ $errors->first($input) }}
        </small>
    @endif
</div>