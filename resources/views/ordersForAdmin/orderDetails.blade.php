


@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>special orders</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
            <div class="table100">
					<table>
            

            @if ($glassesDetails->count())
            <thead>
            <tr class="table100-head"><th colspan='12' style="text-align:center;">Glasses section</th></tr>

          
							<tr class="table100-head">
                     <th class="column1">Glass code</th>
								<th class="column1">right sphere</th>
                        <th class="column1">left sphere</th>
								<th class="column1">right cylinder</th>
                        <th class="column1">left cylinder</th>
                        <th class="column1">right axis</th>
                        <th class="column1">left axis</th>
								<th class="column1">right add</th>
                        <th class="column1">left add</th>
                        <th class="column1">Uploaded image</th>
							</tr>
						</thead>
@foreach($glassesDetails  as $glassesDetail)
<tbody>
   <tr>
   @foreach($glasses  as $glass)
   @if ($glass->id == $glassesDetail->product_id)
   <td>    {{$glass->glass_code}}     </td>
   @endif
   @endforeach
   <td>    {{$glassesDetail->right_sphere	}}     </td>
   <td>    {{$glassesDetail->left_sphere	}}     </td>
   <td>    {{$glassesDetail->right_cylinder}}     </td>
   <td>    {{$glassesDetail->left_cylinder}}     </td>
   <td> {{$glassesDetail->right_axis}}  </td>
   <td> {{$glassesDetail->left_axis}}  </td>
   <td> {{$glassesDetail->right_add}}  </td>
   <td> {{$glassesDetail->left_add}}  </td>
   <td> 
      <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$glassesDetail->image}}" />
       </td>

   </tr>
  @endforeach
  </tbody>
   @endif
    </table>
    </div>

   <div>
   </div>
 <div class="table100">
<table class="mt-5">
   @if ($lensesDetails->count())
   <thead>
	<tr class="table100-head"><th colspan='12' style="text-align:center;">lenses Section</th></tr>
							<tr class="table100-head">
                     <th class="column1">lenses name</th>
								<th class="column1">right bc</th>
                        <th class="column1">leftbc</th>
								<th class="column1">right power</th>
                        <th class="column1">left power</th>
                        <th class="column1">right dia</th>
                        <th class="column1">left dia</th>
								<th class="column1">right qty</th>
                        <th class="column1">left qty</th>
                        <th class="column1">right color</th>
                        <th class="column1">left color</th>
                        <th class="column1">Uploaded image</th>

							</tr>
						</thead>
@foreach($lensesDetails  as $lensesDetail)
<tbody>
   <tr>
   @foreach($lenses  as $lense)
   @if ($lense->id == $lensesDetail->product_id)
   <td>    {{$lense->name}}     </td>
   @endif
   @endforeach
   <td>    {{$lensesDetail->right_bc}}     </td>
   <td>        {{$lensesDetail->left_bc}}          </td>
   <td>    {{$lensesDetail->right_power}}     </td>
   <td>        {{$lensesDetail->left_power}}          </td>
   <td>    {{$lensesDetail->right_dia}}     </td>
   <td>        {{$lensesDetail->left_dia}}          </td>
   <td>    {{$lensesDetail->left_qty}}     </td>
   <td>        {{$lensesDetail->right_qty}}          </td>
   <td>    {{$lensesDetail->left_color}}     </td>
   <td>        {{$lensesDetail->right_color}}          </td>
   <td> 
      <img style="height:200px ; width:150px;" class="img-thumbnail" src="/images/{{$lensesDetail->image}}" />
       </td>
   @endforeach
@endif
</tbody>

					</table>
               </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@endsection
