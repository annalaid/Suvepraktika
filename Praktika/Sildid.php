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
 
<tr>
<td>Sildi nimi:</td>
<td><input name="labelinput" id="labelinput" type="text" value="<?php echo $label; ?>"><span><?php echo $labelsubmiterror; ?></span>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<input name="addlabel" type="submit" value="Lisa">
</table>

<table class="styled-table">
    <thead>
        <tr>
            <th>Silt</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Silt</td>
            <td></td>
        </tr>
        <tr class="active-row">
            <td></td>
            <td></td>
        </tr>
        <!-- and so on... -->
    </tbody>
</table>

