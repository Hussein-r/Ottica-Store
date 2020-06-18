// var select = document.getElementById("productColor");
// select.onchange = function() {
//     this.form.submit();
// };
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$("#productColor").change(function() {
    var color = $("#productColor").val();
    var code = $(".id").val();
    $.ajax({
        type: "POST",
        url: "/changecolor",
        data: { _token: $("#csrf-token")[0].content, color: color, code: code },
        success: function(data) {
            window.location = /glass/ + data;
        }
    });
});

var x = document.getElementById("mydiv");
var big_div = document.getElementById("the_big_div");
$("#defaultCheck1").change(function() {
    if (this.checked) {
        big_div.style.display = "inline-block";
        x.style.display = "inline-block";
        $("#maincategory").prop("disabled", true);
    } else {
        x.style.display = "none";
        big_div.style.display = "none";
    }
});

function validateFirstForm() {
    var checkTypeRadio = document.querySelector(
        'input[name="single_lense_type"]:checked'
    );
    var checkColorRadio = document.querySelector(
        'input[name="single_lense_color"]:checked'
    );
    var isValid = true;
    if (checkTypeRadio == null || checkColorRadio == null) {
        isValid = false;
    }
    return isValid;
}
function validateSecondForm() {
    var checkProgressiveType = document.querySelector(
        'input[name="progressive_lense_type"]:checked'
    );
    var checkProgressiveColor = document.querySelector(
        'input[name="progressive_lense_color"]:checked'
    );
    var isValid = true;
    if (checkProgressiveType == null || checkProgressiveColor == null) {
        isValid = false;
    }
    return isValid;
}

function validateThirdForm() {
    var checkBifocalType = document.querySelector(
        'input[name="bifocal_lense_type"]:checked'
    );
    var checkBifocalColor = document.querySelector(
        'input[name="bifocal_lense_color"]:checked'
    );
    var isValid = true;
    if (checkBifocalType == null || checkBifocalColor == null) {
        isValid = false;
    }
    return isValid;
}
function changeFirstForm() {
    console.log("Hussein");
    if (validateFirstForm()) {
        $("#savesingle").removeAttr("disabled");
    }
}

function changeSecondForm() {
    if (validateSecondForm()) {
        $("#saveprogressive").removeAttr("disabled");
    }
}
function changeThirdForm() {
    if (validateThirdForm()) {
        $("#savebifocal").removeAttr("disabled");
    }
}

var is_single = false;
var savesingle = document.getElementById("savesingle");
var presdiv = document.getElementById("presdiv");
var singlemessage = document.getElementById("singlelensemessage");
var singlemessageli = document.getElementById("single_lense_message");
savesingle.onclick = function() {
    is_single = true;
    singlemessage.style.display = "block";
    singlemessageli.textContent =
        "You chose single vision lense" +
        " " +
        document.querySelector('input[name="single_lense_type"]:checked').value;
    presdiv.style.display = "block";
    $("#progressivebutton").prop("disabled", true);
    $("#bifocalbutton").prop("disabled", true);
};

var is_progressive = false;
var saveprogressive = document.getElementById("saveprogressive");
var presdiv = document.getElementById("presdiv");
var progressivemessage = document.getElementById("progressivelensemessage");
var progressivemessageli = document.getElementById("progressive_lense_message");
saveprogressive.onclick = function() {
    is_progressive = true;
    progressivemessage.style.display = "block";
    progressivemessageli.textContent =
        "You chose progressive vision lense" +
        " " +
        document.querySelector('input[name="progressive_lense_type"]:checked')
            .value;
    presdiv.style.display = "block";
    $("#singlebutton").prop("disabled", true);
    $("#bifocalbutton").prop("disabled", true);
};

var is_bifocal = false;
var savebifocal = document.getElementById("savebifocal");
var presdiv = document.getElementById("presdiv");
var bifocalmessage = document.getElementById("bifocallensemessage");
var bifocalmessageli = document.getElementById("bifocal_lense_message");
savebifocal.onclick = function() {
    is_bifocal = true;
    bifocalmessage.style.display = "block";
    bifocalmessageli.textContent =
        "You chose bifocal vision lense" +
        " " +
        document.querySelector('input[name="bifocal_lense_type"]:checked')
            .value;
    presdiv.style.display = "block";
    $("#progressivebutton").prop("disabled", true);
    $("#singlebutton").prop("disabled", true);
};

var is_image = false;
var imagemessage = document.getElementById("presimage");
var imagesave = document.getElementById("saveimage");
imagesave.onclick = function() {
    is_image = true;
    imagemessage.style.display = "block";
};

var manual = false;
var tablemessage = document.getElementById("prestable");
var tablesave = document.getElementById("savetable");
tablesave.onclick = function() {
    manual = true;
    tablemessage.style.display = "block";
};

var checkBox = document.getElementById("defaultCheck1");
var object = document.getElementById("submitorder");
object.onclick = function() {
    if (checkBox.checked == true) {
        if (is_single) {
            $("#singleform :input")
                .not(":submit")
                .clone()
                .hide()
                .appendTo("#mainform");
            if (is_image) {
                $("#imageform :input")
                    .not(":submit")
                    .clone()
                    .hide()
                    .appendTo("#mainform");
            } else if (manual) {
                $("#tableform :input")
                    .not(":submit")
                    .clone()
                    .hide()
                    .appendTo("#mainform");
            }
        } else if (is_progressive) {
            $("#progressiveform :input")
                .not(":submit")
                .clone()
                .hide()
                .appendTo("#mainform");
            if (is_image) {
                $("#imageform :input")
                    .not(":submit")
                    .clone()
                    .hide()
                    .appendTo("#mainform");
            } else if (manual) {
                $("#tableform :input")
                    .not(":submit")
                    .clone()
                    .hide()
                    .appendTo("#mainform");
            }
        } else if (is_bifocal) {
            $("#bifocalform :input")
                .not(":submit")
                .clone()
                .hide()
                .appendTo("#mainform");
            if (is_image) {
                $("#imageform :input")
                    .not(":submit")
                    .clone()
                    .hide()
                    .appendTo("#mainform");
            } else if (manual) {
                $("#tableform :input")
                    .not(":submit")
                    .clone()
                    .hide()
                    .appendTo("#mainform");
            }
        }
        if (is_image) {
            $("#imageform :input")
                .not(":submit")
                .clone()
                .hide()
                .appendTo("#mainform");
        } else if (manual) {
            $("#tableform :input")
                .not(":submit")
                .clone()
                .hide()
                .appendTo("#mainform");
        }
    }
};

function openPageone(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent1");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink1");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks[i].style.color = "grey";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = color;
    elmnt.style.color = "white";
}
function openPagetwo(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink2");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks[i].style.color = "grey";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = color;
    elmnt.style.color = "white";
}
// Get the element with id="defaultOpen" and click on it
$(".defaultOpen").each(function() {
    $(this).click();
});
