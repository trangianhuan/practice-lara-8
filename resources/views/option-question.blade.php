<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Question Type') }}
        </div>
        <x-jet-nav-link href="{{ route('options.question.create') }}" :active="request()->routeIs('options.question.create')" class="text-blue-600 border-gray-300 ml-5">
            {{ __('Create') }}
        </x-jet-nav-link>
    </x-slot>


    <livewire:option-question />

</x-app-layout>
