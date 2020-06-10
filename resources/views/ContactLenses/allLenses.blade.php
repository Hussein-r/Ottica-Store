@extends('layouts.userNavbar')
@section('content')
<section class="container">
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Conatct Lenses</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-flex align-items-center justify-content-between">
                   
                </div>
                        <!-- Total Products -->
                        {{-- <div class="total-products">
                            <p><span>{{count($lenses)}}</span> products found</p>
                        </div> --}}
                        <!-- Sorting -->
                        <div class="product-sorting d-flex">
                       
                            <p>Sort by:</p>
                            <form action="#" method="get">
                                <select name="select" id="sortByselect">
                                    <option value="value">Highest Rated</option>
                                    <option value="value"><a  href="/latestSort/created_at">Newest</a></option>
                                    <option value="value">Price: $$ - $</option>
                                    <option value="value">Price: $ - $$</option>
                                </select>
                                <input type="submit" class="d-none" value="">
                            </form>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($lenses as $lense)
               
                {{-- {{$colors=Color::whereIn("id",$allcolors)->get('name')}} --}}
                <!-- Single Product -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        @if($lense->images->first())                        
                        <div class="product-img">
                            <img style="height: 150px" src="/images/{{$lense->images->first()->image}}" alt="product image">
                            @endif
                            <!-- Hover Thumb -->
                            @if($lense->images->last())     
                            <img class="hover-img" src="/images/{{$lense->images->last()->image}}" alt="">
                            @endif
                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                            <span>{{$lense->label}}</span>
                            </div>
                            
                        </div>

                        <!-- Product Description -->
                        <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                            <a href="#">
                                <h6>{{$lense->brand->name}}</h6>
                            </a>
                            {{-- <span style="margin-left: 20px">{{$colors}}</span> --}}
                            <p class="product-price">
                                <span class="old-price">{{$lense->price_before_discount}}EGP</span> 
                                {{$lense->price_after_discount}}EGP
                                <span><h5 class="text-danger" style="text-align:right;">-40%</h5></span>
                            </p>
                    
                        <hr/>
                        <span>Lenses Colors</span>
                        {{-- <div class="row" style="margin: 5px;">
                            @forelse ($colors as $color)
                                <div style="width: 30px; border: lightgrey solid 1px; border-radius: 50%; background-color:{{$color->name}};">
                                    <pre>   </pre>
                                </div>      
                            @empty
                            
                            @endforelse
                        </div> --}}
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                 <a href="{{route('lenses.show', $lense->id)}}" class="btn essence-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
                    No products yet!
                </div>
                    
                @endforelse
            </div>
        </div>
</section>
@endsection