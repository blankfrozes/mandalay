<label class="block {{ $class }}">
    <span class="mb-1 text-xs font-medium text-gray-700 sm:text-sm md:text-lg">{{ $label }}</span>
    <input type="{{ $type }}"
        class="block w-full px-2 py-1 rounded form-input disabled:bg-gray-200 disabled:text-gray-600 read-only:bg-gray-200"
        placeholder="{{ $placeholder }}"
        @if ($debounced) wire:model.defer="{{ $name }}"
        @else
            wire:model.debounce.500ms="{{ $name }}" @endif
        @if ($disabled) disabled @endif
        @if ($readonly) readonly="readonly" @endif />
    @error($name)
        <span class="text-xs text-red-500">{{ $message }}</span>
    @enderror
</label>
