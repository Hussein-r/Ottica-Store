

$("#sorting").change(function(){
    console.log("ajax");
    // $('#filter_data').html('<div id="loading"></div>');
    // var action ='fetch_data';
    // option =$(this).children("option:selected").val();
    var option = document.getElementById('sorting').value;
    // var newest = $("input[id='newest']").val();
    // var alphabet =$("input[id='alphabet']").val();
    // var non_alphabet = $("input[id='non-alphabet']").val();
  
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


