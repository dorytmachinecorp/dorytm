<x-layouts.app :title="'Contact Us | ' . config('cms.seo.title_suffix')">
    {{-- HERO SECTION --}}
    <section class="relative bg-steel-950 pt-32 pb-20 lg:pt-40 lg:pb-28 border-b border-steel-900 overflow-hidden" 
             style="background-image: radial-gradient(var(--color-steel-900) 1px, transparent 1px); background-size: 24px 24px;">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-900/10 blur-3xl rounded-full pointer-events-none"></div>
        <x-ui.container class="relative z-10">
            <div class="flex flex-col items-start text-left max-w-4xl" data-reveal="fade-up">
                {{-- Status Indicator --}}
                <div class="inline-flex items-center space-x-2 bg-steel-900 border border-steel-800 px-3 py-1.5 mb-6">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-primary-500"></span>
                    </span>
                    <span class="font-mono text-xs text-steel-400 tracking-wider uppercase">System Active: Open for Inquiries</span>
                </div>
                
                <h1 class="text-4xl md:text-6xl font-display font-extrabold text-white mb-6 uppercase tracking-tight">
                    Contact <span class="text-primary-400">DO-RYT</span> Engineering
                </h1>
                
                <p class="text-lg md:text-xl text-steel-400 max-w-2xl text-balance leading-relaxed">
                    Get in touch with our technical team to discuss custom machinery designs, stainless steel process engineering, or request a global service quote.
                </p>
                
                {{-- Technical metadata badge --}}
                <div class="mt-8 flex flex-wrap gap-4 text-xs font-mono text-steel-500">
                    <span>[ SITE_LOC: 23.0225° N, 72.5714° E ]</span>
                    <span>[ DOC_REF: DRY-CNCT-V2.0 ]</span>
                </div>
            </div>
        </x-ui.container>
    </section>

    {{-- MAIN SECTION --}}
    <section class="py-24 bg-white relative" 
             style="background-image: linear-gradient(var(--color-steel-100) 1px, transparent 1px), linear-gradient(90deg, var(--color-steel-100) 1px, transparent 1px); background-size: 40px 40px;">
        
        <x-ui.container>
            <div class="flex flex-col lg:flex-row gap-12 items-stretch" data-reveal="stagger">
                
                {{-- CONTACT FORM --}}
                <div class="w-full lg:w-3/5 bg-steel-950 text-white p-8 md:p-12 border border-steel-800 relative shadow-2xl flex flex-col justify-between">
                    {{-- Decorative Corner Lines --}}
                    <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-primary-500"></div>
                    <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-primary-500"></div>
                    <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-primary-500"></div>
                    <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-primary-500"></div>
                    
                    <div>
                        <div class="flex justify-between items-center mb-8 border-b border-steel-800 pb-6">
                            <h2 class="text-2xl font-display font-bold uppercase tracking-wide text-white">
                                01 / Send technical inquiry
                            </h2>
                            <span class="font-mono text-xs text-primary-400">[ FORM-CONTROL ]</span>
                        </div>

                        {{-- Alert messages --}}
                        @if(session('success'))
                            <div class="mb-8 p-4 bg-primary-950/50 border-l-4 border-primary-500 text-primary-200 font-mono text-sm flex items-start space-x-3">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-primary-400 shrink-0 mt-0.5" />
                                <div>
                                    <p class="font-bold uppercase tracking-wider">Transmission Success</p>
                                    <p class="text-xs mt-1 text-steel-300">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-8 p-4 bg-red-950/50 border-l-4 border-red-500 text-red-200 font-mono text-sm flex items-start space-x-3">
                                <x-heroicon-o-exclamation-triangle class="w-5 h-5 text-red-400 shrink-0 mt-0.5" />
                                <div>
                                    <p class="font-bold uppercase tracking-wider">Transmission Error</p>
                                    <p class="text-xs mt-1 text-steel-300">{{ session('error') }}</p>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contact.post') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            {{-- Honeypot field --}}
                            <div class="hidden" style="display:none;">
                                <input type="text" name="website" id="website" value="" autocomplete="off" tabindex="-1">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Name field --}}
                                <div class="relative">
                                    <label for="name" class="block text-xs font-mono uppercase text-steel-400 mb-2">
                                        Full Name <span class="text-primary-400">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                            <x-heroicon-o-user class="h-4 w-4 text-steel-500" />
                                        </div>
                                        <input type="text" 
                                               name="name" 
                                               id="name" 
                                               value="{{ old('name') }}"
                                               required 
                                               placeholder="e.g., John Doe" 
                                               @class([
                                                   'w-full bg-steel-900/50 border py-3 pl-10 pr-4 text-white placeholder-steel-600 focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500/20 transition-all font-mono text-sm',
                                                   'border-red-500' => $errors->has('name'),
                                                   'border-steel-800' => !$errors->has('name')
                                               ])>
                                    </div>
                                    @error('name')
                                        <span class="text-xs font-mono text-red-400 mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Company field --}}
                                <div class="relative">
                                    <label for="company" class="block text-xs font-mono uppercase text-steel-400 mb-2">
                                        Company Name
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                            <x-heroicon-o-building-office class="h-4 w-4 text-steel-500" />
                                        </div>
                                        <input type="text" 
                                               name="company" 
                                               id="company" 
                                               value="{{ old('company') }}"
                                               placeholder="e.g., ACME Processing Ltd" 
                                               @class([
                                                   'w-full bg-steel-900/50 border py-3 pl-10 pr-4 text-white placeholder-steel-600 focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500/20 transition-all font-mono text-sm',
                                                   'border-red-500' => $errors->has('company'),
                                                   'border-steel-800' => !$errors->has('company')
                                               ])>
                                    </div>
                                    @error('company')
                                        <span class="text-xs font-mono text-red-400 mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Email field --}}
                                <div class="relative">
                                    <label for="email" class="block text-xs font-mono uppercase text-steel-400 mb-2">
                                        Email Address <span class="text-primary-400">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                            <x-heroicon-o-envelope class="h-4 w-4 text-steel-500" />
                                        </div>
                                        <input type="email" 
                                               name="email" 
                                               id="email" 
                                               value="{{ old('email') }}"
                                               required 
                                               placeholder="e.g., john@company.com" 
                                               @class([
                                                   'w-full bg-steel-900/50 border py-3 pl-10 pr-4 text-white placeholder-steel-600 focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500/20 transition-all font-mono text-sm',
                                                   'border-red-500' => $errors->has('email'),
                                                   'border-steel-800' => !$errors->has('email')
                                               ])>
                                    </div>
                                    @error('email')
                                        <span class="text-xs font-mono text-red-400 mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Phone field --}}
                                <div class="relative">
                                    <label for="phone" class="block text-xs font-mono uppercase text-steel-400 mb-2">
                                        Phone / WhatsApp
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                            <x-heroicon-o-phone class="h-4 w-4 text-steel-500" />
                                        </div>
                                        <input type="text" 
                                               name="phone" 
                                               id="phone" 
                                               value="{{ old('phone') }}"
                                               placeholder="e.g., +91 98765 43210" 
                                               @class([
                                                   'w-full bg-steel-900/50 border py-3 pl-10 pr-4 text-white placeholder-steel-600 focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500/20 transition-all font-mono text-sm',
                                                   'border-red-500' => $errors->has('phone'),
                                                   'border-steel-800' => !$errors->has('phone')
                                               ])>
                                    </div>
                                    @error('phone')
                                        <span class="text-xs font-mono text-red-400 mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Message field --}}
                            <div class="relative">
                                <label for="message" class="block text-xs font-mono uppercase text-steel-400 mb-2">
                                    Message Details <span class="text-primary-400">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3.5 left-3.5 flex items-start pointer-events-none">
                                        <x-heroicon-o-chat-bubble-bottom-center-text class="h-4 w-4 text-steel-500" />
                                    </div>
                                    <textarea name="message" 
                                              id="message" 
                                              rows="6" 
                                              required 
                                              placeholder="Provide capacity requirements, raw material details, or system specs..." 
                                              @class([
                                                  'w-full bg-steel-900/50 border py-3 pl-10 pr-4 text-white placeholder-steel-600 focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500/20 transition-all font-mono text-sm resize-none',
                                                  'border-red-500' => $errors->has('message'),
                                                  'border-steel-800' => !$errors->has('message')
                                              ])>{{ old('message') }}</textarea>
                                </div>
                                @error('message')
                                    <span class="text-xs font-mono text-red-400 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            {{-- Submit Button --}}
                            <button type="submit" 
                                    class="w-full flex items-center justify-center bg-primary-600 hover:bg-primary-500 text-white font-mono text-sm uppercase tracking-wider py-4 px-6 transition-all duration-300 hover:scale-[1.01] focus:outline-none focus:ring-2 focus:ring-primary-500 active:scale-95 cursor-pointer">
                                <span class="mr-2">Transmit Inquiry</span>
                                <x-heroicon-o-arrow-right class="w-4 h-4" />
                            </button>
                        </form>
                    </div>
                </div>

                {{-- CONTACT INFO (TECHNICAL SPEC SHEET) --}}
                <div class="w-full lg:w-2/5 flex flex-col justify-between">
                    <div class="border border-steel-200 bg-steel-50/80 backdrop-blur-sm p-8 md:p-12 relative grow flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-8 border-b border-steel-200 pb-6">
                                <h3 class="text-xl font-display font-extrabold text-steel-900 uppercase tracking-wide">
                                    02 / TECHNICAL SPEC SHEET
                                </h3>
                                <span class="font-mono text-xs text-steel-400">[ HQ-DATA ]</span>
                            </div>

                            <div class="space-y-8">
                                {{-- Address Block --}}
                                <div class="flex items-start">
                                    <div class="w-10 h-10 border border-steel-300 bg-white flex items-center justify-center shrink-0 mr-4">
                                        <x-heroicon-o-map-pin class="w-5 h-5 text-steel-700" />
                                    </div>
                                    <div>
                                        <h4 class="font-mono text-xs uppercase tracking-wider text-steel-500 mb-1.5">[ LOC: HEADQUARTERS ]</h4>
                                        <p class="text-steel-900 text-sm font-semibold leading-relaxed font-sans">
                                            {!! nl2br(e(setting('contact.address', "Plot No 45, Industrial Area Phase II\nAhmedabad, Gujarat\nIndia - 380015"))) !!}
                                        </p>
                                    </div>
                                </div>

                                {{-- Emails Block --}}
                                <div class="flex items-start">
                                    <div class="w-10 h-10 border border-steel-300 bg-white flex items-center justify-center shrink-0 mr-4">
                                        <x-heroicon-o-envelope-open class="w-5 h-5 text-steel-700" />
                                    </div>
                                    <div>
                                        <h4 class="font-mono text-xs uppercase tracking-wider text-steel-500 mb-1.5">[ COMM: ELECTRONIC MAIL ]</h4>
                                        <div class="space-y-1 text-sm font-semibold text-steel-900 font-sans">
                                            <p>Email: <a href="mailto:{{ setting('contact.email', 'sales@doryt.com') }}" class="hover:text-primary-600 transition-colors">{{ setting('contact.email', 'sales@doryt.com') }}</a></p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Telephony Block --}}
                                <div class="flex items-start">
                                    <div class="w-10 h-10 border border-steel-300 bg-white flex items-center justify-center shrink-0 mr-4">
                                        <x-heroicon-o-phone-arrow-up-right class="w-5 h-5 text-steel-700" />
                                    </div>
                                    <div>
                                        <h4 class="font-mono text-xs uppercase tracking-wider text-steel-500 mb-1.5">[ VOICE: TELEPHONY ]</h4>
                                        <p class="text-steel-900 text-sm font-semibold font-sans">
                                            Sales & Support: <a href="tel:{{ setting('contact.phone', '+919876543210') }}" class="hover:text-primary-600 transition-colors">{{ setting('contact.phone', '+91 98765 43210') }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- WhatsApp Widget --}}
                        <div class="mt-12 border-t border-steel-200 pt-8">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('contact.whatsapp', setting('contact.phone', '919876543210'))) }}" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="flex items-center justify-center w-full bg-[#128C7E] hover:bg-[#075E54] text-white font-mono text-xs uppercase tracking-wider py-4 px-6 transition-all duration-300 hover:scale-[1.01] active:scale-95">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.031 0C5.383 0 0 5.383 0 12.031c0 2.122.553 4.19 1.603 6L.512 24l6.113-1.603A12.022 12.022 0 0012.031 24c6.648 0 12.03-5.383 12.03-12.031C24.062 5.383 18.68 0 12.031 0zm0 22.016c-1.815 0-3.593-.487-5.147-1.408l-.37-.219-3.824 1.003 1.023-3.73-.24-.383A10.016 10.016 0 012.016 12c0-5.523 4.492-10.016 10.015-10.016 5.522 0 10.014 4.493 10.014 10.016 0 5.523-4.492 10.015-10.014 10.015zM17.53 14.536c-.303-.152-1.789-.884-2.065-.986-.276-.102-.477-.152-.678.152-.201.304-.78 1.01-.956 1.213-.176.203-.353.228-.656.076-.303-.152-1.275-.47-2.428-1.5-.9-.806-1.507-1.802-1.684-2.106-.176-.304-.019-.47.133-.62.136-.135.303-.354.455-.53.152-.177.202-.303.303-.506.101-.203.05-.38-.026-.531-.076-.152-.678-1.637-.93-2.242-.244-.59-.493-.51-.678-.52-.176-.01-.378-.01-.58-.01-.202 0-.53.076-.807.38-.276.304-1.058 1.034-1.058 2.52 0 1.485 1.083 2.92 1.234 3.123.152.203 2.128 3.25 5.155 4.557.72.311 1.282.497 1.722.637.724.23 1.383.197 1.902.12.583-.087 1.789-.73 2.041-1.436.252-.706.252-1.313.176-1.436-.075-.124-.276-.197-.579-.35z"/>
                                </svg>
                                Establish WhatsApp Uplink
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </x-ui.container>
    </section>
</x-layouts.app>