<div x-data="">
    <div class="py-8" style="width: 240px">
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
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 5px 15px;" >
                    <div style="padding: 4px 0;" class="clicktitle cursor-pointer" data-key="{{$question['id']}}" >
                        {{ $question['title'] }}
                        @if(!$question['showQuestion'])
                            <img src="https://trangianhuan.github.io/icon/countrys-flags/svg/vietnam.svg" class="inline-block" width="20" height="20">
                        @endif
                    </div>

                    <div style="display: none;" class="py-4" id="{{ 'quest-cont-' . $question['id'] }}" wire:ignore>
                        <div>{!! $question['question'] !!}</div>
                        @if($question['showQuestion'])
                        <div class="flex py-4">
                            <input
                                id="{{ 'answer-' . $question['id'] }}"
                                class="flex-1 appearance-none rounded-none relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                                name="answer"
                                type="text"
                                required
                                placeholder="Enter answer for puzzle">
                            <div
                                x-on:click.debounce.1000ms="$wire.submitQuest(document.getElementById('{{'answer-' . $question['id']}}').value, {{$question['id']}})"
                                class="cursor-pointer flex justify-center items-center rounded-md border border-gray-300 w-48 bg-gray-100 ml-3">
                                Submit
                            </div>
                        </div>
                        <span class="text-red-500" id="{{'answer-mess-' . $question['id']}}"></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>

<script >


    window.addEventListener('submitQuest', event => {
        if (event.detail.code) {
            document.getElementById(event.detail.messageID).style.color = '#48BB78'
        } else {
            document.getElementById(event.detail.messageID).style.color = '#F56565'
        }
        document.getElementById(event.detail.messageID).innerText = event.detail.message
        setTimeout(function(){
            document.getElementById(event.detail.messageID).innerText = ''
        }, 3000);
    })

    document.addEventListener('click', function (event) {
        // If the clicked element doesn't have the right selector, bail
        if (!event.target.matches('.clicktitle')) return;

        // Don't follow the link
        event.preventDefault();
        let id = event.target.getAttribute('data-key')
        let currentStyleDisplay = document.getElementById('quest-cont-' + id).style.display
        if(currentStyleDisplay && currentStyleDisplay == 'none'){
            document.getElementById('quest-cont-' + id).style.display = 'block';
        } else {
            document.getElementById('quest-cont-' + id).style.display = 'none';
        }
    }, false);

</script>
