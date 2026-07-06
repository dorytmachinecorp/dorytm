<x-layouts.app title="Page Not Found">
    <section class="min-h-screen bg-steel-50 flex items-center justify-center pt-20">
        <div class="text-center px-4">
            <h1 class="text-9xl font-bold text-steel-200 mb-4">404</h1>
            <h2 class="text-3xl font-bold text-steel-900 mb-6">Page Not Found</h2>
            <p class="text-lg text-steel-600 mb-8 max-w-md mx-auto">The machinery or technical document you are looking for has been moved or no longer exists.</p>
            <a href="{{ route('home') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-8 transition-colors uppercase tracking-wider">
                Return to Homepage
            </a>
        </div>
    </section>
</x-layouts.app>