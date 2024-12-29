@extends('layouts.app')

@section('content')
<style type="text/css">
.job-list-banner {
    height: 200px;
    border-radius: 20px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-bottom: 20px;
    padding: 20px;
}



/*  banner 2 */
.job-list-banner-2 {
    height: 300px;
    border-radius: 20px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin-top: 20px;
    margin-bottom: 200px;
}
.chats-header-sec{
    padding: 15px 0;
    width: 100%;
}

.chats-header-sec h5{
    font-weight: 600;
}
.chats-header-sec h2{
    font-weight: 600;
    font-size: 80px;
}
.chats-header-sec h2 a{
    font-weight: 600;
    color: #00B0FF;
}

/* inbox */

.chats-inbox{
    background-color: #E8F1F5;
    border-radius: 20px;
    padding: 10px 0;
}
.chats-header{
    padding: 5px 20px;
}
.chats-individual{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 5px 20px;
    border-radius: 5px;
    margin: 4px 0;
}
.avatar-name{
    width: 20%;
    display: flex;
    align-items: center;
}
.avatar-name img{
    height: 55px;
    width: 55px;
    border-radius: 50%;
}
.avatar-name p{
    margin: 0;
    margin-left: 20px;
    font-size: 18px;
    font-weight: 500;
}
.chats-msg p{
    margin: 0;
    font-size: 18px;
}
.read-more{
    font-size: 16px;
    color: #009688;
}

/* live inbox  */
.live-inbox-main{
    background-color: #E8F1F5;
    padding: 25px 20px;
    width: 100%;
    border-radius: 20px;
    margin: 40px 0 0 0;
}

.live-inbox-details{
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* width: 30%; */
    padding: 20px 0;
}
.live-inbox-avatar{
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.live-inbox-avatar img{
    width: 55px;
    height: 55px;
    border-radius: 50%;
}
.live-inbox-avatar p{
    margin: 0;
    margin-left: 10px;
    font-size: 18px;
    font-weight: 500;
}
.live-inbox-right{
    display: flex;
    align-items: center;
}
.live-inbox-right p{
    margin-right: 25px;
}
.live-inbox{
    padding: 0px 10px;
    width: 80%;
    font-size: 18px;
}
.live-reply{
    display: flex;
    align-items: center;
    justify-content: right;
    text-align: right;
}
.live-reply img{
    width: 55px;
    height: 55px;
    border-radius: 50%;
    margin-right: 10px;
}
.live-reply p{
    margin: 0;
    font-weight: 400;
    font-size: 20px;
}
.live-msg-input{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #f8f8f8;
    border-radius: 30px;
    /* padding: 15px 25px; */
    padding-left: 25px;
    margin-top: 40px;
    margin-bottom: 20px;
}
.live-msg-input input{
    background-color: #f8f8f8;
    border: none;
    outline: none;
}
.live-input-icon-btn{
    display: flex;
    align-items: center;
}
.live-msg-icon{
    margin-right: 20px;
}
.live-msg-icon a{
    font-size: 25px;
    color: #000;
    padding: 0 5px;
    margin: 0 5px;
}
.live-reply-btn{
    width: 120px;
    padding: 15px 15px;
    text-align: center;
    border: none;
    font-size: 20px;
    font-weight: 500;
    border-radius: 30px;
    background-color: #E50F25;
    color: #fff;
}


@media screen and (max-width: 767px) {
    .chats-header-sec h2 {
        font-size: 30px;
    }
    .chats-individual{
        display: block;
        padding: 5px 10px;
        margin: 10px 0;
    }
    .avatar-name{
        width: auto;
    }
    .chats-msg {
        padding: 6px 0;
    }
    .live-inbox-main{
        padding: 25px 10px;
    }
    .live-msg-input{
        padding-left: 10px;
    }
    .live-msg-icon{
        margin-right: 5px;
        display: flex;
    }
    .live-reply-btn{
        width: auto;
        padding: 15px 10px;
        font-size: unset;
    }
    .live-msg-icon a{
        font-size: 18px;
        padding: 0;
    }
    .msg-input {
        width: 40%;
    }
}
.marquee-area{
    margin-bottom: 20px;
    border-radius: 26px;
}
</style>

<div class="container-fluid px-md-5">
    <div class="marquee-area">
        <ul>
            <li style="min-width: 150px;"><span>Page Feature:</span></li>
            <li><p><marquee behavior="" direction=""> Keeps members informed about relevant events and opportunities.</marquee></p></li>
        </ul>
    </div>

    <!-- chats banner -->
    <div style="background-image: url('{{ asset("assets/img/job-list-banner.png") }}');" class="job-list-banner"></div>


    <!-- chats starts here  -->
    <div>
        <div class="chats-header-sec">
            <h5>Fax to Email</h5>
            <h2>FAX <a href="tel:+41225120001">+41 22 512 00 01</a></h2>
        </div>
        <div class="chatsInner"></div>
    </div>

    <!-- inbox section  -->
    <div class="chats-inbox">
        <div class="chats-header">
            <h5>Inbox</h5>
        </div>
        <div class="chats-main">
            <div class="chats-individual bg-body">
                <div class="avatar-name">
                    <img src="{{ asset("assets/img/chats-avatar-1.png") }}" alt="">
                    <p>Patient 1</p>
                </div>
                <div class="chats-msg">
                    <p>Hello sir can we have a meeting in the next Friday..</p>
                </div>
                <a href="#"><div class="read-more">Read more <i class="fa-solid fa-chevron-down"></i></div></a>
            </div>
            <div class="chats-individual">
                <div class="avatar-name">
                    <img src="{{ asset("assets/img/chats-avatar-2.png") }}" alt="">
                    <p>Patient 2</p>
                </div>
                <div class="chats-msg">
                    <p>Hello sir can we have a meeting in the next Friday..</p>
                </div>
                <a href="#"><div class="read-more">Read more <i class="fa-solid fa-chevron-down"></i></div></a>
            </div>
            <div class="chats-individual bg-body">
                <div class="avatar-name">
                    <img src="{{ asset("assets/img/chats-avatar-1.png") }}" alt="">
                    <p>Patient 3</p>
                </div>
                <div class="chats-msg">
                    <p>Hello sir can we have a meeting in the next Friday..</p>
                </div>
                <a href="#"><div class="read-more">Read more <i class="fa-solid fa-chevron-down"></i></div></a>
            </div>
            <div class="chats-individual">
                <div class="avatar-name">
                    <img src="{{ asset("assets/img/chats-avatar-2.png") }}" alt="">
                    <p>Patient 4</p>
                </div>
                <div class="chats-msg">
                    <p>Hello sir can we have a meeting in the next Friday..</p>
                </div>
                <a href="#"><div class="read-more">Read more <i class="fa-solid fa-chevron-down"></i></div></a>
            </div>
            <div class="chats-individual bg-body">
                <div class="avatar-name">
                    <img src="{{ asset("assets/img/chats-avatar-1.png") }}" alt="">
                    <p>Patient 5</p>
                </div>
                <div class="chats-msg">
                    <p>Hello sir can we have a meeting in the next Friday..</p>
                </div>
                <a href="#"><div class="read-more">Read more <i class="fa-solid fa-chevron-down"></i></div></a>
            </div>
            <div class="chats-individual">
                <div class="avatar-name">
                    <img src="{{ asset("assets/img/chats-avatar-1.png") }}" alt="">
                    <p>Patient 6</p>
                </div>
                <div class="chats-msg">
                    <p>Hello sir can we have a meeting in the next Friday..</p>
                </div>
                <a href="#"><div class="read-more">Read more <i class="fa-solid fa-chevron-down"></i></div></a>
            </div>
        </div>
    </div>
    <!-- inbox section  -->

    <!-- live inbox -->
    <div class="live-inbox-main">
        <h5>Inbox</h5>
        <div class="live-inbox-details">
            <div class="live-inbox-avatar">
                <img src="{{ asset("assets/img/chats-avatar-1.png") }}" alt="">
                <p>Patient 1</p>
            </div>
            <div class="live-inbox-right">
                <p>6 July 2024 <br> <span>6:56 AM</span></p>
                <div>
                    <a href="#" style="text-align: right; float: right;" data-bs-toggle="dropdown" aria-expanded="false"><span class="contact-three-dot">...</span></a>
                    <div class="dropdown-new">
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                                Make Best
                            </a>
                            <a class="dropdown-item" href="#">
                                Block
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <p class="live-inbox">
            "Dear Dr. [Doctor's Name], I hope you are well. I wanted to confirm the details of my next appointment with you. Could you kindly let me know the date and time? Thank you in advance. Looking forward to your response."
        </p>
        <div class="live-reply">
            <img src="{{ asset("assets/img/chats-avatar-3.png") }}" alt="">
            <p>Ok Sure Be There On Time</p>
        </div>
        <div class="live-msg-input">
            <div class="msg-input"><input type="text" placeholder="Typing....."></div>
            <div class="live-input-icon-btn">
                <div class="live-msg-icon">
                    <a href="#"><i class="fa-solid fa-download"></i></a>
                    <a href="#"><i class="fa-regular fa-face-smile"></i></a>
                    <a href="#"><i class="fa-solid fa-link"></i></a>
                </div>
                <button class="live-reply-btn">Send <i class="fa-solid fa-angles-right"></i></button>
            </div>
        </div>
    </div>
    <!-- live inbox -->

    <!-- chats ends here  -->


    <!-- chats banner 2 -->
    <div  class="job-list-banner-2" style="background-image: url('{{ asset("assets/img/job-list-banner-2.png") }}');"></div>


</div>
@endsection


@section('scripts')


@endsection
