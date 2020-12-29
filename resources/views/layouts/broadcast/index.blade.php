@extends('layouts.master')

@section('bodyContent')
    <div class="col-span-12 mt-6">
        <div class="intro-y block sm:flex items-center h-10">
            <a href="/broadcast/send">Send Event</a>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        window.Echo.channel(`channel-push`)
            .listen('.ExampleEvent', (e) => {
                alert('pushed');
                console.log('push ne');
            })

        window.Echo.private(`channel-private`)
            .listen('TestPrivatePush', (e) => {
                console.log('push private ne');
                alert('pushed');
            })
            .listen('App\\Events\\TestPushEvent', (e) => {
                console.log('push ne');
                alert('pushed');
            })

    </script>
@endsection
