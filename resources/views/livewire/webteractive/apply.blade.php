<x-job-layout>
    <div class="pb-12 px-6 sm:lg-0">
        @foreach ($this->jobs as $job)
            <div id="{{ Str::slug($job['title']) }}" class="py-8">
                <div class="container mx-auto">
                    <div class="mb-6 text-base font-sintony">
                        <h2 class="text-6xl font-bold font-sintony leading-snug tracking-wider">{{ $job['title'] }}</h2>
                        
                        <div class="mt-4">
                            @foreach ($job['tags'] as $tag)
                                <span class="border border-black bg-white inline-flex items-center leading-snug py-2 px-6 mt-2 mr-2">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            @foreach ($job['description'] as $desc)
                                <p class="mb-5 leading-relaxed">{{ $desc }}</p>
                            @endforeach
                        </div>
            
                        <div class="mt-8">
                            <h3 class="font-bold text-xl">{{ __('Responsibilities') }}</h3>
                            <ul class="mt-2">
                                @foreach ($job['responsibilities'] as $responsibility)
                                    <li class="mt-2 flex leading-snug items-baseline sm:items-center">
                                        <span class="text-xl mr-2">&plus;</span>
                                        <span>{{ __($responsibility) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
            
                        <div class="mt-8">
                            <h3 class="font-bold text-xl">{{ __('Requirements') }}</h3>
                            <ul class="mt-2">
                                @foreach ($job['requirements'] as $requirement)
                                    <li class="mt-2 flex leading-snug items-baseline sm:items-center">
                                        <span class="text-xl mr-2">&plus;</span>
                                        <span>{{ __($requirement) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-8">
                            <x-button wire:click="apply('{{ $job['title'] }}')" class="w-full sm:w-auto">
                                {{ __($position === $job['title'] ? 'Applying' : 'Apply Now') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>

            <script type="application/ld+json">{!! json_encode($job['jsonld']) !!}</script>
        @endforeach
    </div>

    @if ($shown)
    <div class="bg-black bg-opacity-25 fixed inset-0 md:flex md:items-center md:justify-center z-50">
        <div class="relative bg-white p-6 shadow rounded max-h-full overflow-y-auto w-full md:w-980">
            <form wire:submit.prevent="submit">
                <h3 class="font-bold text-2xl bg-white">{{ __('Applying for ' . $position . ' position') }}</h3>
                
                <p class="text-sm mt-1">{{ __('Fields marked with * are required.') }}</p>

                @if ($this->notification)
                    <div
                        wire:key="notification"                            
                        class="border-l-4 border-green-500 px-4 py-1 mt-3 text-green-800"
                        x-data
                        x-ref="notification"
                        x-init="setTimeout(function() { $refs.notification.remove() }, 20000)"
                    >
                        {{ $this->notification }}
                    </div>
                @endif

                <div class="md:flex mt-8">
                    <div class="md:w-1/2 md:mr-2">
                        <x-field-wrapper
                            required
                            for="name"
                            label="Full Name"
                        >
                            <input
                                wire:model.lazy="name"
                                name="name"
                                type="text"
                                class="text-lg px-4 py-3 outline-none w-full border border-gray-500 rounded"
                            />
                        </x-field-wrapper>
                    </div>

                    <div class="mt-6 md:mt-0 md:w-1/2 md:ml-2">
                        <x-field-wrapper
                            required
                            for="email"
                            label="Email Address"
                        >
                            <input
                                wire:model.lazy="email"
                                name="email"
                                type="email"
                                class="text-lg px-4 py-3 outline-none w-full border border-gray-500 rounded"
                            />
                        </x-field-wrapper>
                    </div>
                </div>

                <x-field-wrapper
                    required
                    for="file"
                    class="mt-6"
                    label="Resume / CV"
                >
                    <p class="text-xs text-gray-600 mb-2">{{ __('Please only upload PDF, MS Docs (doc, docx) or Open Document Format.') }}</p>
                    <input
                        x-data
                        @application-sent.window="$el.value = ''"
                        name="file"
                        wire:model="file" 
                        type="file"
                        class="text-lg px-4 py-3 outline-none w-full border border-gray-500 rounded"
                    />
                </x-field-wrapper>

                <div x-data class="block mt-6" data-skip-validation="{{ json_encode(session()->has('message')) }}">
                    <label class="block mb-1" for="message">
                        <span>{{ __('Cover Letter') }}</span>
                        <span>*</span>
                    </label>
                    <p class="text-xs text-gray-600 mb-2">
                        {{ __('Think of your cover letter as a sales pitch that will market your credentials and help you get the interview.') }}
                        Click <a class="font-bold hover:underline" href="https://www.thebalancecareers.com/cover-letters-4161919" target="_blank" rel="noopener noreferer">here</a> for more details.
                    </p>
                    <div wire:ignore>
                        <div id="toolbar" class="hidden"></div>
                        <trix-editor
                            x-ref="trix"
                            wire:key="trix-editor"
                            @application-sent.window="$refs.trix.editor.loadHTML('')"
                            @trix-change.debounce.400ms="$wire.setMessage($event.target.value, $el.dataset.skipValidation)"
                            name="message"
                            toolbar="toolbar"
                            class="text-lg px-4 py-3 outline-none w-full border border-gray-500 rounded"
                        ></trix-editor>
                    </div>
                  
                    @error('message')
                        <p class="mt-1 text-sm text-red-500">{!! __($message) !!}</p>
                    @enderror
                  </label>
                

                <div class="mt-8">
                    <x-button
                        type="submit"
                        detects-loading
                        loading-text="Submitting..."
                        loading-target="submit"
                    >
                        {{ __('Submit') }}
                    </x-button>

                    <x-button wire:click="close" style="outlined">
                        {{ __('Close') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    @endif
</x-job-layout>