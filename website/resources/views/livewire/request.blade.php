<tr>
    <td class="p-4 border-b border-blue-gray-50 ">
        <div class="flex items-center gap-3">
            <div class="flex flex-col">
                <a wire:navigate href="{{'/service/'.$request->service->id}}"
                    class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                    {{$request->service->name}}</a>
            </div>
        </div>
    </td>
    <td class="p-4 border-b border-blue-gray-50">
        <div class="flex items-center gap-3">

            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                {{$request->description}}</p>

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
    <td class="p-2 border-b border-blue-gray-50 ">
        {{-- if pending, show edit button --}}
        @if ($request->status == 'pending')
        <a wire:navigate href="{{ route('request.edit', $request->id) }}"
            class="inline-block relative align-middle select-none font-sans font-medium  uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[40px] h-8 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30"
            type="button">
            <span class="pl-7 absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                <x-edit-icon />
            </span>
        </a>
        @endif
        {{-- if not completed show form with: --}}
        @unless ($request->status == 'completed')
        <form class="inline-block max-w-fit w-fit" action="{{ route('request.cancel', $request->id) }}" method="post">
            <button type="submit"
                class="relative align-middle select-none font-sans font-medium  uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30">
                {{-- if cancelled show restore --}}
                @if ($request->status == "cancelled")
                <span
                    class="pl-7 absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 text-emerald-500">
                    <x-restore-icon />
                </span>
                {{-- if pending show cancel --}}
                @else
                <span class="pl-2 absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 text-[#cb3434]">
                    <x-cancel-icon />
                </span>
                @endif
            </button>

            @method('PATCH')

            @csrf

        </form>
        @endunless
        {{-- if not pending show delete --}}
        @unless ($request->status == 'pending')
        <form class="inline-block max-w-fit w-fit" action="{{ route('request.delete', $request->id) }}" method="post">
            <button type="submit"
                class="relative align-middle select-none font-sans font-medium  uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30">
                <span class="pl-2 absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 text-[#cb3434]">
                    <x-trash-icon />
                </span>
            </button>

            @method('DELETE')

            @csrf

        </form>
        @endunless
    </td>
</tr>
