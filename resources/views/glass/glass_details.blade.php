@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Ottica</title>
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/css/glassstyle.css">

</head>
@section('content')
<body style="background-color:white;">
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
            @if ($images->count())
                @foreach($images as $image)
                    <img src="/images/{{$image->image}}" alt="">
                @endforeach   
            @endif	
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <a href="#">
                <span>{{$brand->name}}</span>
            </a>
            <h2>{{$glass->label}}</h2>
            <p id='id'>{{$glass->glass_code}}</p>
            <p class="product-price"><span class="old-price">{{$glass->price_before_discount}}</span>{{$glass->price_after_discount}}</p>
            <p class="product-desc">Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin.</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Add Custom Lense
                </label>
            </div>
            <div class="select-box mt-3 mb-30">
                <form action="/changecolor" method='post' class="mt-3">
                    @csrf   
                    <select name='color' class="custom-select" id="productColor" >
                    @foreach($colorsnames as $color)
                        <option value="{{$color->id}}" {{( $glass->color_id==$color->id ? "selected":"") }}>{{$color->name}}</option>
                    @endforeach   
                    </select>
                    <input type="text" class="id" hidden name='code' value="{{$glass->glass_code}}"></input>
                </form>
                <input type="number" class="form-control mt-3" id="quantity" name="quantity" min="1" placeholder="Quantity"></input>
            </div>
            <div class="cart-fav-box d-flex align-items-center">
                <form class="cart-form clearfix" method="post">
                    <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                </form>
                <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
        </div>
    </section>
    <div id="mydiv">
    <div>
    <button class="tablink" style="border: 1px solid grey" onclick="openPage('Image', this,'#dc0647' )">Add Your Prescription Image</button>
    <button class="tablink" style="border: 1px solid grey" onclick="openPage('prescription', this,'#dc0647' )" id="defaultOpen">Enter Prescription Manually</button>
    </div>
    <div id="Image" class="tabcontent">
        <div class="ml-3">
            <h3>Tips</h3>
            <ul>
                <li>Take a clear photo of your prescription</li>
                <li>make sure all the numbers are clear</li>
            </ul>
        </div>
        <div class="input-group mb-3 col-md-6">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
    </div>
    <div id="prescription" class="tabcontent prescription-table-wrapper">
        <table class="params-prescription-table">
            <colgroup>
                <col width="17.5%">
                <col width="20%"> 
                <col width="20%"> 
                <col width="20%"> 
                <col width="20%">
            </colgroup> 
            <thead>
                <tr>
                    <th></th> 
                    <th>
                        <span>Sphere (SPH)</span> 
                    </th> 
                    <th>
                        <span>Cylinder (CYL)</span> 
                    </th> 
                    <th>
                        <span>Axis</span> 
                    </th> 
                    <th>
                        <span>Add</span> 
                    </th>
                </tr>
            </thead> 
            <tbody>
                <tr>
                    <th>Right Eye (OD)</th> 
                    <td>
                        <select class="col-md-6">
                            <option value=" "></option>
                            <option value="-20.00">-20.00</option>
                            <option value="-19.75">-19.75</option>
                            <option value="-19.50">-19.50</option>
                            <option value="-19.25">-19.25</option>
                            <option value="-19.00">-19.00</option>
                            <option value="-18.75">-18.75</option>
                            <option value="-18.50">-18.50</option>
                            <option value="-18.25">-18.25</option>
                            <option value="-18.00">-18.00</option>
                            <option value="-17.75">-17.75</option>
                            <option value="-17.50">-17.50</option>
                            <option value="-17.25">-17.25</option>
                            <option value="-17.00">-17.00</option>
                            <option value="-16.75">-16.75</option>
                            <option value="-16.50">-16.50</option>
                            <option value="-16.25">-16.25</option>
                            <option value="-16.00">-16.00</option>
                            <option value="-15.75">-15.75</option>
                            <option value="-15.50">-15.50</option>
                            <option value="-15.25">-15.25</option>
                            <option value="-15.00">-15.00</option>
                            <option value="-14.75">-14.75</option>
                            <option value="-14.50">-14.50</option>
                            <option value="-14.25">-14.25</option>
                            <option value="-14.00">-14.00</option>
                            <option value="-13.75">-13.75</option>
                            <option value="-13.50">-13.50</option>
                            <option value="-13.25">-13.25</option>
                            <option value="-13.00">-13.00</option>
                            <option value="-12.75">-12.75</option>
                            <option value="-12.50">-12.50</option>
                            <option value="-12.25">-12.25</option>
                            <option value="-12.00">-12.00</option>
                            <option value="-11.75">-11.75</option>
                            <option value="-11.50">-11.50</option>
                            <option value="-11.25">-11.25</option>
                            <option value="-11.00">-11.00</option>
                            <option value="-10.75">-10.75</option>
                            <option value="-10.50">-10.50</option>
                            <option value="-10.25">-10.25</option>
                            <option value="-10.00">-10.00</option>
                            <option value="-9.75">-9.75</option>
                            <option value="-9.50">-9.50</option>
                            <option value="-9.25">-9.25</option>
                            <option value="-9.00">-9.00</option>
                            <option value="-8.75">-8.75</option>
                            <option value="-8.50">-8.50</option>
                            <option value="-8.25">-8.25</option>
                            <option value="-8.00">-8.00</option>
                            <option value="-7.75">-7.75</option>
                            <option value="-7.50">-7.50</option>
                            <option value="-7.25">-7.25</option>
                            <option value="-7.00">-7.00</option>
                            <option value="-6.75">-6.75</option>
                            <option value="-6.50">-6.50</option>
                            <option value="-6.25">-6.25</option>
                            <option value="-6.00">-6.00</option>
                            <option value="-5.75">-5.75</option>
                            <option value="-5.50">-5.50</option>
                            <option value="-5.25">-5.25</option>
                            <option value="-5.00">-5.00</option>
                            <option value="-4.75">-4.75</option>
                            <option value="-4.50">-4.50</option>
                            <option value="-4.25">-4.25</option>
                            <option value="-4.00">-4.00</option>
                            <option value="-3.75">-3.75</option>
                            <option value="-3.50">-3.50</option>
                            <option value="-3.25">-3.25</option>
                            <option value="-3.00">-3.00</option>
                            <option value="-2.75">-2.75</option>
                            <option value="-2.50">-2.50</option>
                            <option value="-2.25">-2.25</option>
                            <option value="-2.00">-2.00</option>
                            <option value="-1.75">-1.75</option>
                            <option value="-1.50">-1.50</option>
                            <option value="-1.25">-1.25</option>
                            <option value="-1.00">-1.00</option>
                            <option value="-0.75">-0.75</option>
                            <option value="-0.50">-0.50</option>
                            <option value="-0.25">-0.25</option>
                            <option value="PL/0">PL/0</option>
                            <option value="+0.25">+0.25</option>
                            <option value="+0.50">+0.50</option>
                            <option value="+0.75">+0.75</option>
                            <option value="+1.00">+1.00</option>
                            <option value="+1.25">+1.25</option>
                            <option value="+1.50">+1.50</option>
                            <option value="+1.75">+1.75</option>
                            <option value="+2.00">+2.00</option>
                            <option value="+2.25">+2.25</option>
                            <option value="+2.50">+2.50</option>
                            <option value="+2.75">+2.75</option>
                            <option value="+3.00">+3.00</option>
                            <option value="+3.25">+3.25</option>
                            <option value="+3.50">+3.50</option>
                            <option value="+3.75">+3.75</option>
                            <option value="+4.00">+4.00</option>
                            <option value="+4.25">+4.25</option>
                            <option value="+4.50">+4.50</option>
                            <option value="+4.75">+4.75</option>
                            <option value="+5.00">+5.00</option>
                            <option value="+5.25">+5.25</option>
                            <option value="+5.50">+5.50</option>
                            <option value="+5.75">+5.75</option>
                            <option value="+6.00">+6.00</option>
                            <option value="+6.25">+6.25</option>
                            <option value="+6.50">+6.50</option>
                            <option value="+6.75">+6.75</option>
                            <option value="+7.00">+7.00</option>
                            <option value="+7.25">+7.25</option>
                            <option value="+7.50">+7.50</option>
                            <option value="+7.75">+7.75</option>
                            <option value="+8.00">+8.00</option>
                            <option value="+8.25">+8.25</option>
                            <option value="+8.50">+8.50</option>
                            <option value="+8.75">+8.75</option>
                            <option value="+9.00">+9.00</option>
                            <option value="+9.25">+9.25</option>
                            <option value="+9.50">+9.50</option>
                            <option value="+9.75">+9.75</option>
                            <option value="+10.00">+10.00</option>
                            <option value="+10.25">+10.25</option>
                            <option value="+10.50">+10.50</option>
                            <option value="+10.75">+10.75</option>
                            <option value="+11.00">+11.00</option>
                            <option value="+11.25">+11.25</option>
                            <option value="+11.50">+11.50</option>
                            <option value="+11.75">+11.75</option>
                            <option value="+12.00">+12.00</option>
                            <option value="+12.25">+12.25</option>
                            <option value="+12.50">+12.50</option>
                            <option value="+12.75">+12.75</option>
                            <option value="+13.00">+13.00</option>
                            <option value="+13.25">+13.25</option>
                            <option value="+13.50">+13.50</option>
                            <option value="+13.75">+13.75</option>
                            <option value="+14.00">+14.00</option>
                            <option value="+14.25">+14.25</option>
                            <option value="+14.50">+14.50</option>
                            <option value="+14.75">+14.75</option>
                            <option value="+15.00">+15.00</option>
                            <option value="+15.25">+15.25</option>
                            <option value="+15.50">+15.50</option>
                            <option value="+15.75">+15.75</option>
                            <option value="+16.00">+16.00</option>
                            <option value="BAL/BALANCE">BAL/BALANCE</option>
                        </select> 
                    </td> 
                    <td>
                        <select class="col-md-6">
                            <option value=" "></option>
                            <option value="-12.00">-12.00</option>
                            <option value="-11.75">-11.75</option>
                            <option value="-11.50">-11.50</option>
                            <option value="-11.25">-11.25</option>
                            <option value="-11.00">-11.00</option>
                            <option value="-10.75">-10.75</option>
                            <option value="-10.50">-10.50</option>
                            <option value="-10.25">-10.25</option>
                            <option value="-10.00">-10.00</option>
                            <option value="-9.75">-9.75</option>
                            <option value="-9.50">-9.50</option>
                            <option value="-9.25">-9.25</option>
                            <option value="-9.00">-9.00</option>
                            <option value="-8.75">-8.75</option>
                            <option value="-8.50">-8.50</option>
                            <option value="-8.25">-8.25</option>
                            <option value="-8.00">-8.00</option>
                            <option value="-7.75">-7.75</option>
                            <option value="-7.50">-7.50</option>
                            <option value="-7.25">-7.25</option>
                            <option value="-7.00">-7.00</option>
                            <option value="-6.75">-6.75</option>
                            <option value="-6.50">-6.50</option>
                            <option value="-6.25">-6.25</option>
                            <option value="-6.00">-6.00</option>
                            <option value="-5.75">-5.75</option>
                            <option value="-5.50">-5.50</option>
                            <option value="-5.25">-5.25</option>
                            <option value="-5.00">-5.00</option>
                            <option value="-4.75">-4.75</option>
                            <option value="-4.50">-4.50</option>
                            <option value="-4.25">-4.25</option>
                            <option value="-4.00">-4.00</option>
                            <option value="-3.75">-3.75</option>
                            <option value="-3.50">-3.50</option>
                            <option value="-3.25">-3.25</option>
                            <option value="-3.00">-3.00</option>
                            <option value="-2.75">-2.75</option>
                            <option value="-2.50">-2.50</option>
                            <option value="-2.25">-2.25</option>
                            <option value="-2.00">-2.00</option>
                            <option value="-1.75">-1.75</option>
                            <option value="-1.50">-1.50</option>
                            <option value="-1.25">-1.25</option>
                            <option value="-1.00">-1.00</option>
                            <option value="-0.75">-0.75</option>
                            <option value="-0.50">-0.50</option>
                            <option value="-0.25">-0.25</option>
                            <option value="SPH/Blank/0">SPH/Blank/0</option>
                            <option value="+0.25">+0.25</option>
                            <option value="+0.50">+0.50</option>
                            <option value="+0.75">+0.75</option>
                            <option value="+1.00">+1.00</option>
                            <option value="+1.25">+1.25</option>
                            <option value="+1.50">+1.50</option>
                            <option value="+1.75">+1.75</option>
                            <option value="+2.00">+2.00</option>
                            <option value="+2.25">+2.25</option>
                            <option value="+2.50">+2.50</option>
                            <option value="+2.75">+2.75</option>
                            <option value="+3.00">+3.00</option>
                            <option value="+3.25">+3.25</option>
                            <option value="+3.50">+3.50</option>
                            <option value="+3.75">+3.75</option>
                            <option value="+4.00">+4.00</option>
                            <option value="+4.25">+4.25</option>
                            <option value="+4.50">+4.50</option>
                            <option value="+4.75">+4.75</option>
                            <option value="+5.00">+5.00</option>
                            <option value="+5.25">+5.25</option>
                            <option value="+5.50">+5.50</option>
                            <option value="+5.75">+5.75</option>
                            <option value="+6.00">+6.00</option>
                            <option value="+6.25">+6.25</option>
                            <option value="+6.50">+6.50</option>
                            <option value="+6.75">+6.75</option>
                            <option value="+7.00">+7.00</option>
                            <option value="+7.25">+7.25</option>
                            <option value="+7.50">+7.50</option>
                            <option value="+7.75">+7.75</option>
                            <option value="+8.00">+8.00</option>
                            <option value="+8.25">+8.25</option>
                            <option value="+8.50">+8.50</option>
                            <option value="+8.75">+8.75</option>
                            <option value="+9.00">+9.00</option>
                            <option value="+9.25">+9.25</option>
                            <option value="+9.50">+9.50</option>
                            <option value="+9.75">+9.75</option>
                            <option value="+10.00">+10.00</option>
                            <option value="+10.25">+10.25</option>
                            <option value="+10.50">+10.50</option>
                            <option value="+10.75">+10.75</option>
                            <option value="+11.00">+11.00</option>
                            <option value="+11.25">+11.25</option>
                            <option value="+11.50">+11.50</option>
                            <option value="+11.75">+11.75</option>
                            <option value="+12.00">+12.00</option>
                        </select> 
                    </td> 
                    <td>
                        <select class="col-md-6">
                            <option value=" "></option>
                            <option value="blank/0">blank/0</option>
                            <option value="001">001</option>
                            <option value="002">002</option>
                            <option value="003">003</option>
                            <option value="004">004</option>
                            <option value="005">005</option>
                            <option value="006">006</option>
                            <option value="007">007</option>
                            <option value="008">008</option>
                            <option value="009">009</option>
                            <option value="010">010</option>
                            <option value="011">011</option>
                            <option value="012">012</option>
                            <option value="013">013</option>
                            <option value="014">014</option>
                            <option value="015">015</option>
                            <option value="016">016</option>
                            <option value="017">017</option>
                            <option value="018">018</option>
                            <option value="019">019</option>
                            <option value="020">020</option>
                            <option value="021">021</option>
                            <option value="022">022</option>
                            <option value="023">023</option>
                            <option value="024">024</option>
                            <option value="025">025</option>
                            <option value="026">026</option>
                            <option value="027">027</option>
                            <option value="028">028</option>
                            <option value="029">029</option>
                            <option value="030">030</option>
                            <option value="031">031</option>
                            <option value="032">032</option>
                            <option value="033">033</option>
                            <option value="034">034</option>
                            <option value="035">035</option>
                            <option value="036">036</option>
                            <option value="037">037</option>
                            <option value="038">038</option>
                            <option value="039">039</option>
                            <option value="040">040</option>
                            <option value="041">041</option>
                            <option value="042">042</option>
                            <option value="043">043</option>
                            <option value="044">044</option>
                            <option value="045">045</option>
                            <option value="046">046</option>
                            <option value="047">047</option>
                            <option value="048">048</option>
                            <option value="049">049</option>
                            <option value="050">050</option>
                            <option value="051">051</option>
                            <option value="052">052</option>
                            <option value="053">053</option>
                            <option value="054">054</option>
                            <option value="055">055</option>
                            <option value="056">056</option>
                            <option value="057">057</option>
                            <option value="058">058</option>
                            <option value="059">059</option>
                            <option value="060">060</option>
                            <option value="061">061</option>
                            <option value="062">062</option>
                            <option value="063">063</option>
                            <option value="064">064</option>
                            <option value="065">065</option>
                            <option value="066">066</option>
                            <option value="067">067</option>
                            <option value="068">068</option>
                            <option value="069">069</option>
                            <option value="070">070</option>
                            <option value="071">071</option>
                            <option value="072">072</option>
                            <option value="073">073</option>
                            <option value="074">074</option>
                            <option value="075">075</option>
                            <option value="076">076</option>
                            <option value="077">077</option>
                            <option value="078">078</option>
                            <option value="079">079</option>
                            <option value="080">080</option>
                            <option value="081">081</option>
                            <option value="082">082</option>
                            <option value="083">083</option>
                            <option value="084">084</option>
                            <option value="085">085</option>
                            <option value="086">086</option>
                            <option value="087">087</option>
                            <option value="088">088</option>
                            <option value="089">089</option>
                            <option value="090">090</option>
                            <option value="091">091</option>
                            <option value="092">092</option>
                            <option value="093">093</option>
                            <option value="094">094</option>
                            <option value="095">095</option>
                            <option value="096">096</option>
                            <option value="097">097</option>
                            <option value="098">098</option>
                            <option value="099">099</option>
                            <option value="100">100</option>
                            <option value="101">101</option>
                            <option value="102">102</option>
                            <option value="103">103</option>
                            <option value="104">104</option>
                            <option value="105">105</option>
                            <option value="106">106</option>
                            <option value="107">107</option>
                            <option value="108">108</option>
                            <option value="109">109</option>
                            <option value="110">110</option>
                            <option value="111">111</option>
                            <option value="112">112</option>
                            <option value="113">113</option>
                            <option value="114">114</option>
                            <option value="115">115</option>
                            <option value="116">116</option>
                            <option value="117">117</option>
                            <option value="118">118</option>
                            <option value="119">119</option>
                            <option value="120">120</option>
                            <option value="121">121</option>
                            <option value="122">122</option>
                            <option value="123">123</option>
                            <option value="124">124</option>
                            <option value="125">125</option>
                            <option value="126">126</option>
                            <option value="127">127</option>
                            <option value="128">128</option>
                            <option value="129">129</option>
                            <option value="130">130</option>
                            <option value="131">131</option>
                            <option value="132">132</option>
                            <option value="133">133</option>
                            <option value="134">134</option>
                            <option value="135">135</option>
                            <option value="136">136</option>
                            <option value="137">137</option>
                            <option value="138">138</option>
                            <option value="139">139</option>
                            <option value="140">140</option>
                            <option value="141">141</option>
                            <option value="142">142</option>
                            <option value="143">143</option>
                            <option value="144">144</option>
                            <option value="145">145</option>
                            <option value="146">146</option>
                            <option value="147">147</option>
                            <option value="148">148</option>
                            <option value="149">149</option>
                            <option value="150">150</option>
                            <option value="151">151</option>
                            <option value="152">152</option>
                            <option value="153">153</option>
                            <option value="154">154</option>
                            <option value="155">155</option>
                            <option value="156">156</option>
                            <option value="157">157</option>
                            <option value="158">158</option>
                            <option value="159">159</option>
                            <option value="160">160</option>
                            <option value="161">161</option>
                            <option value="162">162</option>
                            <option value="163">163</option>
                            <option value="164">164</option>
                            <option value="165">165</option>
                            <option value="166">166</option>
                            <option value="167">167</option>
                            <option value="168">168</option>
                            <option value="169">169</option>
                            <option value="170">170</option>
                            <option value="171">171</option>
                            <option value="172">172</option>
                            <option value="173">173</option>
                            <option value="174">174</option>
                            <option value="175">175</option>
                            <option value="176">176</option>
                            <option value="177">177</option>
                            <option value="178">178</option>
                            <option value="179">179</option>
                            <option value="180">180</option>
                        </select> 
                    </td> 
                    <td>
                        <select class="col-md-6">
                            <option value=" "></option>
                            <option value="0"></option>
                            <option value="+0.25">+0.25</option>
                            <option value="+0.50">+0.50</option>
                            <option value="+0.75">+0.75</option>
                            <option value="+1.00">+1.00</option>
                            <option value="+1.25">+1.25</option>
                            <option value="+1.50">+1.50</option>
                            <option value="+1.75">+1.75</option>
                            <option value="+2.00">+2.00</option>
                            <option value="+2.25">+2.25</option>
                            <option value="+2.50">+2.50</option>
                            <option value="+2.75">+2.75</option>
                            <option value="+3.00">+3.00</option>
                            <option value="+3.25">+3.25</option>
                            <option value="+3.50">+3.50</option>
                            <option value="+3.75">+3.75</option>
                            <option value="+4.00">+4.00</option>
                            <option value="+4.25">+4.25</option>
                            <option value="+4.50">+4.50</option>
                            <option value="+4.75">+4.75</option>
                            <option value="+5.00">+5.00</option>
                            <option value="+5.25">+5.25</option>
                            <option value="+5.50">+5.50</option>
                            <option value="+5.75">+5.75</option>
                            <option value="+6.00">+6.00</option>
                        </select> 
                    </td>
                </tr> 
                <tr>
                    <th>Left Eye (OS)</th> 
                    <td>
                        <select class="col-md-6">
                            <option value=" "></option>
                            <option value="-20.00">-20.00</option>
                            <option value="-19.75">-19.75</option>
                            <option value="-19.50">-19.50</option>
                            <option value="-19.25">-19.25</option>
                            <option value="-19.00">-19.00</option>
                            <option value="-18.75">-18.75</option>
                            <option value="-18.50">-18.50</option>
                            <option value="-18.25">-18.25</option>
                            <option value="-18.00">-18.00</option>
                            <option value="-17.75">-17.75</option>
                            <option value="-17.50">-17.50</option>
                            <option value="-17.25">-17.25</option>
                            <option value="-17.00">-17.00</option>
                            <option value="-16.75">-16.75</option>
                            <option value="-16.50">-16.50</option>
                            <option value="-16.25">-16.25</option>
                            <option value="-16.00">-16.00</option>
                            <option value="-15.75">-15.75</option>
                            <option value="-15.50">-15.50</option>
                            <option value="-15.25">-15.25</option>
                            <option value="-15.00">-15.00</option>
                            <option value="-14.75">-14.75</option>
                            <option value="-14.50">-14.50</option>
                            <option value="-14.25">-14.25</option>
                            <option value="-14.00">-14.00</option>
                            <option value="-13.75">-13.75</option>
                            <option value="-13.50">-13.50</option>
                            <option value="-13.25">-13.25</option>
                            <option value="-13.00">-13.00</option>
                            <option value="-12.75">-12.75</option>
                            <option value="-12.50">-12.50</option>
                            <option value="-12.25">-12.25</option>
                            <option value="-12.00">-12.00</option>
                            <option value="-11.75">-11.75</option>
                            <option value="-11.50">-11.50</option>
                            <option value="-11.25">-11.25</option>
                            <option value="-11.00">-11.00</option>
                            <option value="-10.75">-10.75</option>
                            <option value="-10.50">-10.50</option>
                            <option value="-10.25">-10.25</option>
                            <option value="-10.00">-10.00</option>
                            <option value="-9.75">-9.75</option>
                            <option value="-9.50">-9.50</option>
                            <option value="-9.25">-9.25</option>
                            <option value="-9.00">-9.00</option>
                            <option value="-8.75">-8.75</option>
                            <option value="-8.50">-8.50</option>
                            <option value="-8.25">-8.25</option>
                            <option value="-8.00">-8.00</option>
                            <option value="-7.75">-7.75</option>
                            <option value="-7.50">-7.50</option>
                            <option value="-7.25">-7.25</option>
                            <option value="-7.00">-7.00</option>
                            <option value="-6.75">-6.75</option>
                            <option value="-6.50">-6.50</option>
                            <option value="-6.25">-6.25</option>
                            <option value="-6.00">-6.00</option>
                            <option value="-5.75">-5.75</option>
                            <option value="-5.50">-5.50</option>
                            <option value="-5.25">-5.25</option>
                            <option value="-5.00">-5.00</option>
                            <option value="-4.75">-4.75</option>
                            <option value="-4.50">-4.50</option>
                            <option value="-4.25">-4.25</option>
                            <option value="-4.00">-4.00</option>
                            <option value="-3.75">-3.75</option>
                            <option value="-3.50">-3.50</option>
                            <option value="-3.25">-3.25</option>
                            <option value="-3.00">-3.00</option>
                            <option value="-2.75">-2.75</option>
                            <option value="-2.50">-2.50</option>
                            <option value="-2.25">-2.25</option>
                            <option value="-2.00">-2.00</option>
                            <option value="-1.75">-1.75</option>
                            <option value="-1.50">-1.50</option>
                            <option value="-1.25">-1.25</option>
                            <option value="-1.00">-1.00</option>
                            <option value="-0.75">-0.75</option>
                            <option value="-0.50">-0.50</option>
                            <option value="-0.25">-0.25</option>
                            <option value="PL/0">PL/0</option>
                            <option value="+0.25">+0.25</option>
                            <option value="+0.50">+0.50</option>
                            <option value="+0.75">+0.75</option>
                            <option value="+1.00">+1.00</option>
                            <option value="+1.25">+1.25</option>
                            <option value="+1.50">+1.50</option>
                            <option value="+1.75">+1.75</option>
                            <option value="+2.00">+2.00</option>
                            <option value="+2.25">+2.25</option>
                            <option value="+2.50">+2.50</option>
                            <option value="+2.75">+2.75</option>
                            <option value="+3.00">+3.00</option>
                            <option value="+3.25">+3.25</option>
                            <option value="+3.50">+3.50</option>
                            <option value="+3.75">+3.75</option>
                            <option value="+4.00">+4.00</option>
                            <option value="+4.25">+4.25</option>
                            <option value="+4.50">+4.50</option>
                            <option value="+4.75">+4.75</option>
                            <option value="+5.00">+5.00</option>
                            <option value="+5.25">+5.25</option>
                            <option value="+5.50">+5.50</option>
                            <option value="+5.75">+5.75</option>
                            <option value="+6.00">+6.00</option>
                            <option value="+6.25">+6.25</option>
                            <option value="+6.50">+6.50</option>
                            <option value="+6.75">+6.75</option>
                            <option value="+7.00">+7.00</option>
                            <option value="+7.25">+7.25</option>
                            <option value="+7.50">+7.50</option>
                            <option value="+7.75">+7.75</option>
                            <option value="+8.00">+8.00</option>
                            <option value="+8.25">+8.25</option>
                            <option value="+8.50">+8.50</option>
                            <option value="+8.75">+8.75</option>
                            <option value="+9.00">+9.00</option>
                            <option value="+9.25">+9.25</option>
                            <option value="+9.50">+9.50</option>
                            <option value="+9.75">+9.75</option>
                            <option value="+10.00">+10.00</option>
                            <option value="+10.25">+10.25</option>
                            <option value="+10.50">+10.50</option>
                            <option value="+10.75">+10.75</option>
                            <option value="+11.00">+11.00</option>
                            <option value="+11.25">+11.25</option>
                            <option value="+11.50">+11.50</option>
                            <option value="+11.75">+11.75</option>
                            <option value="+12.00">+12.00</option>
                            <option value="+12.25">+12.25</option>
                            <option value="+12.50">+12.50</option>
                            <option value="+12.75">+12.75</option>
                            <option value="+13.00">+13.00</option>
                            <option value="+13.25">+13.25</option>
                            <option value="+13.50">+13.50</option>
                            <option value="+13.75">+13.75</option>
                            <option value="+14.00">+14.00</option>
                            <option value="+14.25">+14.25</option>
                            <option value="+14.50">+14.50</option>
                            <option value="+14.75">+14.75</option>
                            <option value="+15.00">+15.00</option>
                            <option value="+15.25">+15.25</option>
                            <option value="+15.50">+15.50</option>
                            <option value="+15.75">+15.75</option>
                            <option value="+16.00">+16.00</option>
                            <option value="BAL/BALANCE">BAL/BALANCE</option>
                        </select> 
                    </td> 
                    <td>
                        <select class="col-md-6">
                            <option value=" "></option>
                            <option value="-12.00">-12.00</option>
                            <option value="-11.75">-11.75</option>
                            <option value="-11.50">-11.50</option>
                            <option value="-11.25">-11.25</option>
                            <option value="-11.00">-11.00</option>
                            <option value="-10.75">-10.75</option>
                            <option value="-10.50">-10.50</option>
                            <option value="-10.25">-10.25</option>
                            <option value="-10.00">-10.00</option>
                            <option value="-9.75">-9.75</option>
                            <option value="-9.50">-9.50</option>
                            <option value="-9.25">-9.25</option>
                            <option value="-9.00">-9.00</option>
                            <option value="-8.75">-8.75</option>
                            <option value="-8.50">-8.50</option>
                            <option value="-8.25">-8.25</option>
                            <option value="-8.00">-8.00</option>
                            <option value="-7.75">-7.75</option>
                            <option value="-7.50">-7.50</option>
                            <option value="-7.25">-7.25</option>
                            <option value="-7.00">-7.00</option>
                            <option value="-6.75">-6.75</option>
                            <option value="-6.50">-6.50</option>
                            <option value="-6.25">-6.25</option>
                            <option value="-6.00">-6.00</option>
                            <option value="-5.75">-5.75</option>
                            <option value="-5.50">-5.50</option>
                            <option value="-5.25">-5.25</option>
                            <option value="-5.00">-5.00</option>
                            <option value="-4.75">-4.75</option>
                            <option value="-4.50">-4.50</option>
                            <option value="-4.25">-4.25</option>
                            <option value="-4.00">-4.00</option>
                            <option value="-3.75">-3.75</option>
                            <option value="-3.50">-3.50</option>
                            <option value="-3.25">-3.25</option>
                            <option value="-3.00">-3.00</option>
                            <option value="-2.75">-2.75</option>
                            <option value="-2.50">-2.50</option>
                            <option value="-2.25">-2.25</option>
                            <option value="-2.00">-2.00</option>
                            <option value="-1.75">-1.75</option>
                            <option value="-1.50">-1.50</option>
                            <option value="-1.25">-1.25</option>
                            <option value="-1.00">-1.00</option>
                            <option value="-0.75">-0.75</option>
                            <option value="-0.50">-0.50</option>
                            <option value="-0.25">-0.25</option>
                            <option value="SPH/Blank/0">SPH/Blank/0</option>
                            <option value="+0.25">+0.25</option>
                            <option value="+0.50">+0.50</option>
                            <option value="+0.75">+0.75</option>
                            <option value="+1.00">+1.00</option>
                            <option value="+1.25">+1.25</option>
                            <option value="+1.50">+1.50</option>
                            <option value="+1.75">+1.75</option>
                            <option value="+2.00">+2.00</option>
                            <option value="+2.25">+2.25</option>
                            <option value="+2.50">+2.50</option>
                            <option value="+2.75">+2.75</option>
                            <option value="+3.00">+3.00</option>
                            <option value="+3.25">+3.25</option>
                            <option value="+3.50">+3.50</option>
                            <option value="+3.75">+3.75</option>
                            <option value="+4.00">+4.00</option>
                            <option value="+4.25">+4.25</option>
                            <option value="+4.50">+4.50</option>
                            <option value="+4.75">+4.75</option>
                            <option value="+5.00">+5.00</option>
                            <option value="+5.25">+5.25</option>
                            <option value="+5.50">+5.50</option>
                            <option value="+5.75">+5.75</option>
                            <option value="+6.00">+6.00</option>
                            <option value="+6.25">+6.25</option>
                            <option value="+6.50">+6.50</option>
                            <option value="+6.75">+6.75</option>
                            <option value="+7.00">+7.00</option>
                            <option value="+7.25">+7.25</option>
                            <option value="+7.50">+7.50</option>
                            <option value="+7.75">+7.75</option>
                            <option value="+8.00">+8.00</option>
                            <option value="+8.25">+8.25</option>
                            <option value="+8.50">+8.50</option>
                            <option value="+8.75">+8.75</option>
                            <option value="+9.00">+9.00</option>
                            <option value="+9.25">+9.25</option>
                            <option value="+9.50">+9.50</option>
                            <option value="+9.75">+9.75</option>
                            <option value="+10.00">+10.00</option>
                            <option value="+10.25">+10.25</option>
                            <option value="+10.50">+10.50</option>
                            <option value="+10.75">+10.75</option>
                            <option value="+11.00">+11.00</option>
                            <option value="+11.25">+11.25</option>
                            <option value="+11.50">+11.50</option>
                            <option value="+11.75">+11.75</option>
                            <option value="+12.00">+12.00</option>
                        </select> 
                    </td> 
                    <td>
                        <select class="col-md-6">
                            <option value=" "></option>
                            <option value="blank/0">blank/0</option>
                            <option value="001">001</option>
                            <option value="002">002</option>
                            <option value="003">003</option>
                            <option value="004">004</option>
                            <option value="005">005</option>
                            <option value="006">006</option>
                            <option value="007">007</option>
                            <option value="008">008</option>
                            <option value="009">009</option>
                            <option value="010">010</option>
                            <option value="011">011</option>
                            <option value="012">012</option>
                            <option value="013">013</option>
                            <option value="014">014</option>
                            <option value="015">015</option>
                            <option value="016">016</option>
                            <option value="017">017</option>
                            <option value="018">018</option>
                            <option value="019">019</option>
                            <option value="020">020</option>
                            <option value="021">021</option>
                            <option value="022">022</option>
                            <option value="023">023</option>
                            <option value="024">024</option>
                            <option value="025">025</option>
                            <option value="026">026</option>
                            <option value="027">027</option>
                            <option value="028">028</option>
                            <option value="029">029</option>
                            <option value="030">030</option>
                            <option value="031">031</option>
                            <option value="032">032</option>
                            <option value="033">033</option>
                            <option value="034">034</option>
                            <option value="035">035</option>
                            <option value="036">036</option>
                            <option value="037">037</option>
                            <option value="038">038</option>
                            <option value="039">039</option>
                            <option value="040">040</option>
                            <option value="041">041</option>
                            <option value="042">042</option>
                            <option value="043">043</option>
                            <option value="044">044</option>
                            <option value="045">045</option>
                            <option value="046">046</option>
                            <option value="047">047</option>
                            <option value="048">048</option>
                            <option value="049">049</option>
                            <option value="050">050</option>
                            <option value="051">051</option>
                            <option value="052">052</option>
                            <option value="053">053</option>
                            <option value="054">054</option>
                            <option value="055">055</option>
                            <option value="056">056</option>
                            <option value="057">057</option>
                            <option value="058">058</option>
                            <option value="059">059</option>
                            <option value="060">060</option>
                            <option value="061">061</option>
                            <option value="062">062</option>
                            <option value="063">063</option>
                            <option value="064">064</option>
                            <option value="065">065</option>
                            <option value="066">066</option>
                            <option value="067">067</option>
                            <option value="068">068</option>
                            <option value="069">069</option>
                            <option value="070">070</option>
                            <option value="071">071</option>
                            <option value="072">072</option>
                            <option value="073">073</option>
                            <option value="074">074</option>
                            <option value="075">075</option>
                            <option value="076">076</option>
                            <option value="077">077</option>
                            <option value="078">078</option>
                            <option value="079">079</option>
                            <option value="080">080</option>
                            <option value="081">081</option>
                            <option value="082">082</option>
                            <option value="083">083</option>
                            <option value="084">084</option>
                            <option value="085">085</option>
                            <option value="086">086</option>
                            <option value="087">087</option>
                            <option value="088">088</option>
                            <option value="089">089</option>
                            <option value="090">090</option>
                            <option value="091">091</option>
                            <option value="092">092</option>
                            <option value="093">093</option>
                            <option value="094">094</option>
                            <option value="095">095</option>
                            <option value="096">096</option>
                            <option value="097">097</option>
                            <option value="098">098</option>
                            <option value="099">099</option>
                            <option value="100">100</option>
                            <option value="101">101</option>
                            <option value="102">102</option>
                            <option value="103">103</option>
                            <option value="104">104</option>
                            <option value="105">105</option>
                            <option value="106">106</option>
                            <option value="107">107</option>
                            <option value="108">108</option>
                            <option value="109">109</option>
                            <option value="110">110</option>
                            <option value="111">111</option>
                            <option value="112">112</option>
                            <option value="113">113</option>
                            <option value="114">114</option>
                            <option value="115">115</option>
                            <option value="116">116</option>
                            <option value="117">117</option>
                            <option value="118">118</option>
                            <option value="119">119</option>
                            <option value="120">120</option>
                            <option value="121">121</option>
                            <option value="122">122</option>
                            <option value="123">123</option>
                            <option value="124">124</option>
                            <option value="125">125</option>
                            <option value="126">126</option>
                            <option value="127">127</option>
                            <option value="128">128</option>
                            <option value="129">129</option>
                            <option value="130">130</option>
                            <option value="131">131</option>
                            <option value="132">132</option>
                            <option value="133">133</option>
                            <option value="134">134</option>
                            <option value="135">135</option>
                            <option value="136">136</option>
                            <option value="137">137</option>
                            <option value="138">138</option>
                            <option value="139">139</option>
                            <option value="140">140</option>
                            <option value="141">141</option>
                            <option value="142">142</option>
                            <option value="143">143</option>
                            <option value="144">144</option>
                            <option value="145">145</option>
                            <option value="146">146</option>
                            <option value="147">147</option>
                            <option value="148">148</option>
                            <option value="149">149</option>
                            <option value="150">150</option>
                            <option value="151">151</option>
                            <option value="152">152</option>
                            <option value="153">153</option>
                            <option value="154">154</option>
                            <option value="155">155</option>
                            <option value="156">156</option>
                            <option value="157">157</option>
                            <option value="158">158</option>
                            <option value="159">159</option>
                            <option value="160">160</option>
                            <option value="161">161</option>
                            <option value="162">162</option>
                            <option value="163">163</option>
                            <option value="164">164</option>
                            <option value="165">165</option>
                            <option value="166">166</option>
                            <option value="167">167</option>
                            <option value="168">168</option>
                            <option value="169">169</option>
                            <option value="170">170</option>
                            <option value="171">171</option>
                            <option value="172">172</option>
                            <option value="173">173</option>
                            <option value="174">174</option>
                            <option value="175">175</option>
                            <option value="176">176</option>
                            <option value="177">177</option>
                            <option value="178">178</option>
                            <option value="179">179</option>
                            <option value="180">180</option>
                        </select> 
                    </td> 
                    <td>
                        <select class="col-md-6">
                            <option value=" "></option>
                            <option value="0"></option>
                            <option value="+0.25">+0.25</option>
                            <option value="+0.50">+0.50</option>
                            <option value="+0.75">+0.75</option>
                            <option value="+1.00">+1.00</option>
                            <option value="+1.25">+1.25</option>
                            <option value="+1.50">+1.50</option>
                            <option value="+1.75">+1.75</option>
                            <option value="+2.00">+2.00</option>
                            <option value="+2.25">+2.25</option>
                            <option value="+2.50">+2.50</option>
                            <option value="+2.75">+2.75</option>
                            <option value="+3.00">+3.00</option>
                            <option value="+3.25">+3.25</option>
                            <option value="+3.50">+3.50</option>
                            <option value="+3.75">+3.75</option>
                            <option value="+4.00">+4.00</option>
                            <option value="+4.25">+4.25</option>
                            <option value="+4.50">+4.50</option>
                            <option value="+4.75">+4.75</option>
                            <option value="+5.00">+5.00</option>
                            <option value="+5.25">+5.25</option>
                            <option value="+5.50">+5.50</option>
                            <option value="+5.75">+5.75</option>
                            <option value="+6.00">+6.00</option>
                        </select> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>

    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>
    <script src="/js/colors.js"></script>
    @endsection
</html>
