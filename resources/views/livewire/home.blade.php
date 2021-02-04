<div>
    <div class="container mx-auto min-h-screen flex items-center justify-between">
        <div class="w-4/12">
            <h1 class="text-8xl leading-none font-sintony font-bold tracking-wide">
                <span>{{ __('Join') }}</span>
                <br>
                <span>{{ __('Our') }}</span>
                <br>
                <span>{{ __('Team!') }}</span>
            </h1>
            <p class="mt-12 text-4xl">{{ __('We are looking for talented people that can help us reach our goals.') }}</p>

            <div class="mt-12">
                <x-button style="rounded">
                    {{ __('Join us now') }}
                </x-button>
            </div>
        </div>


        <div class="w-7/12">
            <div class="grid grid-cols-2 gap-8">
                @foreach($this->positions as $position)
                    <div class="rounded transition-all bg-gray-100 group shadow-lg cursor-pointer hover:shadow-xl">
                        <div class="h-40 bg-gray-200 rounded-t">
                        
                        </div>

                        <div class="p-4 rounded-b">
                            <h2 class="font-sintony font-bold text-2xl">
                                <a href="{{ route('position', ['slug' => $position->slug]) }}">{{ $position->title }}</a>
                            </h2>
                        </div>
                    </div>
                @endforeach
            
            </div>
        </div>
    </div>
</div>