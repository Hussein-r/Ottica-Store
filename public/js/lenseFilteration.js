
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});


$(".filteration").change(function(){
    console.log("ajax");
    // $('#filter_data').html('<div id="loading"></div>');
    // var action ='fetch_data';
    var brand = $("input[id='brand']:checked").val();
    var type = $("input[id='type']:checked").val();
    var manufacturer = $("input[id='manufacturer']:checked").val();
   

    $.ajax({
            // headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            url: '/Lensefilters',
            type: 'post',
            dataType :'html',
            data: {_token: $("#csrf-token")[0].content, brand:brand,
            type:type,manufacturer:manufacturer},
            success:function(data){
                $('#filter_data').html(data);
                // console.log($data);
            }
    });
});
