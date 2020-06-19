<div id="filter_data" class="row">
     
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
                            <h3>{{$lense->name}}</h3>
                            
                            <p class="product-price">
                                <span class="old-price">{{$lense->price_before_discount}}EGP</span> 
                                {{$lense->price_after_discount}}EGP
                                <span><h5 class="text-danger" style="text-align:right;">-{{round((($lense->price_before_discount-$lense->price_after_discount)/$lense->price_before_discount)*100)}}%</h5></span>
                            </p>
                
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