@extends('layouts.app')

@section('content')


{{--
<chat :user="{{auth()->user()}}" :group_id="{{$group_id}}">

</chat>--}}
<div style="overflow-scrolling: auto">
@if($messages!=null)
    @foreach($messages as $message)
        <li>
            {{ \App\Models\User::find($message->user_id)->name }} - {{$message->message}}
        </li>
    @endforeach
@endif



    <form method="post" action="message">
        @csrf
        @method('POST')
        <input type="text" id="message" name="message" class="form-control" style="width: 65%">
    </form>
</div>

@endsection


@section('scripts')
{{--

        /*const app = new Vue({
        el: '#app',
        mounted() {
            window.addEventListener('keyup', function (event) {
                if (event.key === 'Enter') {
                    //ChatComponent.methods.sendMessage();
                }
            });
            listen();
        },

            methods:{
                listen(){
                    console.log('I am listening');
                    console.log('/groups/'+this.group_id+'/chat');
                    Echo.channel('/groups/'+this.group_id+'/chat')
                        .listen('MessageSent' ,(message)=>{
                            this.messages.push(message);
                        })
                },

            }
        });*/



        /*
        Echo.private('chat')
        .listen('MessageSent', (e) => {
        this.messages.push({
        message: e.message.message,
        user: e.user
        });
        });


    --}}

@endsection
