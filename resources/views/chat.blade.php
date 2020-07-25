<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- user-id -->
    <meta name="user-id" content="{{ auth()->user()->id ?? '' }}">

    <meta name="user-name" content="{{ auth()->user()->name ?? '' }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
        .list-group {
            overflow-x:scroll;
            height:300px;
        }
    </style>
</head>
<body>

          <div class="container">
            <div class="row mt-4" id="app">
                <div class="col-4 col-sm-9">
                    <li class="list-group-item active">Chat Room <span class="ml-1 badge badge-warning">@{{ numberOfUsers }}</span>
                    </li>
                    <div class="badge badge-pill badge-primary">@{{ typing }}</div>
                    <ul class="list-group" v-chat-scroll>
                        <message 
                        v-for="value, index in chat.message"
                        :key=value.index
                        :color= chat.color[index] 
                        :user = chat.user[index]
                        :time = chat.time[index]>
                        @{{ value }}
                        </message>
                    </ul>
                    <input type="text" class="form-control" placeholder="Type your message here ..."
                        v-model='message' @keyup.enter="send">
                    <a href="" class="btn btn-warning btn-sm mt-3" @click.prevent='deleteSession'>Delete Chats</a>
                </div>


                   
                <div class="col-3" id="online-users">

                    <h2>Online Users</h2>

 <h5 id="no-online-users">No Online Users</h5>


                </div>

            </div>
        </div>


            <script src="{{asset('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-chat-scroll/dist/vue-chat-scroll.min.js"></script>

</body>
</html>