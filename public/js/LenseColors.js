$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(function() {
    changeImage();
});

$("#LenseColor").change(function() {
    changeImage();
});

function changeImage() {
    console.log("Hussein");
    var lensecolor = $("#LenseColor").val();
    $.ajax({
        type: "POST",
        url: "/changeLenseColor",
        data: { _token: $("#csrf-token")[0].content, lensecolor: lensecolor },
        success: function(data) {
            console.log(data);
            myImage = document.getElementById("coloredEye");
            myImage.src = "/images/" + data;
        }
    });
}

function changeNumber(number) {
    var myHtml =
        "<input type='number' class='mb-1' id='duration' name='duration[]' placeholder='Please specify time by days'><input type='number' class='mb-2' id='price' name='price[]' placeholder='Price'>";
    $("#useandprice").html(myHtml.repeat(number));
}
$("#numbers").change(function() {
    changeNumber(this.value);
});
