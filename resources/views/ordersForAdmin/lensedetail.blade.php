@if ($lensesDetails->count())
@foreach($lensesDetails as $lensesDetail)
<div id="maindiv">
			<div style="float:left;padding-left:30px;padding-top:20px;">
			@foreach($lenses  as $lense)
			@if ($lense->id == $lensesDetail->product_id)
				<h2>Lense Name:  {{$lense->name}} </h2>
				@endif
				@endforeach
			<div class="row col-md-12">
                <table>
                <tr>
                    <td> right bc</td>
                    <td>  {{$lensesDetail->right_bc}}    </td>
                </tr>
                <tr>
                    <td> left bc</td>
                    <td>   {{$lensesDetail->left_bc}}    </td>
                </tr>
                <tr>
                    <td> right power </td>
                    <td> {{$lensesDetail->right_power}} </td>
                </tr>
                <tr>
                    <td>left power</td>
                    <td>   {{$lensesDetail->left_power}}   </td>
                </tr>
                <tr>
                    <td> left cylinder </td>
                    <td>  {{$glassesDetail->left_cylinder}}    </td>
                </tr>
                <tr>
                    <td> right dia </td>
                    <td>  {{$lensesDetail->right_dia}}   </td>
                </tr>
                <tr>
                    <td> left dia</td>
                    <td>   {{$lensesDetail->left_dia}}   </td>
                </tr>
                <tr>
                    <td> left color </td>
					<td>    {{$lensesDetail->left_color}}     </td>
                </tr>
                <tr>
                    <td> right color </td>
					<td>       {{$lensesDetail->right_color}} </td>
                </tr>
                <tr>
                    <td>Uploaded image </td>
                    <td> 
      <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$lensesDetail->image}}" />
       </td>

  
                </tr>
          </table>
			
				@endforeach
				@endif
           </div>

             </div>
 <div style="float:right;">
 <img style="height:550px;border-top-right-radius:10px;border-bottom-right-radius:10px" src="/images/{{$lenseImgarr->image}}" alt="form" >
 </div>

</div>