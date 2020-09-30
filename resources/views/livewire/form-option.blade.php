<div>
    {{-- Success is as dangerous as failure. --}}
  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 5px 15px;">

        <form wire:submit.prevent="submit" method="POST">
          <div class="rounded-md shadow-sm">
            <div class="w-2/4 mt-6">label 1</div>
            <div>
              <input wire:model="value" name="value" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Value">
            </div>
            @error('value') <span class="text-danger">{{ $message }}</span> @enderror
          </div>

          <div class="inline-block py-6">
            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Create
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
