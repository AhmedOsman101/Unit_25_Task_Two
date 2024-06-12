<div
        class="relative top-1/2 left-1/2 -translate-x-1/2 translate-y-1/2 h-full w-[50%] flex flex-col transition-all bg-white rounded-lg shadow-xl dark:bg-gray-800 sm:p-6 sm:align-middle">
    <h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">
        Modify your request
    </h3>
    <p class="mt-1 mb-3 text-sm text-red-700 dark:text-red-700">
        be cautious you cannot undo this action
    </p>

    <label for="emails-list" class="text-sm text-gray-700 dark:text-gray-200">
        Describe Your problem
    </label>

    <x-custom-input-label class="block mt-3" for="description">
        <input type="text" wire:model='description' name="description" id="description" placeholder="let us help you..."
               :value="$request->description"
               class="block w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"/>
        @error('description')
        <x-input-error type="text" :messages="$message" class="mt-2 bg-gray-900 border-none"/>
        @enderror
    </x-custom-input-label>

    <div class="mt-4 sm:flex sm:items-center sm:-mx-2">
        <button wire:click='back' type="button"
                class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
            Cancel
        </button>

        <button type="button" wire:click='update'
                class="w-full px-4 py-2 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
            Submit
        </button>
    </div>

</div>
