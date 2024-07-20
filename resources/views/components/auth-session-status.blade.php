@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-reset']) }}>
        {{ $status }}
    </div>
@endif
