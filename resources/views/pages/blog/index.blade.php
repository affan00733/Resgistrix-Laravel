@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

    <section style="background-color:#282828 " class="section">
        <div class="container">
            <div class="row">
                <h4 style="color: aliceblue" class="section-heading">Blog Posts</h4>
            </div>
            <div class="row">

                <div class="col s12 m8">

                    @foreach($posts as $post)
                        <div class="card horizontal">
                            <div style="background-color: #393C3F">
                                <div class="card-content">
                                    @if(Storage::disk('public')->exists('posts/'.$post->image) && $post->image)
                                        <div class="card-image blog-content-image">
                                            <img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}">
                                        </div>
                                    @endif
                                    <span style="color: aliceblue" class="card-title">
                                        <a style="color: aliceblue" href="{{ route('blog.show',$post->slug) }}">{{ $post->title }}</a>
                                    </span>
                                    <span style="color: aliceblue">
                                    {!! str_limit($post->body,120) !!}
                                    </span>
                                </div>
                                <div  class="card-action blog-action clearfix">
                                    <a href="{{ route('blog.author',$post->user->username) }}" class="btn-flat">
                                        <i style="color: cyan" class="material-icons">person</i>
                                        <span style="color: aliceblue">{{$post->user->name}}</span>
                                    </a>
                                    <a href="#" class="btn-flat disabled">
                                        <i style="color: cyan" class="material-icons">watch_later</i>
                                        <span style="color: aliceblue">{{$post->created_at->diffForHumans()}}</span>
                                    </a>
                                    @foreach($post->categories as $key => $category)
                                        <a href="{{ route('blog.categories',$category->slug) }}" class="btn-flat">
                                            <i  style="color: cyan" class="material-icons">folder</i>
                                            <span style="color: aliceblue">{{$category->name}}</span>
                                        </a>
                                    @endforeach
                                    @foreach($post->tags as $key => $tag)
                                        <a href="{{ route('blog.tags',$tag->slug) }}" class="btn-flat">
                                            <i style="color: cyan" class="material-icons">label</i>
                                            <span style="color: aliceblue">{{$tag->name}}</span>
                                        </a>
                                    @endforeach
                                    
                                    <a href="{{ route('blog.show',$post->slug) . '#comments' }}" class="btn-flat">
                                        <i style="color: cyan" class="material-icons">comment</i>
                                        <span style="color: aliceblue">{{$post->comments_count}}</span>
                                    </a>
                                    <a href="#" class="btn-flat disabled">
                                        <i style="color: cyan" class="material-icons">visibility</i>
                                        <span style="color: aliceblue">{{$post->view_count}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div  class="m-t-30 m-b-60 center">
                        {{ $posts->appends(['month' => Request::get('month'), 'year' => Request::get('year')])->links() }}
                    </div>
        
                </div>

                <div class="col s12 m4">

                    @include('pages.blog.sidebar')

                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection