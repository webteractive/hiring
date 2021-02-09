<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="smooth-scrolling">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('meta')
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
        <div class="relative bg-white text-black">
            <div class="absolute inset-0 z-0 overflow-hidden">
                <x-logo class="absolute inline-block opacity-25 h-1280 -top-124 left-1/2 -ml-1.5 xl:-ml-1/3 text-gray-200 bottom-0 z-0" />
            </div>

            <header class="relative z-50">
                <div class="container mx-auto flex items-center px-4 py-4 justify-between">
                    <a href="{{ route('home') }}">
                        <x-logo class="w-20" />
                    </a>

                    <div
                        x-data="{ shown: false }"
                        @scroll.window="shown = false"
                        class="inline-flex relative"
                    >
                        <button
                            @click="shown = !shown"
                            title="{{ __('Show available poistions') }}"
                            type="button"
                            class="h-12 w-12 rounded-full mb-1 shadow-lg bg-gray-700 text-white hover:bg-black"
                        >
                            <x-icon-menu class="inline-block h-8 w-8" />
                        </button>

                        <div
                            x-cloak
                            x-show="shown"
                            @click.away="shown = false"
                            style="display: none;"
                            class="transition-all fixed inset-0 p-8 pt-20 md:pt-8 md:absolute md:top-full md:right-0 md:left-auto md:bottom-auto w-screen min-h-screen md:w-420 md:min-h-0 rounded-xl shadow-xl bg-white z-50"
                        >
                            <button @click.prevent="shown = false" type="button" class="md:hidden h-10 w-10 absolute top-0 right-0 mt-6 mr-6">
                                <x-icon-close class="inline-block h-10 w-10" />
                            </button>

                            <h2 class="font-syntony text-2xl text-gray-400 mb-2">{{ __('Available Positions') }}</h2>

                            @foreach(\App\Models\Position::all() as $position)
                                <a
                                    href="{{ route('position', ['slug' => $position->slug]) }}"
                                    class="block w-full py-1 text-2xl text-gray-900 hover:text-black hover:underline"
                                >
                                    <span>{{ $position->title }}</span>
                                    @if($position->needed > 1)
                                        <span>({{ $position->needed }})</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </header>
            
            <main class="relative z-40">
                {{ $slot }}
            </main>

            <footer class="bg-gray-900 relative z-30 mt-8">
                <div class="container px-4 mx-auto py-12">
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

        @stack('scripts')
    </body>
</html>
