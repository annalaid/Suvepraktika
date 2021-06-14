<?php

require("config.php");

$label = "";
$labelsubmiterror = "";
if (isset($_POST["submit"])){
    if (!empty($_POST["labelinput"])){
        $label = ($_POST["labelinput"]);
    }
    else {
        $labelsubmiterror = "Palun sisesta sildi nimetus";
    }
}


?>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="style.css">
<title>Sildid</title>

</head>
 
<body>
<h3>Sildid</h3>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

 
<table align="center" cellpadding = "20">
<table border="1">


</table>
 

<td colspan="2" align="center">
<!--<input name="addlabel" type="submit" value="Lisa">-->
<style>

.container{overflow: hidden}
</style>
</table>
<table class="styled-table">
Silt:
<input type="text" name="label" id="label" />
<br /><br />
<input type="button" value="Lisa" onClick="addRow()" id="add">
<br /><br />
<table class="styled-table">
<table id="table" border="1">
<thead id="table-head">
<tr>
    <th>Silt</th>
    
</tr>
</thead>
<tbody id="table-body">
</tbody>
</table>
<script>
function addRow() {
"use strict";

var tableBody = document.getElementById("table-body");
var td1 = document.createElement("td");
var td2 = document.createElement("td");   
var row = document.createElement("row");

td1.innerHTML = document.getElementById("label").value;


row.appendChild(td1);
row.appendChild(td2);


tableBody.appendChild(row);
}
</script>
    

