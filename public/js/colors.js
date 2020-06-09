var select = document.getElementById("productColor");
select.onchange = function() {
    this.form.submit();
};

function myFunction() {
    var x = document.getElementById("mydiv");
    if (x.style.display === "none") {
        x.style.display = "inline-block";
    } else {
        x.style.display = "none";
    }
}
