<div id="sorted_data">
            @foreach ($lenses as $lense)
            <div class="single-product-wrapper mt-6 border p-4" style="display:inline-block;height:400px;width:255px;">
                <div class="product-img h-60" >
                    <img style="height:200px;" src="images/{{$lense->image}}" alt="">
                    <div class="product-favourite">
                        <a onclick="return(updateFavorite({{$lense->id}},this))" class="favme fa fa-heart"></a>
                    </div>
                </div>
                <div class="product-description">
                    <span>{{$lense->name}}</span>

                    <a href="single-product-details.html">
                        <h3 >{{$lense->brand->name}}</h6>
                    </a>
                    <ul>
                    @foreach ($lense->lenseType as $lensetype)
                        <li> {{$lensetype->duration}} Days &emsp; For {{$lensetype->price}} EGP</li>
                    @endforeach
                    </ul>
                    <div class="hover-content">
                        <!-- Add to Cart -->
                        <div class="add-to-cart-btn">
                            <a href="/lenses/{{$lense->id}}" class="btn essence-btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach  
      </div>