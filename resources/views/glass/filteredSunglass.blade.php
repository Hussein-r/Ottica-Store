<div id="filter_data" class="col-9">
    <div id="glassArea">
    @foreach ($glasses as $glass)
    <div class="single-product-wrapper  mt-8 col-4 h-30" style="display:inline-block;">
        <div class="product-img" style="border: 1px solid rgb(243, 243, 243)">
            <img src="images/{{$glass->images->first()->image}}" alt="">
            <div class="product-favourite">
                <a {{ $glass->favourite->count() ? "style=color:red;" : ''}} id="love"  onclick="return(updateFavorite({{$glass->id}},this))" class="favme fa fa-heart"></a>
            </div>
        </div>
        <div class="product-description" style="background-color:rgb(247, 247, 247); padding:10px">
            {{-- <span>{{$glass->glass_code}}</span> --}}
                <h3 >{{$glass->brand->name}}</h6>
            
            {{-- <span>Price:  </span>  --}}
            <p class="product-price"><span>{{$glass->price_before_discount}}</span> 
                    {{$glass->price_after_discount}} EGP<span>
          <h5 class="text-danger" style="text-align: right">{{round((($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100) }} %</h5></span></p>
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
</div>
