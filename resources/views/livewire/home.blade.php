@push('meta')
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Join our team, join the Webteractive team! We are seeking passionate and talented individuals to fill multiple positions.">
@endpush

<div>
    <div class="container mx-auto grid gap-8 px-4 xl:grid-cols-5 xl:py-16">
        <div class="relative pt-16 xl:col-span-2">
            <div class="sticky top-0">
                <h1 class="text-8xl leading-none font-sintony font-bold tracking-wide">
                    {{ __('Join our team!') }}
                </h1>

                <p class="mt-12 text-3xl text-gray-700 leading-snug">
                    {{ __('At Webteractive, we\'ve worked hard to build a tight-knit team of talented people.') }}
                    {{ __('We genuinely care about providing our team with a respectful, safe, and diverse environment to grow in—as professionals and individuals.') }}
                </p>
            </div>
        </div>


        <div class="xl:col-span-3">
            <div class="py-4 grid gap-4 md:gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                @foreach($this->positions as $position)
                    <div class="rounded-xl transition-all bg-gray-100 group shadow-lg cursor-pointer hover:shadow-xl">
                        <img
                            src="{{ asset("image/{$position->slug}-400x280.png") }}"
                            alt="{{ $position->title }} banner"
                            class="w-full object-cover rounded-t-xl z-0 text-gray-200 text-xs text-center"
                        />

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