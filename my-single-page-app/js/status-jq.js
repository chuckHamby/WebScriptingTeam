function addListeners() {
    $("#statusId").click(function(event){
        event.preventDefault();
        $.ajax({
            url: "http://localhost/status",
            type: "GET",
            dataType: "json",
            crossDomain: true,
            cache: false,
            success: function(response) {
                try {
                    var status = response;
                    $("#contentDiv").append("<table id='tbl'>");
                    $("#tbl").append("<tr id='row-1'>");
                    $("#row-1").append("<td id='cell-1'>");
                    $("#cell-1").text(status.status_code);
                    $("#row-1").append("<td id='cell-2'>");
                    $("#cell-2").text(status.status_message);
                } catch (ex) {
                    $("#contentDiv").html("Error parsing: " + ex);
                }
            },
            error: function(response) {

            },
            accepts: "application/json"
        });
    });

    $("#clearId").click(function(event){
        $("#contentDiv").innerHTML
    });
}//function addListeners
