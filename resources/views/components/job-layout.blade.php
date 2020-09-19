{{-- <div class="bg-gray-500 transform skew-y-12 absolute top-0 right-0 min-h-screen min-w-full z-0"></div> --}}

<div id="app" class="font-sintony">
    <div class="px-6 sm:py-0 z-40">

        <div class="relative container mx-auto">
            <x-logo class="absolute inline-block h-1280 -left-380 text-gray-200 bottom-0 z-0" />

            <div class="relative flex items-center justify-center py-12 z-10">
                <a href="{{ route('home') }}">
                    <x-logo class="w-32" />
                </a>
            </div>

            <div class="relative h-1024 flex items-center z-50">
                <h1 class="text-8xl sm:text-12xl font-bold font-sintony flex-1 leading-snug">
                    <span class="tracking-tight">We're</span>
                    <br>
                    <span class="tracking-wider">Hiring</span>
                </h1>
            </div>
        </div>
    </div>
    
    <main class="relative z-40">
        {{ $slot }}
    </main>
    
    <footer class="relative">
        <div class="bg-gray-900 text-white py-10 px-6">
            <div class="container mx-auto">
                <div class="sm:flex sm:justify-between">
                    <div class="text-some-gray">
                        <h2 class="tracking-wide font-sintony font-bold text-4xl text-white">{{ __('Visit Us') }}</h2>
                        <div class="mt-4">
                            <p>{{ $address[0] }}</p>
                            <p>{{ $address[1] }}</p>
                        </div>
                        <p class="mt-2 font-bold"><a href="mailto:{{ $email }}" class="hover:text-white hover:underline">{{ $email }}</a></p>
                        <p class="mt-2 font-bold">{{ $phone }}</p>
                    </div>
            
                    <div class="mt-6 sm:mt-0 pt-12 sm:pt-16 flex justify-between sm:block">
                        @foreach ($socials as $social)
                            <a href="{{ $social['url'] }}" class="inline-block sm:ml-6">
                                @svg($social['platform'], 'w-10 h-10 fill-current')
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-black py-10 text-white">
            <div class="flex justify-center">
                <x-logo class="w-16" />
            </div>
            <p class="text-sm text-some-gray mt-6 leading-snug flex items-center justify-center px-4 text-center">&copy; {{ date('Y') }} Webteractive Software Development Services. All rights reserved.</p>
        </div>
    </footer>
</div>