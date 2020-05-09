<div style="background-color: #393C3F" class="card">
    <div class="card-content">
        <h3 style="color: aliceblue" class="font-18 m-t-0 bold uppercase">Popular Posts</h3>
        <ul class="collection">
            @foreach($popularposts as $post)
                <li style="background-color:#282828 " class="collection-item">
                    <a href="{{ route('blog.show',$post->slug) }}" class="indigo-text text-darken-4">
                        <span style="color: aliceblue" class="truncate tooltipped" data-position="bottom" data-tooltip="{{ $post->title }}">{{ $post->title }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
    
<div style="background-color: #393C3F" class="card">
    <div class="card-content">
        <h3 style="color: aliceblue" class="font-18 m-t-0 bold uppercase">Categories</h3>
        <ul>
            @foreach($categories as $category)
                <li class="category-bg-image" style="background-image:url({{Storage::url('category/slider/'.$category->image)}});">

                    <a style="background-color: rgb(0, 204, 204)" href="{{ route('blog.categories',$category->slug) }}">

                        <span  class="left">{{ $category->name }}</span>

                        <span class="right">{{ $category->posts_count }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div style="background-color: #393C3F" class="card">
    <div class="card-content">
        <h3 style="color: aliceblue" class="font-18 m-t-0 bold uppercase">Archives</h3>
        <ul class="collection">
            @foreach($archives as $stats)
                <li style="background-color:#282828;color: aliceblue " class="collection-item">

                    <a style="color: aliceblue" href="/blog/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class=" text-darken-4">

                        {{ $stats['month'] . ' ' . $stats['year'] }}

                        <span style="color: aliceblue" class="badge cyan darken-1 white-text">{{ $stats['published'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div style="background-color: #393C3F" class="card">
    <div class="card-content">
        <h3 style="color: aliceblue" class="font-18 m-t-0 bold uppercase">Tags</h3>

        @foreach($tags as $tag)

            <a href="{{ route('blog.tags',$tag->slug) }}">

                <span class="btn-small cyan white-text m-b-5 card-no-shadow">{{ $tag->name }}</span>

            </a>

        @endforeach
    </div>
</div>