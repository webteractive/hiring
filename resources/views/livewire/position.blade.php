<div>
    <div class="container mx-auto grid grid-cols-5 gap-8">
        <div class="col-span-2 relative py-24">
            <h1 class="text-7xl sticky top-0 leading-none font-sintony font-bold tracking-wide">
                {{ __($this->position->title) }}
            </h1>
            
            <div class="mt-10">
                @foreach($this->position->description as $item)
                    <p class="text-2xl leading-relaxed mb-6 text-gray-700">{{ __($item) }}</p>
                @endforeach
            </div>

            <div class="mt-12">
                <x-button style="rounded">
                    {{ __('Join us now') }}
                </x-button>
            </div>
        </div>


        <div class="col-span-3 mt-8">
            <div class="rounded transition-all bg-gray-100 shadow-lg my-8">
                <div class="relative min-h-50vh bg-gray-200 rounded-t">


                    <div class="p-4 absolute bottom-0 inset-x-0">
                        @foreach ($this->position->tags as $tag)
                            <span class="border rounded-full text-xl border-black inline-flex items-center leading-snug py-2 px-6 mt-2 mr-2">
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
                                <span class="group-hover:text-black">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10">
                        <h2 class="text-3xl font-bold mb-2">{{ __('Requirements') }}</h2>
                        @foreach($this->position->requirements as $item)
                            <div class="text-2xl mb-2 flex group text-gray-700">
                                <span class="mr-1 text-3xl -mt-1 group-hover:text-green-500">&plus;</span>
                                <span class="group-hover:text-black">{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>