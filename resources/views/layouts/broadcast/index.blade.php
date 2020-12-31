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
        Echo.channel('channel-push')
            .listen('TestPushEvent', (e) => {
                alert(112);
                console.log(e);
            })

        Echo.private(`channel-private`)
            .listen('TestPrivatePush', (e) => {
                console.log('push private ne');
                alert('pushed');
            })

        Echo.channel('notitest')
            .notification((notification) => {
                console.log(notification.type);
            });
    </script>
@endsection
