<div  id="filter_data">
    @foreach ($glasses as $glass)
    <div class="single-product-wrapper mt-6 col-md-4 h-30" style="display:inline-block;">
        <!-- Product Image -->
        <div class="product-img" >
            <img src="images/{{$glass->images->first()->image}}" alt="">
            <!-- Favourite -->
            <div class="product-favourite">
                {{-- <button id="love"  onclick="updateFavorite({{$glass->id}},this)">&#x2764;</button> --}}

                <a {{ $glass->favourite->count() ? "style=color:red;" : ''}} id="love"  onclick="return(updateFavorite({{$glass->id}},this))" class="favme fa fa-heart"></a>
            </div>
        </div>



        <!-- Product Description -->
        <div  class="product-description">
            <span>{{$glass->code}}</span>
            <a  href="single-product-details.html">
                <h3 style="margin-left:10%;">{{$glass->brand->name}}</h6>
            </a>
            <p class="product-price">
                <span class="old-price">{{$glass->price_before_discount}}EGP</span> 
                {{$glass->price_after_discount}}EGP
                <span><h5 class="text-danger" style="text-align:right;">{{(($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100 }} %</h5></span>
            </p>
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
       