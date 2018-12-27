<label class="{{ $class ?? null }}">
    <span>{{ $label ?? $input ?? null}}</span>
    {!! Form::date($input, $value ?? null, $attributes) !!}
</label>
