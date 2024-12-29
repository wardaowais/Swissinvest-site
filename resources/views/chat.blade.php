@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <div class="my-dashboard">
        <div class="row">
            <div class="col-12">
                <!-- chat main -->
                <div class="chat-main">
                    <div class="row gx-0">
                        <div class="col-lg-9">
                            <!-- main -->
                            <main>
                                <header>
                                    @if(isset($chatuser) && $chatuser->profile_pic)
                                        <img src="{{ asset('images/users/' . $chatuser->profile_pic) }}" alt="" class="profile-pic">
                                    @else
                                        <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="" class="profile-pic">
                                    @endif
                                    <div>
                                        <h2>{{ isset($chatuser) ? $chatuser->first_name : '' }}</h2>
                                        <h3>
                                            <span class="status {{ isset($chatuser) ? ($chatuser->is_online ? 'green' : 'orange') : '' }}"></span>
                                            {{ isset($chatuser) ? ($chatuser->is_online ? 'online' : 'offline') : '' }}
                                        </h3>
                                    </div>
                                </header>
                                <!-- chat box -->
                                <div class="chat-box">
                                    <ul id="chat">
                                        @if(isset($chatHistory))
                                            @foreach($chatHistory as $message)
                                                @php
                                                    $contact = $message->sender_id == $user->id ? $message->receiver : $message->sender;
                                                @endphp
                                                @if($message->sender_id == $user->id)
                                                    <li class="me">
                                                        <div class="entete">
                                                            <h3>{{ $message->created_at->format('h:i A, M d') }}</h3>
                                                            <h2>{{ $user->first_name }}</h2>
                                                            <span class="status blue"></span>
                                                        </div>
                                                        <div class="message">
                                                            {{ $message->message }}
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="you">
                                                        <div class="entete">
                                                            <span class="status green"></span>
                                                            <h2>{{ $contact->first_name }}</h2>
                                                            <h3>{{ $message->created_at->format('h:i A, M d') }}</h3>
                                                        </div>
                                                        <div class="message">
                                                            {{ $message->message }}
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <!-- end chat box -->
                                <!-- chat footer -->
                                <div class="chat-footer">
                                    <form id="message-form" action="{{ route('send.message', ['feature' => 'chat']) }}" method="POST">
                                        @csrf
                                        <textarea name="message" id="message-input" placeholder="Type your message"></textarea>
                                        @if(isset($chatuser))
                                            <input type="hidden" name="receiver_id" id="receiver-id" value="{{ encrypt($chatuser->id) }}">
                                        @endif
                                        <div class="file_input">
                                            <input type="file" name="file-input" id="file-input" class="file-input__input"/>
                                            <label class="file-input__label" for="file-input" title="Upload Image">
                                                <span><i class="fa-solid fa-paperclip"></i></span>
                                            </label>
                                        </div>
                                        <button type="submit" id="send-button" disabled>{{translate('Send')}}</button>
                                    </form>
                                </div>
                                <!-- end chat-footer -->
                            </main>
                            <!-- end main -->
                        </div>
                        <div class="col-lg-3">
                            <!-- aside -->
                            <aside>
                                <header>
                                    <!-- search bar -->
                                    <form action="#">
                                        <span><i class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="text" placeholder="search">
                                    </form>
                                    <!-- end search bar -->
                                </header>
                                <ul id="chat-sidelist">
                                    @foreach($messages as $message)
                                        @php
                                            $contact = $message->sender_id == $user->id ? $message->receiver : $message->sender;
                                        @endphp
                                        <li>
                                            <a href="{{ route('match.details', ['userId' => encrypt($contact->id), 'feature' => 'chat']) }}">
                                                @if(isset($contact) &&  $contact->profile_pic)
                                                    <img src="{{ asset('images/users/' . $contact->profile_pic) }}" alt="" class="profile-pic">
                                                @else
                                                    <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="" class="profile-pic">
                                                @endif

                                                <div class="content-history">
                                                    <h2>{{ $contact->first_name }}</h2>
                                                    <p id="last-message-of-{{ $contact->id }}">{{ $message->message }}</p>
                                                    <h3>
                                                        <span class="status {{ $contact->is_online ? 'green' : 'orange' }}"></span>
                                                        {{ $contact->is_online ? 'online' : 'offline' }}
                                                    </h3>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <!-- end aside -->
                        </div>
                    </div>
                </div>
                <!-- end chat main -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.onChatPage = true;
        @isset($chatuser)
        $(document).ready(function () {
            let processing = false;
            const sendButton = $('#send-button');
            const sendButtonHtml = sendButton.html();
            sendButton.removeAttr('disabled');
            $('#message-form').submit(function (event) {
                event.preventDefault();
                sendButton.attr('disabled', 'disabled');
                sendButton.html('...')
                const data = new FormData(event.target);
                fetch(event.target.action, {
                    method: "POST",
                    body: data
                })
                    .then(respponse => {
                        if (respponse.ok) {
                            $('#chat').append(
                                `<li class="me"><div class="entete"><h3>${new Date().toLocaleTimeString()} </h3> <h2>{{ $user->first_name }}</h2><span class="status blue"></span></div><div class="message">${data.get('message')}</div></li>`
                            )
                            $('#last-message-of-{{ $chatuser->id }}').text(data.get('message').toString().substring(0, 50));
                            event.target.reset();
                        }
                    }).catch(error => {
                    console.log(error)
                    alert('Unable to send message')
                }).finally(() => {
                    sendButton.html(sendButtonHtml);
                    sendButton.removeAttr('disabled');
                })
            });

            var channel = Echo.private('chat-message.{{ auth()->user()->user->id }}');
            channel.listen('ChatMessage', function(data) {
                $('#chat').append(
                    `<li class="you"><div class="entete"><span class="status green"></span><h2>{{ $chatuser->first_name }} </h2> <h3>${new Date(data.created_at).toLocaleTimeString()}</h3></div><div class="message">${data.message}</div></li>`
                )
                const preview = $('#last-message-of-{{ $chatuser->id }}');
                if (preview.length) {
                    preview.text(data.message.toString().substring(0, 50));
                } else {
                    const url = '{{ route('match.details', ['userId' => ':id:', 'feature' => ':feature:']) }}'; // Updated URL
                    $('#chat-sidelist').append(
                        `<li><a href="${url.replace(':id:', data.sender_id)}"><img src="${data.sender_profile_pic}" alt="" class="profile-pic"><div class="content-history"><h2>${data.sender_name}</h2><p id="last-message-of-${data.sender_id}">${data.message.toString().substring(0, 50)}</p><h3><span class="status green"></span>online</h3></div></a></li>`
                    );
                }
            });
        });
        @endif
    </script>
@endsection
