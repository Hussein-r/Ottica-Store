// onload(function(){
//     if()
// })


$('#sortByselect').change(function(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/sort/{value}",
    // url: '{{ route('sort', ['id' => Auth::->id]) }}',
        type: 'PATCH',
        data: {"sort": $(this).children("option:selected").val()},
        success: function(response){
            console.log(response);
        },
        error: function(response) {
            console.log(response);
            alert(response);
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