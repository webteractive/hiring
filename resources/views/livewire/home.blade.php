@push('meta')
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Join our team, join the Webteractive team! We are seeking passionate and talented individuals to fill multiple positions.">
@endpush

<div>
    <div class="container mx-auto grid gap-8 px-4 xl:grid-cols-5 xl:py-16">
        <div class="relative pt-16 xl:col-span-2">
            <div class="sticky top-0">
                <h1 class="text-8xl leading-none font-sintony font-bold tracking-wide">
                    {{ __(config('webteractive.titles.hiring')) }}
                </h1>

                <p class="mt-12 text-3xl text-gray-700 leading-snug">
                    @foreach(config('webteractive.slogan') as $line)
                        {{ __($line) }}
                    @endforeach
                </p>
            </div>
        </div>

        <div class="xl:col-span-3 {{ $this->positions->count() == 2 ? 'flex items-center' : '' }}">
            <div class="py-4 grid gap-4 md:gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                @foreach($this->positions as $position)
                    <div class="rounded-xl transition-all bg-gray-100 group shadow-lg cursor-pointer hover:shadow-xl">
                        <a
                            href="{{ route('position', ['slug' => $position->slug]) }}"
                            class="block w-full min-h-220px"
                        >
                            <img
                                src="{{ url($position->thumbnail) . '?=id' . config('app.static_asset_hash') }}"
                                alt="{{ $position->title }} banner"
                                class="w-full object-cover rounded-t-xl z-0 text-gray-200 text-xs text-center"
                            />
                        </a>

                        <div class="p-4 rounded-b">
                            <h2 class="text-gray-700 font-sintony font-bold text-2xl text-center group-hover:text-black">
                                <a href="{{ route('position', ['slug' => $position->slug]) }}">{{ $position->title }}</a>
                                @if($position->needed > 1)
                                    <span>({{ $position->needed }})</span>
                                @endif
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="application/ld+json">@json($this->positions->pluck('jsonld'))</script>
@endpush