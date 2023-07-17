<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-1 bg-primary border border-transparent  font-semibold text-xs text-white uppercase tracking-widest hover:bg-secondary focus:bg-secondary active:bg-gray-900 focus:outline-none  focus:ring-secondary focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
