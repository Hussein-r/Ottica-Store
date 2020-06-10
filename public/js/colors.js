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
