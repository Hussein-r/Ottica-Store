@extends('layouts.app')
@section('content')
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Lense Edit</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/nunito-font.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
</head>
    <body class="form-v6">
    <h1 style="text-align: center">Edit Contact Lense Data</h1>
        <div class="container">
       
        {!! Form::model($lense,['route' =>['lenses.update',$lense],'method' => 'put']) !!}
     
               <div class="input-group mb-3">
                     
                    {!! Form::text('name',null,['class'=>'form-control','aria-label'=>'name', 'aria-describedby'=>'basic-addon1','placeholder'=>'Contact Name'])  !!}
                </div>
                <div><span class="text">{{$errors->first('name')}}</span></div>
                <div class="input-group mb-3">
                     
                    {!! Form::number('quantity',null,['class'=>'form-control','aria-label'=>'quantity', 'aria-describedby'=>'basic-addon4','placeholder'=>'The quantity'])  !!}
                </div>
                <div><span class="text">{{$errors->first('quantity')}}</span></div>
                <div class="input-group mb-3">
                    
                    {!! Form::text('label',null,['class'=>'form-control','aria-label'=>'label', 'aria-describedby'=>'basic-addon1','placeholder'=>'The label'])  !!}
                </div>
                <div><span class="text">{{$errors->first('label')}}</span></div>
                <div class="input-group mb-3">
                   
                    {!! Form::text('price_before_discount',null,['class'=>'form-control','aria-label'=>'Price', 'aria-describedby'=>'basic-addon5','placeholder'=>'Price Before Discount'])  !!}
                </div>
                <div><span class="text">{{$errors->first('price_before_discount')}}</span></div>
                <div class="input-group mb-3">
                    
                    {!! Form::text('price_after_discount',null,['class'=>'form-control','aria-label'=>'Price', 'aria-describedby'=>'basic-addon5','placeholder'=>'Price After Discount'])  !!}
                </div>
                <div><span class="text">{{$errors->first('price_before_discount')}}</span></div>
                 <div class="input-group mb-3">
                      
                    {!! Form::text('description',null,['class'=>'form-control','aria-label'=>'description', 'aria-describedby'=>'basic-addon1','placeholder'=>'Description'])  !!}
                </div>
                <div><span class="text">{{$errors->first('description')}}</span></div>
                 <div class="input-group mb-3">
                    
                    <select class="custom-select" id="inputGroupSelect01" name="brand_id">
                        <option disabled>Choose Brand</option>
                        @if ($brands->count())
                            @foreach($brands as $brand)
                                <option {{$lense->brand_id == $brand->id  ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}</option> 
                            @endforeach   
                        @endif
                    </select>
                    <div class="input-group-append">
                    <a href="{{route('lenseBrand.create')}}"  class="btn btn-info center-block ">Add A New Brand</a>
                    </div>
                </div>
                <div><span class="text-white">{{$errors->first('brand_id')}}</span></div>
                <div class="input-group mb-3">
                    
                    <select class="custom-select" id="inputGroupSelect01" name="type_id">
                        <option disabled>Choose Type</option>
                        @if ($types->count())
                            @foreach($types as $type)
                                <option {{$lense->type_id == $type->id  ? 'selected' : ''}}
                                    value="{{ $type->id }}">{{ $type->name }}
                                </option> 
                            @endforeach   
                        @endif
                    </select>
                    <div class="input-group-append">
                    <a href="{{route('lensetype.create')}}"  class="btn btn-info center-block">Add A New Type</a>
                    </div>
                </div>
                <div><span class="text-white">{{$errors->first('type_id')}}</span></div>
                <div class="input-group mb-3">
                    
                    <select class="custom-select" id="inputGroupSelect01" name="manufacturerer_id">
                        <option disabled >Choose Manufacturerer</option>
                        @if ($manufacturerers->count())
                            @foreach($manufacturerers as $manufacturerer)
                                <option  {{$lense->manufacturerer_id == $manufacturerer->id  ? 'selected' : ''}} value="{{ $manufacturerer->id }}">{{ $manufacturerer->name }}</option> 
                            @endforeach   
                        @endif
                    </select>
                    <div class="input-group-append">
                    <a href="{{route('LenseManufacturerer.create')}}"  class="btn btn-info center-block ">Add A New Manufacturerer</a>
                    </div>
                </div>
                <div><span class="text-white">{{$errors->first('manufacturerer_id')}}</span></div>
                <div class="input-group mb-3">
                     
                    {!! Form::text('material_of_content',null,['class'=>'form-control','aria-label'=>'material_of_content', 'aria-describedby'=>'basic-addon1','placeholder'=>'Material Of Content'])  !!}
                </div>
                <div><span class="text">{{$errors->first('material_of_content')}}</span></div>
                <div class="input-group mb-3">
                       
                    {!! Form::text('water_of_content',null,['class'=>'form-control','aria-label'=>'water_of_content', 'aria-describedby'=>'basic-addon1','placeholder'=>'Water Of Content'])  !!}
                </div>
                <div><span class="text">{{$errors->first('water_of_content')}}</span></div>
                <select class="custom-select" id="inputGroupSelect01" name="lense_purpose">
                 <option disabled>Choose Lense Purpose</option>
                                <option  value="1">medical</option> 
                                <option  value="2">beauty</option> 
                            
                    </select>
                 <div><span class="text">{{$errors->first('lense_purpose')}}</span></div>
                        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="images[]" id="inputGroupFile01" multiple>
                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                    </div>
                </div>
                <div><span class="text-white">{{$errors->first('image')}}</span></div>


           
           <div style="text-align: center ">
                {!! Form::submit('Update',['class'=>'btn btn-primary center-block btn-lg'])  !!}
                {!! Form::close() !!}
           <a href="{{route('lenseBrand.index')}}" class="btn btn-primary center-block btn-lg">Cancel</a>
           </div>
         </div>
    </body>
</html>
@endsection
