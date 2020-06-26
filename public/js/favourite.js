// promocode ------------

$("#promocode").click(function() {
    coupon = $("#coupon").val();
    console.log(coupon);

    $.ajax({
        url: "promocode",
        type: "post",
        data: {
            _token: $("#csrf-token")[0].content,
            coupon: coupon
        },
        success: function(response) {
            console.log(response.total);
            console.log(response.discount);
            $("#total_price").html(response.total);
            $("#promo").append("<span>Promocode</span>");
            $("#discount").append(`<span>-${response.discount}</span>`);
            $("#alertappend")
                .append(`<div class="alert alert-info" style="margin:20px auto; text-align:center; width:400px">
            Promocode added successfully..
        </div>`);
        },
        error: function() {
            alert("ajax failed");
        }
    });
});

// sorting glasses ----------

$('#sortByPrice').change(function(){
    option = $(this).children("option:selected").val();
    glassType = document.getElementById("glassType").value;
    console.log(option);
    console.log(glassType);
    $.ajax({
        url: '/price',
        type: 'post',
        data:{
            _token: $("#csrf-token")[0].content,
            option :option,
            glassType :glassType,
        },
        success : function(data){
            console.log(data)
            $('#filter_data').html(data);
        },
        error: function(){
            console.log('failed');
        }
    })

    
})



// $("#sortByselect").change(function() {
//     option = $(this)
//         .children("option:selected")
//         .val();
//     type = document.getElementById("glassType").value;
//     area = document.getElementById("glassArea");
//     console.log(option);
//     console.log(type);
//     $.ajax({
//         url: "/price",
//         method: "post",
//         dataType: "json",
//         data: {
//             _token: $("#csrf-token")[0].content,
//             option: option,
//             type: type
//         },
//         success: function(sorted) {
//             console.log(sorted);

//             glasses = response.glasses;
//             arr = Object.values(glasses);
//             console.log(arr);
//             area.innerHTML = "";

//             arr.forEach(glass => {
//                 temp = `<div class='single-product-wrapper mt-6 col-md-4 h-30' style='display:inline-block;'><div class='product-img' ><img src='images/${
//                     glass.images
//                 } alt=''><div class='product-favourite'><a ${
//                     glass.favourite ? "style=color:red;" : ""
//                 } id='love'  onclick='return(updateFavorite(${
//                     glass.id
//                 },this))' class='favme fa fa-heart'></a></div></div><div class='product-description'><span>${
//                     glass.glass_code
//                 } ${glass.id}</span><a  href='#'><h3 style='margin-left:10%;'>${
//                     glass.brand_id
//                 }</h6></a><p style='margin-left:10%;' class='product-price'><strong class='price'><del>${
//                     glass.price_before_discount
//                 }</del>${
//                     glass.price_after_discount
//                 }</strong></p><div class='hover-content'><div class='add-to-cart-btn'><a href='/glass/${
//                     glass.id
//                 }' class='btn essence-btn'>View Details</a></div></div></div></div>`;
//                 // area.append(temp)
//                 area.innerHTML += temp;
//             });
//         },
//         error: function(response) {
//             console.log(response.option);
//         }
//     });
// });


// favourite glasses ----------------

function updateFavorite(glass, love) {
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
            window.location.href = "login";
        }
    });
}
