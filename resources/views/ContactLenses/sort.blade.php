            <div id="sorted_data">
                        @foreach ($lenses as $lense)
                        <div class="single-product-wrapper col-md-9 mt-6 col-4 h-30 border p-4" style="display:inline-block;">
                            <div class="product-img" >
                                <img src="images/{{$lense->image}}" alt="">
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