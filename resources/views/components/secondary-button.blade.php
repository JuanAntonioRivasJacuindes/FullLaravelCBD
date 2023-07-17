<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-secondary font-semibold text-xs text-secondary uppercase tracking-widest shadow-sm hover:bg-background focus:outline-none  focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
