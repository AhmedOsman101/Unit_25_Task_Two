<div class="max-w-2xl mx-auto mt-5 flex flex-col items-center relative" style="align-self: normal">

    @php
    $url = "/" . $type . "/" . "$item->id";
    @endphp
    <div class="bg-gray-800 shadow-md border border-gray-700 rounded-lg max-w-sm">
        <a wire:navigate :href="$url">
            <img class="rounded-t-lg" src="{{asset('images/service.png')}}" :alt="$type">
        </a>
        <div class="p-5">
            <a wire:navigate :href="$url">
                <h5 class="text-white font-bold text-2xl tracking-tight mb-2">{{$item->name}}
                </h5>
            </a>
            @isset($item->description)
            <p class="font-normal text-gray-400 mb-3">
                @php
                $limit = 80;
                $string = $item->description;
                echo (strlen($string) > $limit) ? substr($string, 0, $limit) . '...' : $string . str_repeat("&nbsp;",
                ($limit - strlen($string)+1));
                @endphp
            </p>
            @endisset
            <a wire:navigate href="{{$url}}"
                class="transition-colors duration-500 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-500 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center">
                Show more...
                <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</div>
