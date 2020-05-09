@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<section style="background-color:#282828 " class="section">
    <div class="container">
            <div class="row">

                <div class="col s12 m8">
                    <div class="contact-content">
                        <h4 style="color: aliceblue" class="contact-title">Contact Us</h4>

                        <form id="contact-us" action="" method="POST">
                            @csrf
                            <input style="color: cyan;" type="hidden" name="mailto" value="{{ $contactsettings[0]['email'] ?? 'p4alam@gmail.com' }}">

                            @auth
                                <input style="color: cyan;" type="hidden" name="user_id" value="{{ auth()->id() }}">
                            @endauth

                            @auth
                                <div style="color: cyan" class="input-field col s12">
                                    <i style="color: cyan;" class="material-icons prefix">person</i>
                                    <input style="color: aliceblue;color"  id="name" name="name" type="text"  class="validate" value="{{ auth()->user()->name }}" readonly>
                                    <label style="color: aliceblue"  for="name">Name</label>
                                </div>
                            @endauth
                            @guest
                                <div style="color: cyan" class="input-field col s12">
                                    <i  style="color: cyan;"  class="material-icons prefix">person</i>
                                    <input style="color: aliceblue;"  id="name" name="name" type="text" class="validate">
                                    <label style="color: aliceblue" for="name">Name</label>
                                </div>
                            @endguest

                            @auth
                                <div class="input-field col s12">
                                    <i style="color: cyan" class="material-icons prefix">mail</i>
                                    <input style="color: aliceblue" id="email" name="email" type="email" class="validate" value="{{ auth()->user()->email }}" readonly>
                                    <label style="color: aliceblue;"  for="email">Email</label>
                                </div>
                            @endauth
                            @guest
                                <div class="input-field col s12">
                                    <i style="color: cyan" class="material-icons prefix">mail</i>
                                    <input id="email" name="email" type="email" class="validate">
                                    <label style="color: aliceblue" for="email">Email</label>
                                </div>
                            @endguest

                            <div class="input-field col s12">
                                <i style="color: cyan" class="material-icons prefix">phone</i>
                                <input id="phone" name="phone" type="number" class="validate">
                                <label style="color: aliceblue" for="phone">Phone</label>
                            </div>

                            <div class="input-field col s12">
                                <i style="color: cyan" class="material-icons prefix">mode_edit</i>
                                <input id="message" name="message" type="text" class="validate">
                                <label style="color: aliceblue" for="message">Message</label>
                            </div>
                            
                            <button id="msgsubmitbtn" class="btn waves-effect waves-light cyan darken-4 btn-large" type="submit">
                                <span>SEND</span>
                                <i class="material-icons right">send</i>
                            </button>

                        </form>

                    </div>
                </div> <!-- /.col -->

                <div class="col s12 m4">
                    <div class="contact-sidebar">
                        <div class="m-t-30">
                            <i style="color: cyan" class="material-icons left">call</i>
                            <h6 style="color: cyan" class="uppercase">Call us Now</h6>
                            @if(isset($contactsettings[0]) && $contactsettings[0]['phone'])
                                <h6 style="color: cyan" class="bold m-l-40">{{ $contactsettings[0]['phone'] }}</h6>
                            @endif
                        </div>
                        <div class="m-t-30">
                            <i style="color: cyan" class="material-icons left">mail</i>
                            <h6 style="color: cyan" class="uppercase">Email Address</h6>
                            @if(isset($contactsettings[0]) && $contactsettings[0]['email'])
                                <h6 style="color: cyan" class="bold m-l-40">{{ $contactsettings[0]['email'] }}</h6>
                            @endif
                        </div>
                        <div class="m-t-30">
                            <i style="color: cyan" class="material-icons left">map</i>
                            <h6 style="color: cyan" class="uppercase">Address</h6>
                            @if(isset($contactsettings[0]) && $contactsettings[0]['address'])
                                <h6 style="color: cyan" class="bold m-l-40">{!! $contactsettings[0]['address'] !!}</h6>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $('textarea#message').characterCounter();

        $(function(){
            $(document).on('submit','#contact-us',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "{{ route('contact.message') }}";
                var btn = $('#msgsubmitbtn');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('<span>LOADING...</span><i class="material-icons right">rotate_right</i>');
                    },
                    success: function(data) {
                        if (data.message) {
                            M.toast({html: data.message, classes:'green darken-4'})
                        }
                    },
                    error: function(xhr) {
                        M.toast({html: 'ERROR: Failed to send message!', classes: 'red darken-4'})
                    },
                    complete: function() {
                        $('form#contact-us')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('<span>SEND</span><i class="material-icons right">send</i>');
                    },
                    dataType: 'json'
                });

            })
        })

    </script>
@endsection