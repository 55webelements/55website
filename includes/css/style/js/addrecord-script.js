loadJavaScriptFile("/style/js/jquery.validate.min.js");
loadJavaScriptFile("/style/js//jquery.metadata.min.js");

function loadJavaScriptFile(jspath) {
    document.write('<script type="text/javascript" src="' + jspath + '"><\/script>');
}

function InitializeValidation() {
    var validator = $("#sgp").bind("invalid-form.validate", function () { }).validate({
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.appendTo(element.parent("input").next("span"));
        },
        success: function (label) {
            label.text("ok!").addClass("success");
        }
    });
}



