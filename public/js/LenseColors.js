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
