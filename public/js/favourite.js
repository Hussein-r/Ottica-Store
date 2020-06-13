


$('#sortByselect').change(function(){
    option =$(this).children("option:selected").val();
    console.log(option);
    $.ajax({
        url: /sort/+option,
        type: 'get',
        data: {
            _token: $("#csrf-token")[0].content,
            option:option 
        },
        success: function(response){
            console.log(response.glasses);
            var glass = @JSON($glasses);
            window.location = /sort/+option;

        },
        error: function(response) {
            console.log(response);
            alert(data.option);
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