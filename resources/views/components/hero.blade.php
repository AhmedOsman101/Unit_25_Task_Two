<section {{ $attributes->merge(['class' => 'flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row
    lg:justify-between text-white']) }}>
    <div class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
        <img src="https://mambaui.com/assets/svg/Business_SVG.svg"
            alt="online asset need internet connection to appeaer"
            class="object-contain h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
    </div>
    <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
        <h1 class="text-5xl font-bold leading-none sm:text-4xl">Your Trusted Partner in IT Excellence
            <a href="{{route('home')}}" class="dark:text-blue-400">{{env('app_name')}}</a> for IT support
        </h1>
        <p class="mt-6 mb-8 text-lg sm:mb-12">Dictum aliquam porta in condimentum ac integer
            <br class="hidden md:inline lg:hidden">turpis pulvinar, est scelerisque ligula sem
        </p>
        <div
            class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
            <a rel="noopener noreferrer" href="#"
                class="px-8 py-3 text-lg font-semibold rounded dark:bg-blue-400 dark:text-gray-900">Suspendisse</a>
            <a rel="noopener noreferrer" href="#"
                class="px-8 py-3 text-lg font-semibold border rounded dark:border-gray-100">Malesuada</a>
        </div>
    </div>
</section>
