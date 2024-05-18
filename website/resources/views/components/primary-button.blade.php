<button {{ $attributes->merge(['type' => 'submit', 'class' => 'primaryButton']) }}>
    {{ $slot }}
</button>
