<style type="text/css">
    .toggle__dot {
      top: -.25rem;
      left: -.25rem;
      transition: all 0.3s ease-in-out;
    }

    input:checked ~ .toggle__dot {
      transform: translateX(100%);
      background-color: #48bb78;
    }
</style>
<div>
  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 5px 15px;">

               <div class="flex items-center w-full mb-24 p-4">
                  <!-- Toggle Button -->
                  <label
                    for="toogleQuestion"
                    class="flex items-center cursor-pointer"
                  >
                    <!-- toggle -->
                    <div class="relative"  x-data="">
                      <!-- input -->
                      <input id="toogleQuestion" type="checkbox" {{$isChecked}} class="hidden" @click="showQuestion()" />
                      <!-- line -->
                      <div
                        class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"
                      ></div>
                      <!-- dot -->
                      <div
                        class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"
                      ></div>
                    </div>
                    <!-- label -->
                    <div class="ml-3 text-gray-700 font-medium">
                      Show question for user
                    </div>
                  </label>

                </div>

      </div>
    </div>
  </div>
</div>
<script>
    window.addEventListener('toogleQuestionResult', event => {
        if (event.detail) {
            document.getElementById('toogleQuestion').checked = document.getElementById('toogleQuestion').checked
        }
    })

    function showQuestion() {
        if (confirm("Are you want change status?")) {
            Livewire.emit('toogleQuestion', document.getElementById('toogleQuestion').checked)
        } else {
            document.getElementById('toogleQuestion').checked = !document.getElementById('toogleQuestion').checked
        }
    }
</script>
