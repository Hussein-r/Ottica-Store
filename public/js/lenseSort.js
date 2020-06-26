

$("#sorting").change(function(){
    console.log("ajax");
    var option = document.getElementById('sorting').value;
    console.log(option);
    
    // console.log($data);
    $.ajax({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/Lensesort',
            type: 'post',
            dataType :'html',
            data: {_token: $("#csrf-token")[0].content, option:option,
            },
            success:function(data){
                $('#sorted_data').html(data);
                
            }
    });
});


