// onload(function(){
//     if()
// })


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
                love.style.color = "blue";
            }
        },
        error: function(response) {
           
         console.log(response)
            // alert(response);
        }
    });
}