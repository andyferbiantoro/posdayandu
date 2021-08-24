<div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $message)
            <li class="message clearfix">
                {{--if message from id is equal to auth id then it is sent by logged in user --}}
                <div class="{{ ($message->id_pengirim == Auth::id()) ? 'sent' : 'received' }}">
                    <p style="color: white">{{ $message->pesan }}</p>
                    <p class="date" style="color: white">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="input-text">
    <input type="text" name="message" class="submit" placeholder="Tekan Enter Untuk Mengirim Pesan">
</div>