<div id="sorted_data">
    @foreach ($lenses as $lense)
    <div class="single-product-wrapper" style="display:inline-block;width:250px;height:350px;"">
        <div class="product-img" style="border: 1px solid rgb(243, 243, 243);height:200px;" >
            <img src="images/{{$lense->image}}" alt="">
            <div class="product-badge new-badge">
                <span>{{$lense->label}}</span>
            </div>
        </div>
        <div class="product-description" style="background-color:rgb(247, 247, 247); padding:10px;height:150px;">
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
