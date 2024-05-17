<!-- component -->
<section class="text-white body-font overflow-hidden bg-gray-900">
    <div class="container px-5 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-800"
                src="{{asset('images/service.png')}}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h1 class="text-white text-3xl title-font font-medium mb-1">{{$service->name}}</h1>
                <p class="leading-relaxed">{{$service->description}}</p>
                <div class="flex flex-col gap-3 mt-6 justify-center pb-5 border-b-2 border-gray-800 mb-5">
                    <div class="flex items-center">
                        <span class="mr-3">Book your service now</span>
                    </div>
                    <div class="relative">
                        <x-text-input placeholder="Descripe your problem" wire:model="description" />
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div id="individual-selection" class="flex">
                        <button wire:click="createNewRequest()"
                            class="flex text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
