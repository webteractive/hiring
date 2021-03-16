@push('meta')
    <title>{{ $this->position->title }} | {{ config('app.name') }}</title>
    <meta name="description" content="{{ $this->position->jsonld['description'] }}">
    <meta property="og:title" content="{{ $this->position->title }}" />
    <meta property="og:description" content="{{ $this->position->jsonld['description'] }}" />
    <meta property="og:image" content="{{ url($this->position->banner) }}" />
@endpush

<div class="relative transition-all">
    <div class="relative container mx-auto px-4 grid gap-8 grid-cols-1 lg:grid-cols-5 xl:grid-cols-5 ">
        <div class="lg:col-span-2 xl:col-span-2 relative pt-12 pb-0 xl:py-24">
            <div class="sticky top-0">
                <x-breadcrumb
                    :crumbs="[
                        $this->position->title
                    ]"
                    class="mb-4"
                />

                <h1 class="text-5xl lg:text-6xl xl:text-7xl leading-none font-sintony font-bold tracking-wide">
                    {{ __($this->position->title) }}
                </h1>
                
                <div class="mt-5 xl:mt-10 group">
                    @foreach($this->position->description as $item)
                        <p class="text-xl xl:text-2xl leading-relaxed mb-6 text-gray-700 group-hover:text-black">{{ __($item) }}</p>
                    @endforeach
                </div>

                <div class="mt-12">
                    <x-button
                        style="rounded"
                        size="lg"
                        class="text-2xl w-full xl:w-auto"
                        wire:click="$emitTo('application-form', 'apply', '{{ $this->position->title }}')"
                    >
                        {{ __('Apply Now') }}
                    </x-button>
                </div>
            </div>
        </div>


        <div class="lg:col-span-3 xl:col-span-3 mt-0 xl:mt-8">
            <div class="rounded-xl transition-all bg-gray-100 bg-opacity-50 shadow-lg my-8">
                <div class="relative overflow-hidden bg-gray-200 bg-opacity-75 rounded-t-xl">
                    <img
                        src="{{ url($this->position->banner) . '?=id' . config('app.static_asset_hash') }}"
                        alt="{{ $this->position->title }} banner"
                        class="w-full h-400 object-cover rounded-t-xl z-0 text-gray-200 text-xs text-center"
                    />

                    <div class="p-4 absolute bottom-0 inset-x-0 z-10">
                        @foreach ($this->position->tags as $tag)
                            <span class="border rounded-full text-xl bg-white bg-opacity-75 border-black inline-flex items-center leading-snug py-2 px-6 mt-2 mr-2">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div class="p-4">
                    <div>
                        <h2 class="text-3xl font-bold mb-2">{{ __('Responsibilities') }}</h2>
                        @foreach($this->position->responsibilities as $item)
                            <div class="text-2xl mb-2 flex group text-gray-700">
                                <span class="mr-1 text-3xl -mt-1 group-hover:text-green-500">&plus;</span>
                                <span class="group-hover:text-black">{!! $item !!}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10">
                        <h2 class="text-3xl font-bold mb-2">{{ __('Requirements') }}</h2>
                        @foreach($this->position->requirements as $item)
                            <div class="text-2xl mb-2 flex group text-gray-700">
                                <span class="mr-1 text-3xl -mt-1 group-hover:text-green-500">&plus;</span>
                                <span class="group-hover:text-black">{!! $item !!}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10">
                        <h2 class="text-3xl font-bold mb-2">{{ __('Perks') }}</h2>
                        @foreach($this->perks as $item)
                            <div class="text-2xl mb-2 flex group text-gray-700">
                                <span class="mr-1 text-3xl -mt-1 group-hover:text-green-500">&plus;</span>
                                <span class="group-hover:text-black">{!! $item !!}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-12">
                        <h2 class="text-xl font-bold mb-2 text-gray-600">{{ __('Share') }}</h2>
                        @php
                            $shareableUrl = urlencode(route('position', ['slug' => $this->position->slug]))
                        @endphp

                        <ul class="flex">
                            <li class="mr-2">
                                <a
                                    href="https://www.facebook.com/sharer.php?u={{ $shareableUrl }}"
                                    target="blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center w-10 h-10 shadow rounded-full bg-black hover:bg-facebook"
                                >
                                    <x-icon-facebook class="inline-block w-4 h-4" />
                                </a>
                            </li>

                            {{-- <li class="mx-1">
                                <a
                                    href="https://twitter.com/intent/tweet?url{{ $shareableUrl }}&text={{ urlencode($this->position->title) }}"
                                    target="blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center w-10 h-10 shadow rounded-full bg-black hover:bg-twitter"
                                >
                                    <x-icon-twitter class="inline-block w-4 h-4" />
                                </a>
                            </li> --}}

                            <li>
                                <a
                                    href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareableUrl }}"
                                    target="blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center w-10 h-10 shadow rounded-full bg-black hover:bg-linkedin"
                                >
                                    <x-icon-linkedin class="inline-block w-4 h-4" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:application-form />
</div>

@push('scripts')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ route('home') }}"
      },{
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $this->position->title }}"
      }]
    }
</script>
<script type="application/ld+json">@json($this->position->jsonld)</script>
@endpush
