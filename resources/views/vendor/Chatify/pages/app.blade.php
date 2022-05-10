



@extends('master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-chat.css') }}">
<title>{{ config('chatify.name') }}</title>

{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="id" content="{{ $id }}">
<meta name="type" content="{{ $type }}">
<meta name="messenger-color" content="{{ $messengerColor }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

<style>
    .m-header svg {
    color: #2A4464 !important;
}
.messenger-sendCard button svg {
    color: #2A4464 !important;
}
    .m-body.messages-container.app-scroll {
    background-image: url({{ asset('images/pattern-7.svg') }});
    background-color: #E3E6F1;
}
.lastMessageIndicator {
    color: #2A4464 !important;
}
b {
    background: red !important;
    padding: 1px 6px !important;
    font-size: 10px !important;
}
.m-header-messaging {
    background: #dfe3e700!important;
}
.messenger-listView::-webkit-scrollbar {
    width: 0;
    background: transparent;
}

</style>
@if (auth()->user()->role==2)
    <style>
        .m-body.messages-container.app-scroll {
    background-color: #18223c !important;
}
.messenger-listView {
    background: #272e48 !important;
    border: 1px solid #272e48 !important;
}
.message-card p {
    background: #272e48 !important;
    color: #656b75;
}
.messenger-messagingView {
    border-top: 1px solid #464d5c !important;
    border-bottom: 1px solid #464d5c !important;
    background: #464d5c !important;
}
.messenger-sendCard {
    background: #272e48 !important;
}
    </style>
      @else
      <style>
          .mc-sender p {
    background: #2A4464 !important;
}
 .m-list-active:hover, .m-list-active:focus {
    background:  #2A4464 !important;
}
      .m-body.messages-container.app-scroll {
        background-image: url({{ asset('images/pattern-8.svg') }}); !important;
 }

.vertical-layout.vertical-menu-modern.menu-expanded .footer {
    margin-left: 0 !important;
}
      </style>
@endif
{{-- scripts --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('js/chatify/autosize.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

{{-- styles --}}
<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

{{-- Messenger Color Style--}}
@include('Chatify::layouts.messengerColor')

@endsection
@section('type')
chat-application
@endsection
@section('content')
<div class="app-content content p-5" >
    <div class="messenger mt-2" style="height: 750px;">
        {{-- ----------------------Users/Groups lists side---------------------- --}}
        <div class="messenger-listView">
            {{-- Header and search bar --}}
            <div class="m-header"> 
                <nav>
                    <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                    {{-- header buttons --}}
                    <nav class="m-header-right">
                        <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                        <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                    </nav>
                </nav>
                {{-- Search input --}}
                @if (auth()->user()->role == 0 || auth()->user()->role==1)
                   
                <fieldset class="form-group position-relative has-icon-left mx-75 mb-0">
                    <input type="text" class="form-control round messenger-search" id="chat-search" placeholder="Search">
                    <div class="form-control-position">
                        <i class="bx bx-search-alt text-dark"></i>
                    </div>
                </fieldset>
                @else
                    <style>
                        .messenger-listView .m-body {
                        margin-top: 50px !important;
                    }
                    </style>
                
                    @endif
                {{-- <input type="text" class="form-control round messenger-search" id="chat-search" placeholder="Search" /> --}}
                {{-- Tabs --}}
                {{-- <div class="messenger-listView-tabs">
                    <a href="#" @if($type == 'user') class="active-tab" @endif data-view="users">
                        <span class="far fa-user"></span> People</a>
                    <a href="#" @if($type == 'group') class="active-tab" @endif data-view="groups">
                        <span class="fas fa-users"></span> Groups</a>
                </div> --}}
            </div>
            {{-- tabs and lists --}}
            <div class="m-body contacts-container">
               {{-- Lists [Users/Group] --}}
               {{-- ---------------- [ User Tab ] ---------------- --}}
               <div class="@if($type == 'user') show @endif messenger-tab users-tab app-scroll" data-view="users">
    
                   {{-- Favorites --}}
                   <div class="favorites-section">
                    <p class="messenger-title">Favorites</p>
                    <div class="messenger-favorites app-scroll-thin"></div>
                   </div>
    
                   {{-- Saved Messages --}}
                   {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
    {{-- -------------------- Saved Messages -------------------- --}}


                   {{-- Contact --}}
                   <div class="listOfContacts" style="width: 100%;position: relative;"></div>
        @if (auth()->user()->role==2 || auth()->user()->role==1)
        @php
        $id = \App\Models\ChMessage::join('users',  function ($join) {
            $join->on('ch_messages.from_id', '=', 'users.id')
            ->orOn('ch_messages.to_id', '=', 'users.id');
        })
        ->where(function ($q) {
            $q->where('ch_messages.from_id', Auth::user()->id)
            ->orWhere('ch_messages.to_id', Auth::user()->id);
        })
        ->where('users.id','!=',Auth::user()->id)
        ->select('users.*',DB::raw('MAX(ch_messages.created_at) max_created_at'))
        ->orderBy('max_created_at', 'desc')
        ->groupBy('users.id')
        ->get()->pluck('id');
        if (auth()->user()->role==1) {
            $user1 =        \App\Models\User::where('chat_show_internal',"1","AND")->where('id',"!=",auth()->user()->id);
        }else{
            $user1 =        \App\Models\User::where('show_in_chat',"1","AND")->where('role',"1","AND")->where('id',"!=",auth()->user()->id);
        }
        
        @endphp
        @if ($user1->whereNotIn('id', $id )->count()>0)
            
        @if (auth()->user()->role==1)
        <h1 class="mt-5 ml-1">Admin Contacts</h1>
        @else
        <h1 class="mt-5 ml-1"> Contacts</h1>
        @endif
        @endif
        @foreach ($user1->whereNotIn('id', $id )->get() as $user)
        <table class="messenger-list-item" data-contact="{{ $user->id }}">
            <tr data-action="0">
                {{-- Avatar side --}}
                <td style="position: relative">
                    @if($user->active_status)
                        <span class="activeStatus" style="border-color: white !important;"></span>
                    @endif
                <div class="avatar av-m"
                style="background-image: url('{{ asset($user->avatar) }}');">
                </div>
                </td>
                <td>
                    <p data-id="{{ $user->id }}" data-type="user">
                        {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
                        </p>
                    <span>
                    </td>
            </tr>
        </table>
        @endforeach
        @endif
               </div>
    
               {{-- ---------------- [ Group Tab ] ---------------- --}}
               <div class="@if($type == 'group') show @endif messenger-tab groups-tab app-scroll" data-view="groups">
                    {{-- items --}}
                    <p style="text-align: center;color:grey;margin-top:30px">
                        <a target="_blank" style="color:{{$messengerColor}};" href="https://chatify.munafio.com/notes#groups-feature">Click here</a> for more info!
                    </p>
                 </div>
    
                 {{-- ---------------- [ Search Tab ] ---------------- --}}
               <div class="messenger-tab search-tab app-scroll" data-view="search">
                    {{-- items --}}
                    <p class="messenger-title">Search</p>
                    <div class="search-records">
                        <p class="message-hint center-el"><span>Type to search..</span></p>
                    </div>
                 </div>
            </div>
        </div>
    
        {{-- ----------------------Messaging side---------------------- --}}
        <div class="messenger-messagingView">
            {{-- header title [conversation name] amd buttons --}}
            <div class="m-header m-header-messaging">
                <nav>
                    {{-- header back button, avatar and user name --}}
                    <div style="display: inline-flex;">
                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                        <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                        </div>
                        <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                    </div>
                    {{-- header buttons --}}
                    <nav class="m-header-right">
                        <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                        <a href="/"><i class="fas fa-home"></i></a>
                        {{-- <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a> --}}
                    </nav>
                </nav>
            </div>
            {{-- Internet connection --}}
            <div class="internet-connection">
                <span class="ic-connected">Connected</span>
                <span class="ic-connecting">Connecting...</span>
                <span class="ic-noInternet">No internet access</span>
            </div>
            {{-- Messaging area --}}
            <div class="m-body messages-container app-scroll">
                <div class="messages">
                    <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                </div>
                {{-- Typing indicator --}}
                <div class="typing-indicator">
                    <div class="message-card typing">
                        <p>
                            <span class="typing-dots">
                                <span class="dot dot-1"></span>
                                <span class="dot dot-2"></span>
                                <span class="dot dot-3"></span>
                            </span>
                        </p>
                    </div>
                </div>
                {{-- Send Message Form --}}
                @include('Chatify::layouts.sendForm')
            </div>
        </div>
        {{-- ---------------------- Info side ---------------------- --}}
        {{-- <div class="messenger-infoView app-scroll"> --}}
            {{-- nav actions --}}
            {{-- <nav> --}}
                {{-- <a href="#"><i class="fas fa-times"></i></a> --}}
            {{-- </nav> --}}
            {{-- {!! view('Chatify::layouts.info')->render() !!} --}}
        {{-- </div> --}}
    {{-- </div> --}}
    @include('Chatify::layouts.modals')
    @include('Chatify::layouts.footerLinks')
</div>
@endsection
@section('js')
<script src="{{asset('app-assets/js/scripts/pages/app-chat.js')}}"></script>


@endsection