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
            cosole.log("ajax failed");
        }
    });
});

// sorting glasses ----------

$("#sortByPrice").change(function() {
    option = $(this)
        .children("option:selected")
        .val();
    glassType = document.getElementById("glassType").value;
    console.log(option);
    console.log(glassType);
    $.ajax({
        url: "/price",
        type: "post",
        data: {
            _token: $("#csrf-token")[0].content,
            option: option,
            glassType: glassType
        },
        success: function(data) {
            console.log(data);
            $("#filter_data").html(data);
        },
        error: function() {
            console.log("failed");
        }
    });
});

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
            // if (response.like == "yes") {
            //     console.log(love);
            //     love.style.color = "red";
            // } else {
            //     console.log(love.className);
            //     love.style.color = "gray";
            // }
        },
        error: function(response) {
            window.location.href = "login";
        }
    });
}
