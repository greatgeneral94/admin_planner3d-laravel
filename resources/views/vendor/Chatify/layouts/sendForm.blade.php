<div class="messenger-sendCard card-footer chat-footer border-top  p-0 m-0">
    <form class="d-flex align-items-center" id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file"  /></label>
        {{-- <textarea  readonly='readonly' name="message" class="m-send app-scroll form-control chat-message-send mx-1" placeholder="Type a message.."></textarea> --}}
        <input type="text" readonly='readonly' name="message" class="m-send app-scroll form-control chat-message-send mx-1" placeholder="Type a message..">
        <button disabled='disabled'><span class="fas fa-paper-plane"></span></button>
    </form>
</div>
 