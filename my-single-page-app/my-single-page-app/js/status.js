function addListeners() {
    var chkStatusBtn = document.getElementById("statusId");
    if (chkStatusBtn.attachEvent) {
        chkStatusBtn.attachEvent("click", function(event){
            process(event);
        });
    } else if (chkStatusBtn.addEventListener) {
        chkStatusBtn.addEventListener("click", function(event){
            process(event);
        });
    }
}//function addListeners

function process(event) {
    event.preventDefault();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            success(this);
        } else if (this.readyState == 4 && this.status != 200) {
            fail(this);
        }
    };
    xhttp.open("GET", "http://localhost/status", true);
    xhttp.send();
}

function fail(xhttp) {
    document.getElementById("contentDiv").innerText = "Failed";
}

function success(xhttp) {
    var response = xhttp.responseText;
    var myJson = JSON.parse(response);
    var table = document.createElement("TABLE");
    var row = document.createElement("TR");
    var cell1 = document.createElement("TD");
    cell1.appendChild(document.createTextNode(myJson.status_code));

    var cell2 = document.createElement("TD");
    cell2.appendChild(document.createTextNode(myJson.status_message));

    row.appendChild(cell1);
    row.appendChild(cell2);
    table.appendChild(row);

    var child = document.getElementById("contentDiv").firstChild;
    document.getElementById("contentDiv").replaceChild(table, child);
}