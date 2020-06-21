
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(".filteration").change(function(){
    // console.log("ajax");
    // $('#filter_data').html('<div id="loading"></div>');
    // var action ='fetch_data';
    var maximum_price = $("input[id='maximum_price']:checked").val();
    var brand = [];
    brand[0]=$("input[id='brand']:checked").val();
    var gender =[];
    gender[0]= $("input[id='gender']:checked").val();
    var face_shape =[];
    face_shape[0]= $("input[id='face_shape']:checked").val();
    var frame_shape=[];
    frame_shape[0] =$("input[id='frame_shape']:checked").val();
    var color =[];
    color[0]=$("input[id='color']:checked").val();
    var secondary_color =[];
    secondary_color[0]=$("input[id='secondary_color']:checked").val();
    var material =[];
    material[0]= $("input[id='material']:checked").val();
    var secondary_material =[];
    secondary_material[0]= $("input[id='secondary_material']:checked").val();
    var fit=[];
    fit[0]= $("input[id='fit']:checked").val();
    console.log(maximum_price);
    console.log(brand);


    $.ajax({
            // headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            url: '/Sunfilters',
            type: 'post',
            dataType :'html',
            data: {_token: $("#csrf-token")[0].content,maximum_price:maximum_price, brand:brand, gender:gender,
                 face_shape:face_shape,frame_shape:frame_shape,color:color,
                 color:color,secondary_color:secondary_color,material:material
                 ,secondary_material:secondary_material,fit:fit},
            success:function(data){
                $('#filter_data').html(data);
                // $("#post-data").append(data.html);
                // console.log($data);
            }
    });
});
