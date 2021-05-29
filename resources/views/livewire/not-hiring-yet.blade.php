@push('meta')
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="At Webteractive, we\'ve worked hard to build a tight-knit team of talented people.">
@endpush

<div>
    <div class="container mx-auto grid gap-8 px-4 xl:grid-cols-5 xl:py-16">
        <div class="relative pt-16 xl:col-span-2">
            <div class="sticky top-20">
                <h1 class="text-8xl leading-none font-sintony font-bold tracking-wide">
                    {{ __(Arr::random(config('webteractive.titles.not_hiring_yet'))) }}
                </h1>

                <p class="mt-12 text-3xl text-gray-700 leading-snug">
                    @foreach(config('webteractive.not_hiring_slogan') as $line)
                        {!! __($line) !!}
                    @endforeach
                </p>
            </div>
        </div>


        <div class="xl:col-span-3">
            <div class="py-4 grid gap-4 md:gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                <img
                    src="{{ url('image/image-1.png') }}"
                    alt="Image One"
                    class="w-full object-cover z-0 text-gray-200 text-xs rounded-xl shadow text-center"
                />

                <img
                    src="{{ url('image/image-2.png') }}"
                    alt="Image Two"
                    class="w-full object-cover z-0 text-gray-200 text-xs rounded-xl shadow text-center"
                />

                <img
                    src="{{ url('image/image-3.png') }}"
                    alt="Image Two"
                    class="w-full object-cover z-0 text-gray-200 text-xs rounded-xl shadow text-center"
                />

                <img
                    src="{{ url('image/image-4.png') }}"
                    alt="Image Two"
                    class="w-full object-cover z-0 text-gray-200 text-xs rounded-xl shadow text-center"
                />
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="application/ld+json">@json($this->positions->pluck('jsonld'))</script>
@endpush