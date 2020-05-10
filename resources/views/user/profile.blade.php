@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<section style="background-color:#282828 " class="section">
    <div class="container">
            <div class="row">

                <div class="col s12 m3">
                    <div class="agent-sidebar">
                        @include('user.sidebar')
                    </div>
                </div>

                <div class="col s12 m9">
                    <div class="agent-content">
                        <h4 style="background-color: #393C3F;color: aliceblue" class="agent-title">PROFILE</h4>

                        <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="input-field col s6">
                                    <i style="color: cyan" class="material-icons prefix">person</i>
                                    <input style="color: aliceblue" id="name" name="name" type="text" value="{{ $profile->name }}" class="validate">
                                    <label for="name">Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <i style="color: cyan" class="material-icons prefix">assignment_ind</i>
                                    <input style="color: aliceblue" id="username" name="username" type="text" value="{{ $profile->username or null }}" class="validate">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s6">
                                    <i style="color: cyan" class="material-icons prefix">email</i>
                                    <input style="color: aliceblue" id="email" name="email" type="email" value="{{ $profile->email }}" class="validate">
                                    <label for="username">Email</label>
                                </div>
                                <div class="file-field input-field col s6">
                                    <div class="btn cyan">
                                        <span>Image</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input style="color: aliceblue" class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i style="color: cyan" class="material-icons prefix">mode_edit</i>
                                    <textarea style="color: aliceblue" id="about" name="about" class="materialize-textarea">{{ $profile->about or null }}</textarea>
                                    <label for="about">About</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <button class="btn waves-effect waves-light btn-large cyan darken-4" type="submit">
                                        Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div> <!-- /.col -->

            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('textarea#about').characterCounter();
    });

</script>
@endsection