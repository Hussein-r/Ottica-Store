<div  id="filter_data" class="row">
                @forelse ($glasses as $glass)
                {{$allcolors = $glasses->where("glass_code",$glass->glass_code)->get('color_id')}}
                {{-- {{$colors=Color::whereIn("id",$allcolors)->get('name')}} --}}
                <!-- Single Product -->
     <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-product-wrapper">
                        <!-- Product Image -->
                        @if($glass->images->first()->image)                        
                        <div class="product-img">
                            <img style="height: 150px" src="/images/{{$glass->images->first()->image}}" alt="product image">
                            @endif
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="/images/{{$glass->images->last()->image}}" alt="">

                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                            <span>{{$glass->label}}</span>
                            </div>
                           
                        </div>

                        <!-- Product Description -->
                 <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                            <!-- Favourite -->
                            <div class="product-favourite" style="text-align: right">
                                <button class="favme fa fa-heart" id="love"  onclick="updateFavorite({{$glass->id}},this)"></button>
                            </div>
                    
                            <a href="#">
                                <h6>{{$glass->brand->name}}</h6>
                            </a>
                            <span>{{$glass->glass_code}}</span>

            <!-- Hover Content -->
            <div class="hover-content">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                    <a href="/glass/{{$glass->id}}" class="btn essence-btn">View Details</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach     
            <div style="text-align: center;">
                {{-- {{ $glasses->links() }} --}}
            </div>
        </div>
</div>