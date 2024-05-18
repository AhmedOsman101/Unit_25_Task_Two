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
                        <x-text-input class="w-full lowercase" placeholder="Descripe your problem" name="description"
                            wire:model="description" />
                        @error('description')
                        <x-input-error type="text" :messages="$message" class="mt-2 bg-gray-900 border-none" />
                        @enderror

                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div id="individual-selection" class="flex flex-col gap-y-3">
                        <div class="flex items-center transition-colors duration-500">
                            <span class="mr-2">price:</span>
                            <span class="mr-3 text-emerald-400">${{$service->price}}</span>
                        </div>
                        <button type="button" wire:click="createNewRequest"
                            class="transition-colors duration-500 flex w-fit text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
