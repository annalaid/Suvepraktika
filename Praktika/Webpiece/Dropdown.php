<!DOCTYPE html>
<html lang="et">
<head>
    <title>Web page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="Styles/dropdown.css">
</head>
<body>
    <main>
        <nav>
            <div class="header">
                <div class="dropdown" id="first_dd">
                    <a href="Mainpage.php" class="dropbtn">Avaleht</a>
                    <div class="dropdown-content">
                        <a href="?logout=1">Logi välja</a>
                    </div>
                </div>
                <div class="dropdown" id="second_dd">
                    <a href="Student.php" class="dropbtn">Tudengid</a>
                    <div class="dropdown-content">
                        <a href="AddStudent.php">Lisa tudengeid</a>
                        <a href="StudentPayment.php">Halda maksevõlgnevusega tudengeid</a>
                        <a href="StudentVacation.php">Halda õppepuhkusel olevaid tudengeid</a>
                    </div>
                </div>
                <div class="dropdown" id="third_dd">
                    <a href="Tags.php" class="dropbtn">Sildid</a>
                </div>
            </div>
        </nav>
        <hr>