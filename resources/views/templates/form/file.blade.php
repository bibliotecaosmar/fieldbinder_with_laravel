<label class="{{ $class ?? null }}">
    <span>{{ $label ?? $input ?? 'ERROR' }}</span>
    {!! Form::file($input, $attributes) !!}
</label>
