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
        "<input type='number' id='duration' name='duration[]' placeholder='Please specify time by days'><input type='number' class='mb-2 ml-2' id='price' name='price[]' placeholder='Price'><br>";
    $("#useandprice").html(myHtml.repeat(number));
}
$("#numbers").change(function() {
    console.log("hussein");
    changeNumber(this.value);
});

var addedPrescription = false;

$("input[name='presType']").change(function() {
    if ($("#table").is(":checked")) {
        $("#tableform").prop("hidden", false);
        $("#imageform").prop("hidden", true);
    } else {
        $("#imageform").prop("hidden", false);
        $("#tableform").prop("hidden", true);
    }
});

function addPrescription() {
    var presType = document.querySelector('input[name="presType"]:checked')
        .value;
    if (presType == "table") {
        $("#tableform select").each(function() {
            $(
                "<input type='hidden' name='" +
                    $(this).attr("name") +
                    "' value='" +
                    $(this).val() +
                    "' />"
            ).appendTo("#mainform");
        });
        $("#submitorder").prop("hidden", false);
    } else if (presType == "image") {
        $("#imageform :input")
            .not(":submit")
            .clone()
            .hide()
            .appendTo("#mainform");
        alert("Hussein");
        $("#submitorder").prop("hidden", false);
    }
}
