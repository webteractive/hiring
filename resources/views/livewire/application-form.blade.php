<div class="{{ $position ? '' : 'hidden' }}">
    @if($position)
        <div class="bg-black bg-opacity-75 fixed inset-0 md:flex md:items-center md:justify-center z-50">
            <div class="relative bg-white p-6 shadow rounded-xl max-h-full overflow-y-auto w-full md:w-980">
                <form wire:submit.prevent="submit">
                    <h3 class="font-bold text-2xl bg-white">{{ __('You are now applying for the ' . $position . ' position') }}</h3>
                    
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
                            style="rounded"
                            detects-loading
                            loading-text="Submitting..."
                            loading-target="submit"
                        >
                            {{ __('Submit') }}
                        </x-button>

                        <x-button wire:click="close" style="rounded-outline">
                            {{ __('Close') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>