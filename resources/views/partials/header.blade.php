<header class="border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-serif font-bold tracking-wide">
            Mahesa Partnership
        </a>

        <nav class="space-x-8 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-gray-600">Home</a>
            <a href="{{ route('about') }}" class="hover:text-gray-600">About</a>
            <a href="{{ route('practice.index') }}" class="hover:text-gray-600">Practice Areas</a>
            <a href="{{ route('partners.index') }}" class="hover:text-gray-600">Partners</a>
            <a href="{{ route('contact.show') }}" class="hover:text-gray-600">Contact</a>
        </nav>
    </div>
</header>
