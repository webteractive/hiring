<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="smooth-scrolling">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <meta name="description" content="{{ config('app.meta.desc') }}">
        <link rel="icon" type="image/svg+xml" href="/image/favicon.svg">
        <link rel="alternate icon" href="/favicon.ico">
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link rel='preload' as='style' href='https://fonts.googleapis.com/css2?family=Sintony:wght@400;700&display=swap'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sintony:wght@400;700&display=swap">
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css">
        <livewire:styles />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body
        x-data
        @application-form-opened="toggleScrolling(false)"
        @application-form-closed="toggleScrolling(true)"
        class="bg-black text-white"
    >
        <div class="relative overflow-hidden bg-white text-black">
            <x-logo class="absolute inline-block opacity-25 h-1280 -top-124 left-1/2 -ml-1.5 xl:-ml-1/3 text-gray-200 bottom-0 z-0" />

            <header class="relative z-50">
                <div class="container mx-auto flex items-center py-2 justify-between">
                    <a href="{{ route('home') }}">
                        <x-logo class="w-20" />
                    </a>

                    <x-button style="rounded">
                        {{ __('Apply Now') }}
                    </x-button>
                </div>
            </header>
            
            <main class="relative z-50">
                {{ $slot }}
            </main>

            <footer class="bg-gray-900 relative z-50">
                <div class="container mx-auto py-12">
                    <div class="sm:flex sm:justify-between">
                        <div class="text-some-gray">
                            <h2 class="tracking-wide font-sintony font-bold text-3xl text-white">{{ __('Our office') }}</h2>

                            <div class="mt-4">
                                <p>{{ app('company')->addressLine1() }}</p>
                                <p>{{ join(', ', [app('company')->address('city'), app('company')->address('state')]) . ' ' . app('company')->address('zip')  . ', ' . app('company')->address('country') }}</p>
                            </div>

                            <p class="mt-2">
                                <a href="mailto:{{ app('company')->get('email') }}" class="hover:text-white hover:underline">{{ app('company')->get('email') }}</a>
                            </p>

                            <p class="mt-2">
                                <a href="tel:{{ app('company')->get('phone') }}" class="hover:text-white hover:underline">{{ app('company')->get('phone') }}</a>
                            </p>
                        </div>
                
                        <div class="mt-6 sm:mt-0 pt-12 sm:pt-16 flex justify-between sm:block">
                            @foreach (app('company')->get('socials') as $social)
                                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferer" class="inline-block mb-6 sm:ml-6">
                                    @svg($social['platform'], 'w-10 h-10 fill-current')
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-black py-10 text-white">
                    <div class="flex justify-center">
                        <x-logo class="w-12" />
                    </div>

                    <p class="text-sm text-some-gray mt-6 leading-snug flex items-center justify-center px-4 text-center">&copy; {{ date('Y') }} Webteractive Software Development Services. All rights reserved.</p>
                </div>
            </footer>
        </div>


        <livewire:scripts />

        <script src="{{ url(mix('js/app.js')) }}"></script>
    </body>
</html>
