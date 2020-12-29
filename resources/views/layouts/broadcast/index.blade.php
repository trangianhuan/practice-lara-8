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
        Echo.channel(`channel-push`)
            .listen('TestPushEvent', (e) => {
                console.log('push ne');
                alert('pushed');
            })

        Echo.private(`channel-private`)
            .listen('TestPrivatePush', (e) => {
                console.log('push private ne');
                alert('pushed');
            })

        Echo.channel(`laravel_database_channel-push`)
            .listen('TestPushEvent', (e) => {
                console.log('push ne');
                alert('pushed');
            })

    </script>
@endsection
