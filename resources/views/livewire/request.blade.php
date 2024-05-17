<tr>
    <td class="p-4 border-b border-blue-gray-50">
        <div class="flex items-center gap-3">
            <div class="flex flex-col">
                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                    {{$request->description}}</p>

            </div>
        </div>
    </td>
    <td class="p-4 border-b border-blue-gray-50">
        <div class="flex items-center gap-3">

            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                {{$request->service->name}}</p>

        </div>
        </div>
    </td>
    <td class="p-4 border-b border-blue-gray-50">
        <div class="flex flex-col">
            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                {{$request->service->category->name}} </p>

        </div>
    </td>
    <td class="p-4 border-b border-blue-gray-50">
        @switch($status)
        @case('completed')
        <x-completed-state />
        @break
        @case('cancelled')
        <x-cancelled-state />
        @break
        @default
        <x-pending-state />
        @endswitch
    </td>
    <td class="p-4 border-b border-blue-gray-50">
        <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
            $ {{$request->service->price}}</p>
    </td>
    <td class="p-2 border-b border-blue-gray-50">
        <a href="{{ route('request.edit', $request->id) }}"
            class="inline-block relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[40px] h-8 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30"
            type="button">
            <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                <x-edit-icon />
            </span>
        </a>
        <form class="inline-block" action="{{ route('request.delete', $request->id) }}" method="post">
            <button type="submit"
                class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30">
                <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                    <x-trash-icon />
                </span>
            </button>

            @method('DELETE')

            @csrf

        </form>
    </td>
</tr>
