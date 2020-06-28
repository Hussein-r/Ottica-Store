@extends('layouts.admin')
@section('content')
<!-- ------------------------------ -->
<section class="single_product_details_area d-flex align-items-center">   
<div id="accordion" style="margin-left:230px; width:1000px;" >
        <!-- start of card -->
        @if ($glassProducts->count())
        @foreach($glassProducts  as $glassProduct)
            <div class="card">
              <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                            <table>
                            <tr>
                            @foreach($glasses as $glass)&emsp;
                            @if ($glass->id == $glassProduct->product_id)
                                    <td class="row-2">
                                    Glass Code : {{$glass->glass_code}}&emsp;
                                    </td>
                                    <td class="row-2">Quantity :{{$glassProduct->quantity}}&emsp;&emsp;
                                    </td>
                                    @foreach($glassColors  as $color)
                                        @if ($glassProduct->color_id == $color->id)
                                            <td class="row-2">Lense Color :{{$color->name}}&emsp;&emsp;</td>
                                        @endif
                                    @endforeach

                                    <td class="row-4">
                                    @if ($glassProduct->category != "no prescription")
                                        <button class="btn btn-link row-2" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Prescription
                                        </button> 
                                    @endif  
                                    @if ($glassProduct->category == "no prescription")
                                        User didn't add prescription !
                                    @endif   
                                    </td>
                            @endif      
                            </tr>
                            </table>
                            @endforeach
                    
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row-12">
                                @if ($glassProduct->prescription_type =='image')
                                        @foreach ($glassPrescriptionImages as $glasspresc)
                                        @if($glassProduct->created_at==$glasspresc->created_at &&$glassProduct->created_at==$glasspresc->created_at)
                                            <div class="col-md-9 ml-5">
                                                <img style="width:820px;height:300px;"src="/images/{{$glasspresc->image}}" alt="">	
                                            </div>
                                        @endif
                                        @endforeach
                                @endif
                            
                                @if ($glassProduct->prescription_type =='table')
                                    @foreach ($glassPrescription as $glasspresc)
                                        @if($glassProduct->product_id==$glasspresc->product_id &&$glassProduct->order_id==$glasspresc->order_id)
                                        <table class="ml-5 col-6">
                                            <tr>
                                                <td class='col-3'> right sphere</td>
                                                <td class='col-3'> {{$glasspresc->right_sphere	}}   </td>
                                            </tr>
                                            <tr>
                                                <td class='col-3'> left sphere</td>
                                                <td class='col-3'> {{$glasspresc->left_sphere}}    </td>
                                            </tr>
                                            <tr>
                                                <td class='col-3'> right cylinder </td>
                                                <td class='col-3'> {{$glasspresc->right_cylinder}}  </td>
                                            </tr>
                                            <tr>
                                                <td class='col-3'> right sphere</td>
                                                <td class='col-3'> {{$glasspresc->right_sphere	}}   </td>
                                            </tr>
                                            <tr>
                                                <td class='col-3'> left cylinder </td>
                                                <td class='col-3'>  {{$glasspresc->left_cylinder}}    </td>
                                            </tr>
                                            <tr>
                                                <td class='col-3'> right axis </td>
                                                <td class='col-3'> {{$glasspresc->right_axis}}    </td>
                                            </tr>
                                            <tr>
                                                <td class='col-3'> left axis</td>
                                                <td class='col-3'>  {{$glasspresc->left_axis}}   </td>
                                            </tr>
                                            <tr>
                                                <td class='col-3'> right add </td>
                                                <td class='col-3'>  {{$glasspresc->right_add}}    </td>
                                            </tr>
                                            <tr>
                                                <td class='col-3'> leftright add </td>
                                                <td class='col-3'>  {{$glasspresc->left_add}}    </td>
                                            </tr>
                                    </table>
                                        @endif
                                        @endforeach
                                        @endif

                        </div>

                    </div>
                </div>
            
              @endforeach
              @endif
            
              <!-- end of card -->
              <!-- LENSES -->
                @if ($lenseProducts->count())
                @foreach($lenseProducts  as $lenseProduct)
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                @foreach($lenses as $lense)
                                    <table>
                                    <tr>
                                    @if ($lense->id == $lenseProduct->product_id)
                                            <td class="row-2">
                                            Lense Name: {{$lense->name}}&emsp;
                                            </td>

                                            <td class="row-2">Duration :{{$lenseProduct->duration}}&emsp;</td>
                                            <td class="row-2">Category :{{$lenseProduct->category}}&emsp;</td>
                                            @foreach($lenseColors  as $color)
                                                @if ($lenseProduct->color_id == $color->id)
                                                <td class="row-2">Lense Color :{{$color->name}}&emsp; </td>
                                                @endif
                                            @endforeach
                                            <td class="row-2">
                                            @if ($lenseProduct->category != 1)
                                                <button class="btn btn-link row-2" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                 Prescription
                                                </button> 
                                            @endif    
                                            </td>
                                    @endif    
                                    </tr>
                                    </table>
                                @endforeach
                            
                            </h5>
                        </div>

                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="col-12">
                                @if ($lenseProduct->prescription_type =='image')
                                @foreach ($lensePrescriptionImages as $lensepresc)
                                @if($lenseProduct->created_at==$lensepresc->created_at &&$lenseProduct->created_at==$lensepresc->created_at)
                                                    <div class="col-md-9 ml-5">
                                                        <img style="width:820px;height:300px;"src="/images/{{$lensepresc->image}}" alt="">	
                                                    </div>
                                                @endif
                                                @endforeach
                                        @endif
                                    
                                        @if ($lenseProduct->prescription_type =='table')
                                        @foreach ($lensePrescription as $lensepresc)
                                            @if($lenseProduct->product_id==$lensepresc->product_id &&$lenseProduct->order_id==$lensepresc->order_id)
                                            <table class=" ml-5 col-6">
                                                <tr>
                                                    <td class='col-3'> right bc</td>
                                                    <td class='col-3'>  {{$lensepresc->right_bc}}    </td>
                                                </tr>
                                                <tr>
                                                    <td class='col-3'> left bc</td>
                                                    <td class='col-3'>   {{$lensepresc->left_bc}}    </td>
                                                </tr>
                                                <tr>
                                                    <td class='col-3'> right power </td>
                                                    <td class='col-3'> {{$lensepresc->right_power}} </td>
                                                </tr>
                                                <tr>
                                                    <td class='col-3'>left power</td>
                                                    <td class='col-3'>   {{$lensepresc->left_power}}   </td>
                                                </tr>
                                                <tr>
                                                    <td class='col-3'> right dia </td>
                                                    <td class='col-3'>  {{$lensepresc->right_dia}}   </td>
                                                </tr>
                                                <tr>
                                                    <td class='col-3'> left dia</td>
                                                    <td class='col-3'>   {{$lensepresc->left_dia}}   </td>
                                                </tr>
                                        </table>
                                                @endif
                                                @endforeach
                                                @endif

                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                <!-- end of card -->
        
            <!-- end of lenses--------------- -->
        </div>
</div>
</section>
<!-- ------------------- -->

@endsection