@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')

<section style="background-color:#282828 " class="section">
    <div class="container">
            <div class="row">

                <div style="background-color: #393C3F" class="col s12 m4 card">

                    <h2 style="color: aliceblue" class="sidebar-title">search property</h2>

                    <form class="sidebar-search" action="{{ route('search')}}" method="GET">

                        <div class="searchbar">
                            <div class="input-field col s12">
                                <input type="text" name="city" id="autocomplete-input-sidebar" class="autocomplete custominputbox" autocomplete="off">
                                <label  for="autocomplete-input-sidebar">Enter City or State</label>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="type" class="browser-default">
                                    <option value="" disabled selected>Choose Type</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="house">House</option>
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="purpose" class="browser-default">
                                    <option value="" disabled selected>Choose Purpose</option>
                                    <option value="rent">Rent</option>
                                    <option value="sale">Sale</option>
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <select name="bedroom" class="browser-default">
                                    <option value="" disabled selected>Choose Bedroom</option>
                                    @foreach($bedroomdistinct as $bedroom)
                                        <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-field col s12">
                                <select name="bathroom" class="browser-default">
                                    <option value="" disabled selected>Choose Bathroom</option>
                                    @foreach($bathroomdistinct as $bathroom)
                                        <option value="{{$bathroom->bathroom}}">{{$bathroom->bathroom}}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="minprice" id="minprice" class="custominputbox">
                                <label for="minprice">Min Price</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="maxprice" id="maxprice" class="custominputbox">
                                <label for="maxprice">Max Price</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="minarea" id="minarea" class="custominputbox">
                                <label for="minarea">Floor Min Area</label>
                            </div>
    
                            <div class="input-field col s12">
                                <input type="number" name="maxarea" id="maxarea" class="custominputbox">
                                <label for="maxarea">Floor Max Area</label>
                            </div>
                            
                            <div class="input-field col s12">
                                <div class="switch">
                                    <label style="color: aliceblue">
                                        <input type="checkbox" name="featured">
                                        <span  class="lever"></span>
                                        Featured
                                    </label>
                                </div>
                            </div>
                            <div  class="input-field col s12">
                                <button class="btn btnsearch cyan " type="submit">
                                    <i class="material-icons left">search</i>
                                    <span>SEARCH</span>
                                </button>
                            </div>
                        </div>
    
                    </form>

                </div>

                <div class="col s12 m8">

                    @foreach($properties as $property)
                        <div style="background-color: #393C3F" class="card horizontal">
                            <div >
                                <div  class="card-content property-content">
                                    @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                        <div class="card-image blog-content-image">
                                            <img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}">
                                        </div>
                                    @endif
                                    <span class="card-title search-title" title="{{$property->title}}">
                                        <a style="color: aliceblue" href="{{ route('property.show',$property->slug) }}">{{ $property->title }}</a>
                                    </span>
                                    
                                    <div class="address">
                                        <i style="color: cyan" class="small material-icons left">location_city</i>
                                        <span style="color: aliceblue">{{ ucfirst($property->city) }}</span>
                                    </div>
                                    <div class="address">
                                        <i style="color: cyan" class="small material-icons left">place</i>
                                        <span style="color: aliceblue">{{ ucfirst($property->address) }}</span>
                                    </div>

                                    <h5  style="color: aliceblue">
                                        &dollar;{{ $property->price }}
                                        <small class="right">{{ $property->type }} for {{ $property->purpose }}</small>
                                    </h5>

                                </div>
                                <div class="card-action property-action clearfix">
                                    <span style="color: aliceblue" class="btn-flat">
                                        <i style="color: cyan" class="material-icons">check_box</i>
                                        Bedroom: <strong>{{ $property->bedroom}}</strong> 
                                    </span>
                                    <span style="color: aliceblue" class="btn-flat">
                                        <i style="color: cyan" class="material-icons">check_box</i>
                                        Bathroom: <strong>{{ $property->bathroom}}</strong> 
                                    </span>
                                    <span style="color: aliceblue" class="btn-flat">
                                        <i style="color: cyan" class="material-icons">check_box</i>
                                        Area: <strong>{{ $property->area}}</strong> Sq Ft
                                    </span>
                                    <span style="color: aliceblue" class="btn-flat">
                                        <i style="color: cyan" class="material-icons">comment</i>
                                        {{ $property->comments_count}}
                                    </span>

                                    @if($property->featured == 1)
                                        <span style="color: aliceblue" class="right featured-stars">
                                            <i style="color: cyan" class="material-icons">stars</i>
                                        </span>
                                    @endif                                    

                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="m-t-30 m-b-60 center">
                        {{ 
                            $properties->appends([
                                'city'      => Request::get('city'),
                                'type'      => Request::get('type'),
                                'purpose'   => Request::get('purpose'),
                                'bedroom'   => Request::get('bedroom'),
                                'bathroom'  => Request::get('bathroom'),
                                'minprice'  => Request::get('minprice'),
                                'maxprice'  => Request::get('maxprice'),
                                'minarea'   => Request::get('minarea'),
                                'maxarea'   => Request::get('maxarea'),
                                'featured'  => Request::get('featured')
                            ])->links() 
                        }}
                    </div>
        
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection