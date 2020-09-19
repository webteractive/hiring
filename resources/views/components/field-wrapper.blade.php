@props([
  'for' => '',
  'class' => '',
  'label' => '',
  'required' => false,
])

<div class="block {{ $class }}">
  <label class="block mb-1" for="{{ $for }}">
      <span>{{ __($label) }}</span>
      @if ($required)
        <span>*</span>
      @endif
  </label>

  {{ $slot }}

  @error($for)
      <p class="mt-1 text-sm text-red-500">{!! $message !!}</p>
  @enderror
</div>