<section class="grid place-items-center max-h-full h-full dark:text-gray-50 dark:bg-gray-900">

    <x-gear-icon />
    
    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-center text-gray-700 dark:text-white mb-4">Comming Soon
    </h1>
    <p class="text-center text-gray-500 dark:text-gray-300 text-lg md:text-xl lg:text-2xl mb-8">We're working hard to
        provide new categories to you. <br> Stay tuned!</p>
    <div class="flex space-x-4">
        <a href="{{route('categories')}}" wire:navigate
            class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded dark:bg-gray-700 dark:hover:bg-gray-600">Refresh</a>
        
    </div>
</section>
