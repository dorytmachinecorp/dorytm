<x-layouts.app title="Server Error">
    <section class="min-h-screen bg-steel-50 flex items-center justify-center pt-20">
        <div class="text-center px-4">
            <h1 class="text-9xl font-bold text-steel-200 mb-4">500</h1>
            <h2 class="text-3xl font-bold text-steel-900 mb-6">Internal Server Error</h2>
            <p class="text-lg text-steel-600 mb-8 max-w-md mx-auto">Our systems are currently experiencing an issue. Please try again later or contact our technical support team.</p>
            <a href="{{ route('home') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-8 transition-colors uppercase tracking-wider">
                Return to Homepage
            </a>
        </div>
    </section>
</x-layouts.app>