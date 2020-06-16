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
    } else {
        x.style.display = "none";
        big_div.style.display = "none";
    }
});

function validateFirstForm() {
    var isValid = true;
    $(".form1-field").each(function() {
        if ($(this).val() === "") isValid = false;
    });
    return isValid;
}
function validateSecondForm() {
    var isValid = true;
    $(".form2-field").each(function() {
        if ($(this).val() === "") isValid = false;
    });
    return isValid;
}
function validateThirdForm() {
    var isValid = true;
    $(".form3-field").each(function() {
        if ($(this).val() === "") isValid = false;
    });
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
savesingle.onclick = function() {
    is_single = true;
    presdiv.style.display = "block";
};

var is_progressive = false;
var saveprogressive = document.getElementById("saveprogressive");
var presdiv = document.getElementById("presdiv");
savesingle.onclick = function() {
    is_progressive = true;
    presdiv.style.display = "block";
};

var is_bifocal = false;
var savebifocal = document.getElementById("savebifocal");
var presdiv = document.getElementById("presdiv");
savesingle.onclick = function() {
    is_bifocal = true;
    presdiv.style.display = "block";
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
document.getElementById("defaultOpen").click();
document.getElementById("defaultOpen1").click();
