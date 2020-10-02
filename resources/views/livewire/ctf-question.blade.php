<div x-data="">
    <div class="pt-6" style="width: 240px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 5px 15px;">

                <div>
                        <select style="width: 150px" name="cars" id="cars" @change="$wire.fnChange($event.target.value)">
                            <template x-for="(type, index, collection) in $wire.types" :key="index">
                                <option x-bind:value="type['question_type']" x-text="type['option']['value']"></option>
                            </template>
                        </select>

                </div>

            </div>
        </div>
    </div>

<div x-data="{ questions: @entangle('questions')}">

    @foreach($questions as $question)
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 5px 15px;">
                    <div class="cursor-pointer" :data-key="{{$question['id']}}" @click="toogleShowQuest()" >{{ $question['title'] }}</div>
                    <div style="display: none;" id="{{ 'quest-cont-' . $question['id'] }}" wire:ignore>
                        <div>{!! $question['question'] !!}</div>
                        <div class="flex">
                            <input
                                id="{{ 'answer-' . $question['id'] }}"
                                class="flex-1 appearance-none rounded-none relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                                name="answer"
                                type="text"
                                required
                                placeholder="Enter answer for puzzle">

                            <div
                                x-on:click="$wire.submitQuest(document.getElementById('{{'answer-' . $question['id']}}').value, {{$question['id']}})"
                                class="cursor-pointer flex justify-center items-center rounded-md border border-gray-300 w-48 bg-gray-100 ml-3">
                                Submit
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>

<script >


    window.addEventListener('submitQuest', event => {
        console.log(event.detail)
    })

    function toogleShowQuest(){
        let id = this.event.target.getAttribute('data-key')
        let currentStyleDisplay = document.getElementById('quest-cont-' + id).style.display
        if(currentStyleDisplay && currentStyleDisplay == 'none'){
            document.getElementById('quest-cont-' + id).style.display = 'block';
        } else {
            document.getElementById('quest-cont-' + id).style.display = 'none';
        }
    }

    function markedQuest(text){
        if (text) {
            return marked(text).replace(/(?:\r\n|\r|\n)/g, '<br>');
        }
        return ''
    }

</script>
