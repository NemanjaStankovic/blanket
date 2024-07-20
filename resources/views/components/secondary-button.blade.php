<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-outline-danger waves-effect waves-light']) }}>
    {{ $slot }}
</button>
