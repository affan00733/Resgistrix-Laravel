@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section style="background-color:#282828 " class="section">
        <div class="container">
            <div class="row">
                <h4 style="color: aliceblue" class="section-heading">Agent List</h4>
            </div>
            <div class="row">

                @foreach($agents as $agent)
                    <div class="col s12 m4">
                        <div style="background-color: #393C3F" class="card-panel center card-agent">
                            <span class="card-image-bg" style="background-image:url({{Storage::url('users/'.$agent->image)}});"></span>
                            <h5 class="m-b-0">
                                <a style="color: aliceblue" href="{{ route('agents.show',$agent->id) }}" class="truncate">{{ $agent->name }}</a>
                            </h5>
                            <h6 style="color: aliceblue" class="email">{{ $agent->email }}</h6>
                            <p  style="color: aliceblue"class="about">{{ str_limit($agent->about,50) }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="m-t-30 m-b-60 center">
                {{ $agents->links() }}
            </div>

        </div>
    </section>

@endsection

@section('scripts')

@endsection