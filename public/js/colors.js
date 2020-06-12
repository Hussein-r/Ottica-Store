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
$("#defaultCheck1").change(function() {
    if (this.checked) {
        x.style.display = "inline-block";
    } else {
        x.style.display = "none";
    }
});

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

function openPage(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
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
