<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Questions') }}
        </div>
        <x-jet-nav-link href="{{ route('question.create') }}" :active="request()->routeIs('question.create')" class="text-blue-600 border-gray-300 ml-5">
            {{ __('Create') }}
        </x-jet-nav-link>
    </x-slot>


    <livewire:ctf-question />

</x-app-layout>
