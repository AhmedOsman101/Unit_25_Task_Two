<section {{ $attributes->merge(['class' => 'flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row
    lg:justify-between text-white']) }}>
    <div class="flex items-center justify-center p-6 pl-20 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">

        <img src="{{asset('images/Business_SVG.svg')}}""
            alt=" online assets need internet connection to appeaer"
            class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
    </div>
    <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
        <h1 class="text-5xl font-bold leading-none sm:text-4xl">For Reliable and Expert IT Support, <a wire:navigate
                href="{{route('home')}}" class="dark:text-blue-400">{{env('app_name')}}</a> is Always Here for You.

        </h1>
        <p class="mt-6 mb-8 text-lg sm:mb-12">Trust Dern-Support to Elevate Your
            <br class="hidden md:inline lg:hidden"> IT Infrastructure and Business Efficiency.
        </p>
        <div
            class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
            <a wire:navigate rel="noopener noreferrer" href="{{route('services')}}"
                class="px-8 py-3 text-lg font-semibold rounded dark:bg-blue-400 hover:dark:bg-blue-300 transition-colors duration-500  dark:text-gray-900">get
                started</a>
            <a wire:navigate rel="noopener noreferrer" href="{{route('services')}}"
                class="px-8 py-3 text-lg font-semibold border rounded dark:border-gray-100">view our offers</a>
        </div>
    </div>
</section>
