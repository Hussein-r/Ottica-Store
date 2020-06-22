<<<<<<< HEAD
<div id="filter_data">
    <div id="glassArea">
    @foreach ($glasses as $glass)
    <div class="single-product-wrapper  mt-6 col-4 h-30" style="display:inline-block;float:right;">
        <div class="product-img" >
            <img src="images/{{$glass->images->first()->image}}" alt="">
            <div class="product-favourite">
                <a {{ $glass->favourite->count() ? "style=color:red;" : ''}} id="love"  onclick="return(updateFavorite({{$glass->id}},this))" class="favme fa fa-heart"></a>
            </div>
        </div>
        <div class="product-description">
            <span>{{$glass->glass_code}}</span>
=======
<div id='filter_data'>
        <div id="glassArea">
               @foreach ($glasses as $glass)
         <div class="single-product-wrapper  mt-6 col-4 h-30" style="display:inline-block;">
                 <!-- Product Image -->
              <div class="product-img" >
                   <img src="images/{{$glass->images->first()->image}}" alt="">
                      <!-- Favourite -->
                     <div class="product-favourite">
                         <a {{ $glass->favourite->count() ? "style=color:red;" : ''}} id="love"  onclick="return(updateFavorite({{$glass->id}},this))" class="favme fa fa-heart"></a>
                        </div>
               </div>
                 <!-- Product Description -->
        <div class="product-description ">
            <span>{{$glass->code}}</span>
            <a  href="single-product-details.html">
                <h3 style="margin-left:10%;">{{$glass->brand->name}}</h6>
            </a>
            <p style="margin-left:10%;" class="product-price"><strong class="price"><del>{{$glass->price_before_discount}}</del>                 {{$glass->price_after_discount}}</strong></p>
>>>>>>> dd8cf64a682c4ca43be8927615a37c29db8dd598

            <a href="single-product-details.html">
                <h3 >{{$glass->brand->name}}</h6>
            </a>
            <p class="product-price"><strong class="price"><del>{{$glass->price_before_discount}}</del> 
                    {{$glass->price_after_discount}}</strong><span><h5 class="text-danger">{{round((($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100) }} %</h5></span></p>
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
<<<<<<< HEAD
</div>
=======
    </div>
>>>>>>> dd8cf64a682c4ca43be8927615a37c29db8dd598
