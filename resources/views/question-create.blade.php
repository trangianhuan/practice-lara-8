<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }} / {{ __('Create') }}
        </h2>
    </x-slot>


    <livewire:form-question />

</x-app-layout>
