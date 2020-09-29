<div x-data="">
    <div class="pt-6" style="width: 240px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 5px 15px;">

                <div>
                        <select style="width: 150px" name="cars" id="cars" @change="$wire.fnChange($event.target.value)">
                            <template x-for="(type, index) in $wire.types" :key="index">
                                <option x-bind:value="type['type']" x-text="type['name']"></option>
                            </template>
                        </select>

                </div>

            </div>
        </div>
    </div>

<div x-data="{ questions: @entangle('questions'), show: false, count:1 }">
    <template x-for="(quest, key, collection) in Object.values(@entangle('questions'))" :key="key">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 5px 15px;">

                        <button @click="init2()">aaaaa</button>
                        <div x-text="count"></div>
                        <div x-show="show==true">
                            Tab Foo <br/>
                            Tab Foo <br/>
                            Tab Foo <br/>
                        </div>

                        <button @click="count++">ccc</button>

                </div>
            </div>
        </div>
    </template>
</div>

</div>

<script >
    function init2(){
        console.log('collection', this)
    }
</script>
