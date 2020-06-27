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
                        @foreach($glasses as $glass)  
                    <table>
                    <tr>
                    @if ($glass->id == $glassProduct->product_id)
                            <td class="row-2">
                            Glass Code : {{$glass->glass_code}}
                            </td>
                        @endif
                        
                                <td class="row-2">Quantity :{{$glassProduct->quantity}} </td>
                                <td class="row-2">Category :{{$glassProduct->category}} </td>


                            @foreach($glassColors  as $color)
                                @if ($glassProduct->color_id == $color->id)
                                    <td class="row-2">Lense Color :{{$color->name}} </td>
                                @endif
                            @endforeach
                            <td class="row-4">
                            @if ($glassProduct->category != "no prescription")
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Prescription
                                </button> 
                            @endif  
                            @if ($glassProduct->category == "no prescription")
                                 User didn't add prescription !
                            @endif   
                            </td>
                    </tr>
                    </table>
                    @endforeach
                    
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div>
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
                                        <table>
                                            <tr>
                                                <td> right sphere</td>
                                                <td> {{$glasspresc->right_sphere	}}   </td>
                                            </tr>
                                            <tr>
                                                <td> left sphere</td>
                                                <td> {{$glasspresc->left_sphere}}    </td>
                                            </tr>
                                            <tr>
                                                <td> right cylinder </td>
                                                <td> {{$glasspresc->right_cylinder}}  </td>
                                            </tr>
                                            <tr>
                                                <td> right sphere</td>
                                                <td> {{$glasspresc->right_sphere	}}   </td>
                                            </tr>
                                            <tr>
                                                <td> left cylinder </td>
                                                <td>  {{$glasspresc->left_cylinder}}    </td>
                                            </tr>
                                            <tr>
                                                <td> right axis </td>
                                                <td> {{$glasspresc->right_axis}}    </td>
                                            </tr>
                                            <tr>
                                                <td> left axis</td>
                                                <td>  {{$glasspresc->left_axis}}   </td>
                                            </tr>
                                            <tr>
                                                <td> right add </td>
                                                <td>  {{$glasspresc->right_add}}    </td>
                                            </tr>
                                            <tr>
                                                <td> leftright add </td>
                                                <td>  {{$glasspresc->left_add}}    </td>
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
                                    Lense Name: {{$lense->name}}
                                    </td>
                            @endif
                                    <td class="row-2">Quantity :{{$lenseProduct->quantity}} </td>
                                    <td class="row-2">Duration :{{$lenseProduct->duration}} </td>
                                    <td class="row-2">Category :{{$lenseProduct->category}} </td>
                                    @foreach($lenseColors  as $color)
                                        @if ($lenseProduct->color_id == $color->id)
                                        <td class="row-2">Lense Color :{{$color->name}} </td>
                                        @endif
                                    @endforeach
                                    <td class="row-2">
                                    @if ($lenseProduct->category != 1)
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            See Client Prescription
                                        </button> 
                                    @endif    
                                    </td>
                            </tr>
                            </table>
                            @endforeach
                            
                            </h5>
                        </div>

                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div>
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
                                            <table>
                                                <tr>
                                                    <td> right bc</td>
                                                    <td>  {{$lensepresc->right_bc}}    </td>
                                                </tr>
                                                <tr>
                                                    <td> left bc</td>
                                                    <td>   {{$lensepresc->left_bc}}    </td>
                                                </tr>
                                                <tr>
                                                    <td> right power </td>
                                                    <td> {{$lensepresc->right_power}} </td>
                                                </tr>
                                                <tr>
                                                    <td>left power</td>
                                                    <td>   {{$lensepresc->left_power}}   </td>
                                                </tr>
                                                <tr>
                                                    <td> right dia </td>
                                                    <td>  {{$lensepresc->right_dia}}   </td>
                                                </tr>
                                                <tr>
                                                    <td> left dia</td>
                                                    <td>   {{$lensepresc->left_dia}}   </td>
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