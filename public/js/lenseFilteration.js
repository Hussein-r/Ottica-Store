
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});


$(".filteration").change(function(){
    // console.log("ajax");
    // $('#filter_data').html('<div id="loading"></div>');
    // var action ='fetch_data';
    var brand =[];
    brand[0]= $("input[id='brand']:checked").val();
    var type = [];
    type[0]=$("input[id='type']:checked").val();
    var manufacturer =[];
    manufacturer[0]= $("input[id='manufacturer']:checked").val();
    var duration =[];
    duration[0]= $("input[id='duration']:checked").val();
   

    $.ajax({
            // headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            url: '/Lensefilters',
            type: 'post',
            dataType :'html',
            data: {_token: $("#csrf-token")[0].content, brand:brand,
            type:type,manufacturer:manufacturer,duration:duration},
            success:function(data){
                $('#filter_data').html(data);
                // console.log($data);
            }
    });
});
