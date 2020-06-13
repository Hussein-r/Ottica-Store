// onload(function(){
//     if()
// })


$('#sortByselect').change(function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "sort",
        type: 'post',
        data: {_token: $("#csrf-token")[0].content, option: $(this).children("option:selected").val()},
        success: function(data){
            console.log(data);
            window.location = /glass/+data;
        },
        error: function(data) {
            console.log(data);
            alert(data);
           }
    })
});


function updateFavorite(glass,love) {
    
    $.ajax({
        type: "GEt",
        url: "/fav",
        data: {
            glass: glass
        },
        success: function(response) {
            console.log(response);
            if (response.like == "yes") {
                console.log(love);
                love.style.color = "red";
            } else {
                console.log(love.className);
                love.style.color = "gray";
            }
        },
        error: function(response) {
           
         console.log(response)
            alert(response);
        }
    });
}