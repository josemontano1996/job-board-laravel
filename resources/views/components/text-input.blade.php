<div class="relative">
@if('textarea' !== $type)
    @if ($formRef)
        <button
            class="absolute right-0 top-0 flex h-full items-center pr-2"
            type="button"
            @click="$refs['input-{{$name}}'].value=''; $refs['{{$formRef}}'].submit();"
           {{--  onclick="
        document.getElementById('{{ $name }}').value='';
        document.getElementById('{{ $formId }}').submit(); --}}
        
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-4 w-4 text-slate-500"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18 18 6M6 6l12 12"
                />
            </svg>
        </button>
    @endif

    <input
        x-ref="input-{{$name}}"
        type="{{$type}}"
        placeholder="{{ $placeholder }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        id="{{ $name }}"
        @if($type ==="file" && $fileType) accept="{{ $fileType }}" @endif
        @class([
            'w-full rounded-md border-0 px-2.5 py-1.5 text-sm ring-1 plaholder:text-slate-400 focus:ring-2',
            'pr-8'=>$formRef,
            'ring-slate-300' =>!$errors->has($name),
            'ring-red-300' =>$errors->has($name)
        ])
    />
    @else
    <textarea
    name="{{ $name }}"
    id="{{ $name }}"
    @class([
            'w-full rounded-md border-0 px-2.5 py-1.5 text-sm ring-1 plaholder:text-slate-400 focus:ring-2',
            'pr-8'=>$formRef,
            'ring-slate-300' =>!$errors->has($name),
            'ring-red-300' =>$errors->has($name)
        ])
        >
            {{old($name, $value)}}
    </textarea>
    @endif
    @error($name)
    <div role="alert" class="mt-1 text-sm text-red-500">
        {{$message}}
    </div>
    @enderror
</div>
