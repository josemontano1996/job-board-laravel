<input
    type="text"
    placeholder="{{ $placeholder }}"
    name="{{ $name }}"
    value="{{ $value }}"
    id="{{ $name }}"
     {{ $attributes->merge(['class' => 'boder-0 w-full border-slate-300 rounded-md px-2.5 py-1.5 text-sm ring-1 ring-slate-100 placeholder:text-slate-400 focus:ring-2']) }}
/>
