<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question Type') }} / {{ __('Create') }}
        </h2>
    </x-slot>


    <livewire:form-option :optionId="$id" />

</x-app-layout>
