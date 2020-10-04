<div>
    {{-- Success is as dangerous as failure. --}}
  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 5px 15px;">


        <form id="form-option" wire:submit.prevent="submit" method="POST">
          <input type="hidden" name="remember" value="true">
          <div class="rounded-md shadow-sm">
            <div class="w-2/4">Short title</div>
            <div>
              <input wire:model.defer="title" name="title" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Title">
            </div>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="w-2/4 mt-8">Question</div>
            <div class="">
              <textarea wire:model.defer ="question" id="question" name="question"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"></textarea>
            </div>
            @error('question') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="w-2/4">Answer</div>
            <div>
              <input wire:model.defer="answer" name="answer" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Title">
            </div>
            @error('answer') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="w-2/4 mt-8">Question Type</div>
            <div>
              <select name="question_type"
                class="border border-gray-300 rounded-md"
                wire:model.defer="question_type">
                @foreach($types as $type)
                  <option value="{{$type->id}}">{{$type->value}}</option>
                @endforeach
              </select>
            </div>
            @error('question_type') <span class="text-danger">{{ $message }}</span> @enderror
            <div class="w-2/4 mt-8">Point</div>
            <input wire:model.defer="point" name="point" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5" placeholder="Question type">
            @error('point') <span class="text-danger">{{ $message }}</span> @enderror
          </div>

          <div class="mt-6 inline-block py-6" x-data="">
            <div
              @click="$wire.abc(serialize(document.getElementById('form-option')))"
              class="group relative w-full cursor-pointer flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Create
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    var simplemde = new SimpleMDE({ element: document.getElementById("question") });
    simplemde.value("{{htmlspecialchars ($question)}}")
    simplemde.codemirror.on("change", function(param1, param2){
      document.getElementById("question").value = simplemde.value()
    });
</script>
