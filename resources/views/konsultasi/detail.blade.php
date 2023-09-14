@extends('master')

@section('home')
    {{-- <link rel="stylesheet" href="{{ asset('custom.css') }}"> --}}
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Konsultasi</h1>
        </div>
        <div class="">
            <a class="btn btn-info mb-3" href="{{ route('konsultasi') }}">Kembali</a>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="nk-chat border-0">
                                <div class="nk-chat-body">
                                    <div class="nk-chat-head">
                                        <div class="lead-text">
                                            {{ auth()->user()->role == 'guest' ? 'Pakar' : $konsultasi->user->name }}</div>
                                    </div><!-- .nk-chat-head -->
                                    <div class="nk-chat-panel" data-simplebar="init">
                                        <div class="simplebar-wrapper" style="margin: -20px -28px;">
                                            <div class="simplebar-height-auto-observer-wrapper">
                                                <div class="simplebar-height-auto-observer"></div>
                                            </div>
                                            <div class="simplebar-mask">
                                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                    <div class="simplebar-content-wrapper"
                                                        style="height: auto; overflow: hidden scroll;">
                                                        <div class="simplebar-content" style="padding: 20px 28px;">
                                                            <div
                                                                class="chat {{ auth()->user()->role == 'guest' ? 'is-me' : 'is-you' }}">
                                                                <div class="chat-content">
                                                                    <div class="chat-bubbles">
                                                                        <div class="chat-bubble">
                                                                            <div class="chat-msg">
                                                                                {{ $konsultasi->pertanyaan }}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .chat -->
                                                            @foreach ($konsultasi->jawaban as $jawaban)
                                                                @if (auth()->user()->role == 'guest')
                                                                    <div
                                                                        class="{{ $jawaban->pakar == 1 ? 'chat is-you' : 'chat is-me' }}">
                                                                        <div class="chat-content">
                                                                            <div class="chat-bubbles">
                                                                                <div class="chat-bubble">
                                                                                    <div class="chat-msg">
                                                                                        {{ $jawaban->jawaban }}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div
                                                                        class="{{ $jawaban->pakar == 1 ? 'chat is-me' : 'chat is-you' }}">
                                                                        <div class="chat-content">
                                                                            <div class="chat-bubbles">
                                                                                <div class="chat-bubble">
                                                                                    <div class="chat-msg">
                                                                                        {{ $jawaban->jawaban }}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <div class="chat is-me wrapper-chat" style="display: none;">
                                                                <div class="chat-content">
                                                                    <div class="chat-bubbles">
                                                                        <div class="chat-bubble">
                                                                            <div class="chat-msg" id="after-pesan"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .chat -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="simplebar-placeholder" style="width: auto; height: 776px;"></div>
                                        </div>
                                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                        </div>
                                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                            <div class="simplebar-scrollbar"
                                                style="height: 25px; transform: translate3d(0px, 9px, 0px); display: block;">
                                            </div>
                                        </div>
                                    </div><!-- .nk-chat-panel -->
                                    <div class="nk-chat-editor">
                                        <div class="nk-chat-editor-form">
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-simple no-resize" name="pesan" id="pesan" rows="1"
                                                    id="default-textarea" placeholder="Tulis pesan konsultasi..."></textarea>
                                            </div>
                                        </div>
                                        <ul class="nk-chat-editor-tools g-2">
                                            <li>
                                                <button type="submit" id="kirim" class="btn btn-primary">Kirim</button>
                                            </li>
                                        </ul>
                                    </div><!-- .nk-chat-editor -->
                                </div><!-- .nk-chat-body -->
                            </div><!-- .nk-chat -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#kirim').click(function(e) {
                e.preventDefault();
                let pesan = $('#pesan').val();
                $.ajax({
                    url: `{{ route('konsultasi.update', ['id' => $konsultasi->id_konsultasi]) }}`,
                    type: 'POST',
                    data: {
                        '_method': 'PUT',
                        '_token': '{{ csrf_token() }}',
                        pesan: pesan
                    },
                    success: function(data) {
                        let pesan = data.data.jawaban;
                        $('#pesan').val('');
                        $('.wrapper-chat').show();
                        $('#after-pesan').html(pesan);
                    }
                });
            });
        });
    </script>
@endsection
