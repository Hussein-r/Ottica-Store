<div id="glassArea">
    @foreach ($glasses as $glass)
    <div class="single-product-wrapper" style="display:inline-block;width:250px;height:350px;" >
        <div class="product-img" style="border: 1px solid rgb(243, 243, 243);height:200px;">
            <img src="images/{{$glass->images->first()->image}}" alt="" class="mt-4">
            <div class="product-badge new-badge">
                <span>{{$glass->label}}</span>
            </div>

            <div class="product-favourite">
                {{-- <button id="love"  onclick="updateFavorite({{$glass->id}},this)">&#x2764;</button> --}}

                <a {{ $glass->favourite->count() ? "style=color:red;" : ''}} id="love"  onclick="return(updateFavorite({{$glass->id}},this))" class="favme fa fa-heart"></a>
            </div>
        </div>
        <div class="product-description" style="background-color:rgb(247, 247, 247); padding:10px">
            <a  href="#">
                <h3 >{{$glass->brand->name}}</h6>
            </a>
            <p class="product-price">
                <span class="old-price">{{$glass->price_before_discount}} EGP</span> 
                {{$glass->price_after_discount}} EGP
                <span><h5 class="text-danger" style="text-align:right;">{{round((($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100) }} %</h5></span>
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
</div>