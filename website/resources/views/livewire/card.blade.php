<div>
    @php
    $url = "/$type/$item->id";

    $limit = 78;
    $string = $item->description;
    if (strlen($string) > $limit) $string = substr($string, 0, $limit) . '...';

    $baseClass = "flex flex-col overflow-hidden rounded-xl shadow-md";

    if ($type !== 'categories') $baseClass .= " h-[580px]";
    @endphp
    <div class="{{$baseClass}}">
        <a href="{{$url}}">
            <img src="{{asset('images/service.png')}}" alt="{{$item->name}}" class="object-cover w-full" />
        </a>
        <div class="flex flex-col justify-between flex-1 p-4 bg-white dark:bg-gray-800">
            <div>
                <a href="{{$url}}">
                    <h2 class="text-white font-semibold text-2xl tracking-tight mb-2 ">{{$item->name}}</h2>
                </a>
                <p class="text-gray-500 dark:text-gray-400">
                    {{$string}}
                </p>
            </div>
            <div class="flex justify-start">
                {{-- in case that the category doesn't have any registered services --}}
                @if (isset($item->services_count) && $item->services_count === 0)
                <button class="cardBtn mt-2 disabled:bg-gray-800 disabled:border disabled:cursor-not-allowed" disabled>
                    comming soon 😊
                </button>
                @else
                <a class="cardBtn mt-2" href="{{$url}}">
                    Show more...
                    <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                </a>
                @endif

            </div>
        </div>
    </div>
</div>
