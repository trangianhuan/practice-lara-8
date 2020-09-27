<div>
    <div x-data="">
        <select name="cars" id="cars" @change="$wire.fnChange($event.target.value)">
            <template x-for="(type, index) in $wire.types" :key="index">
                <option x-bind:value="type['type']" x-text="type['name']"></option>
            </template>
        </select>

        <div>
            <template x-for="(item, index, collection) in $wire.questions" :key="index">
                <div x-bind:value="item['id']" x-text="item['question']"></div>
            </template>
        </div>

    </div>
</div>
