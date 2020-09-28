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



    <template x-for="(item, index, collection) in $wire.questions" :key="index">

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 5px 15px;">
                    <div>
                        <div x-bind:value="item['id']" x-text="item['question']"  @click="show = !show"></div>
                    </div>

                    <div x-show="show">Tab Foo <br/>
                        Tab Foo <br/>
                        Tab Foo <br/>
                    </div>

                </div>
            </div>
        </div>
    </template>

</div>