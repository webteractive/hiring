@props([
  'type' => 'button',
  'class' => '',
  'style' => 'default',
  'size' => 'base',
  'detectsLoading' => false,
  'loadingText' => 'Working...',
  'loadingTarget' => ''
])

@php
$styles = [
  'default' => 'bg-black text-white hover:bg-gray-900',
  'outlined' => 'border border-black hover:border-gray-900',
  'rounded' => 'bg-black text-white rounded-full shadow hover:bg-gray-900',
  'rounded-outline' => 'border border-gray-700 rounded-full shadow hover:border-black',
];
$sizes = [
  'base' => 'h-12 px-12',
  'lg' => 'h-16 px-12'
];
@endphp

<button
  wire:target="{{ $loadingTarget }}"
  wire:loading.attr="disabled"
  type="{{ $type }}"
  class="{{ $sizes[$size] ?? $sizes['base'] }} {{ $styles[$style] ?? $styles['default'] }} {{ $class }}"
  {{ $attributes->except(['type', 'class', 'style', 'detects-loading', 'loading-text', 'loading-target']) }}
>
  @if ($detectsLoading)
    <span
      wire:loading
      wire:target="{{ $loadingTarget }}"
      class="inline-flex items-center justify-center"
    >
      <x-icon-spinner class="inline-block animate-spin h-4 w-4 text-white" />
      <span class="mr-3">{{ __($loadingText) }}</span>
    </span>
    <span
      wire:target="{{ $loadingTarget }}"
      wire:loading.class="hidden"
    >
      {{ $slot }}
    </span>
  @else
    {{ $slot }}
  @endif
</button>