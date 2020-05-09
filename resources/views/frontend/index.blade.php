@extends('frontend.layouts.app')

@section('content')

    <!-- SERVICE SECTION -->

    <section style="background-color:#282828 " class="section  center">
        <div class="container">
            <div class="row">
                <h4 style="color: aliceblue" class="section-heading">Services</h4>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col s12 m4">
                        <div style="background-color: #393C3F" class="card-panel">
                            <i  class="material-icons large cyan-text">{{ $service->icon }}</i>
                            <h5 style="color: aliceblue">{{ $service->title }}</h5>
                            <p style="color: aliceblue">{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- FEATURED SECTION -->

    <section style="background-color: #393C3F" class="section">
        <div class="container">
            <div  class="row">
                <h4 style="color: aliceblue" class="section-heading">Featured Properties</h4>
            </div>
            <div class="row">

                @foreach($properties as $property)
                    <div class="col s12 m4">
                        <div style="background-color:#282828 " class="card">
                            <div  class="card-image">
                                @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                    <span  class="card-image-bg" style="background-image:url({{Storage::url('property/'.$property->image)}});"></span>
                                @else
                                    <span class="card-image-bg"><span>
                                @endif
                                @if($property->featured == 1)
                                    <a class="btn-floating halfway-fab waves-effect waves-light cyan" title="Featured"><i class="small material-icons">star</i></a>
                                @endif
                            </div>
                            <div class="card-content property-content">
                                <a href="{{ route('property.show',$property->slug) }}">
                                    <span style="color: aliceblue" class="card-title tooltipped" data-position="bottom" data-tooltip="{{ $property->title }}">{{ str_limit( $property->title, 18 ) }}</span>
                                </a>

                                <div class="address">
                                    <i style="color: cyan" class="small material-icons left">location_city</i>
                                    <span style="color: aliceblue">{{ ucfirst($property->city) }}</span>
                                </div>
                                <div class="address">
                                    <i style="color: cyan" class="small material-icons left">place</i>
                                    <span style="color: aliceblue">{{ ucfirst($property->address) }}</span>
                                </div>
                                <div class="address">
                                    <i style="color: cyan"  class="small material-icons left">check_box</i>
                                    <span style="color: aliceblue">{{ ucfirst($property->type) }} for {{ $property->purpose }}</span>
                                </div>

                                <h5 style="color: aliceblue">
                                    &dollar;{{ $property->price }}
                                    <div class="right" id="propertyrating-{{$property->id}}"></div>
                                </h5>
                            </div>
                            <div class="card-action property-action">
                                <span style="color: aliceblue" class="btn-flat">
                                    <i style="color: cyan" style="color: cyan" class="material-icons">check_box</i>
                                    Bedroom: <strong>{{ $property->bedroom}}</strong> 
                                </span>
                                <span style="color: aliceblue" class="btn-flat">
                                    <i style="color: cyan" class="material-icons">check_box</i>
                                    Bathroom: <strong>{{ $property->bathroom}}</strong> 
                                </span>
                                <span style="color: aliceblue" class="btn-flat">
                                    <i style="color: cyan" class="material-icons">check_box</i>
                                    Area: <strong>{{ $property->area}}</strong> Square Feet
                                </span>
                                <span style="color: aliceblue" class="btn-flat">
                                    <i style="color: cyan" class="material-icons">comment</i> 
                                    <strong>{{ $property->comments_count}}</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- TESTIMONIALS SECTION -->

    <section style="background-color:#282828 " class="section  center">
        <div class="container">

            <h4 style="color: aliceblue" class="section-heading">Testimonials</h4>

            <div class="carousel testimonials">

                @foreach($testimonials as $testimonial)
                    <div  class="carousel-item testimonial-item" href="#{{$testimonial->id}}!">
                        <div style="background-color: #393C3F;padding-top: 15px" class="card testimonial-card">
                            <span style="color: aliceblue" style="height:20px;display:block;"></span>
                            <div class="card-image testimonial-image">
                                <img src="{{Storage::url('testimonial/'.$testimonial->image)}}">
                            </div>
                            <div class="card-content">
                                <span style="color: aliceblue" class="card-title">{{$testimonial->name}}</span>
                                <p style="color: aliceblue">
                                    {{$testimonial->testimonial}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </section>


    <!-- BLOG SECTION -->

    <section style="background-color: #393C3F" class="section center">
        <div class="row">
            <h4  style="color: aliceblue" class="section-heading">Recent Blog</h4>
        </div>
        <div class="container">
            <div class="row">

                @foreach($posts as $post)
                <div class="col s12 m4">
                    <div style="background-color:#282828 " class="card">
                        <div class="card-image">
                            @if(Storage::disk('public')->exists('posts/'.$post->image) && $post->image)
                                <span   class="card-image-bg" style="background-image:url({{Storage::url('posts/'.$post->image)}});"></span>
                            @endif
                        </div>
                        <div class="card-content">
                            <span  style="color: aliceblue" class="card-title tooltipped" data-position="bottom" data-tooltip="{{$post->title}}">
                                <a style="color:aliceblue " href="{{ route('blog.show',$post->slug) }}">{{ str_limit($post->title,18) }}</a>
                            </span>
                            <span style="color:aliceblue ">
                            {!! str_limit($post->body,120) !!}
                            </span>
                        </div>
                        <div class="card-action blog-action">
                            <a href="{{ route('blog.author',$post->user->username) }}" class="btn-flat">
                                <i style="color: cyan" class="material-icons">person</i>
                                <span  style="color: aliceblue">{{$post->user->name}}</span>
                            </a>
                            @foreach($post->categories as $key => $category)
                                <a href="{{ route('blog.categories',$category->slug) }}" class="btn-flat">
                                    <i style="color: cyan" class="material-icons">folder</i>
                                    <span  style="color: aliceblue">{{$category->name}}</span>
                                </a>
                            @endforeach
                            @foreach($post->tags as $key => $tag)
                                <a href="{{ route('blog.tags',$tag->slug) }}" class="btn-flat">
                                    <i style="color: cyan" class="material-icons">label</i>
                                    <span  style="color: aliceblue">{{$tag->name}}</span>
                                </a>
                            @endforeach
                            <a href="#" class="btn-flat disabled">
                                <i style="color: cyan" class="material-icons">watch_later</i>
                                <span style="color: aliceblue">{{$post->created_at->diffForHumans()}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    $(function(){
        var js_properties = <?php echo json_encode($properties);?>;
        js_properties.forEach(element => {
            if(element.rating){
                var elmt = element.rating;
                var sum = 0;
                for( var i = 0; i < elmt.length; i++ ){
                    sum += parseFloat( elmt[i].rating ); 
                }
                var avg = sum/elmt.length;
                if(isNaN(avg) == false){
                    $("#propertyrating-"+element.id).rateYo({
                        rating: avg,
                        starWidth: "20px",
                        readOnly: true
                    });
                }else{
                    $("#propertyrating-"+element.id).rateYo({
                        rating: 0,
                        starWidth: "20px",
                        readOnly: true
                    });
                }
            }
        });
    })
</script>
@endsection