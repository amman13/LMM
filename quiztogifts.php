<?php

// Connect to the MySQL database
$host = "localhost";
$user = "cs329e_mitra_charolia";
$pwd = "Bother+dry3macho";
$dbs = "cs329e_mitra_charolia";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
$table = "gifts";


$methodarray =array();
if(!empty($_POST['method'])){
        foreach($_POST['method'] as $selected){
                array_push($methodarray,$selected);
        }
}

if (!empty($_POST["budget"])){
        $budget = $_POST["budget"];
        $bval = explode("-",$budget);
        $min = floatval($bval[0]);
        $max = floatval($bval[1]);
}

print <<<TOP
        <html>
        <head>
                <title> Gifts </title>
                <meta charset='UTF-8'>
                <link rel="stylesheet" type="text/css" href="lmm.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        </head>
        <body>
                <div class="home1">
<div class="nav2">
<nav style="background-color:#FAEBD7" class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><img src="logoRed.png" width="30" height="30" class="d-inline-block align-top" alt="">Last Minute Man</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link"  href="lmm.html">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="gifts.html">Gifts</a>
      <a class="nav-item nav-link" href="experiences.html">Resources</a>
      <a class="nav-item nav-link" href="contact_us.html">Contact Us</a>
    </div>
  </div>
</nav>
</div>
<div class="quote">
<h3> Top Results </h3>
<p>Take it easy, my man.  You always have time.</p>
</div>

<div class="giftsimages">
<div class="resultTitle">
</div>
<div class="items">

<div class="item">
<input type="image" src="giftspics/KendraScottNecklace.jpg">
<p> Name: Kendra Scott Necklace Collection </p>
<p> Price: $50.00 - $100.00 </p>
<p> Method: Instant Pickup </p>
<p> Carrying Store: Kendra Scott </p>
<p> Distance: 15 min </p>
<p> Store Hours: 9AM - 7PM </p>
</div>

TOP;

if (isset(($_POST["budget"])) && (isset($_POST["method"])))
{
        if (count($methodarray) != 1){
                $result = mysqli_query($connect,"SELECT * FROM $table WHERE Price BETWEEN \"$min\" AND \"$max\"");
                while ($row = $result->fetch_row())
                {
                                echo "<div class=\"item\">";
                                echo "<input type=\"image\" src=\"" . $row[6] ."\">";
                                echo "<p> Name:" . $row[1] . " </p>";
                                echo "<p> Price:$" . $row[2] . " </p>";
                                echo "<p> Method:" . $row[3] . "</p>";
                                echo "<p> Carrying Store:" . $row[4] . "</p>";
                                echo "<p> Store Hours:" . $row[5] . "</p>";
                                echo "</div>";
                        }
                $result->free();
        }
        else {
                $result = mysqli_query($connect,"SELECT * FROM $table WHERE Method=\"$methodarray[0]\" AND Price BETWEEN \"$min\" AND \"$max\"");
                while ($row = $result->fetch_row())
                {
                        echo "<div class=\"item\">";
                                echo "<input type=\"image\" src=\"" . $row[6] ."\">";
                                echo "<p> Name:" . $row[1] . " </p>";
                                echo "<p> Price:$" . $row[2] . " </p>";
                                echo "<p> Method:" . $row[3] . "</p>";
                                echo "<p> Carrying Store:" . $row[4] . "</p>";
                                echo "<p> Store Hours:" . $row[5] . "</p>";
                                echo "</div>";
                }

                $result->free();
        }
}
else if ((!isset(($_POST["budget"]))) && (isset($_POST["method"])))
{
         if (count($methodarray) != 1){
                $result = mysqli_query($connect,"SELECT * FROM $table");
                while ($row = $result->fetch_row())
                {
                        echo "<div class=\"item\">";
                                echo "<input type=\"image\" src=\"" . $row[6] ."\">";
                                echo "<p> Name:" . $row[1] . " </p>";
                                echo "<p> Price:$" . $row[2] . " </p>";
                                echo "<p> Method:" . $row[3] . "</p>";
                                echo "<p> Carrying Store:" . $row[4] . "</p>";
                                echo "<p> Store Hours:" . $row[5] . "</p>";
                                echo "</div>";
                        }
                $result->free();
         }
         else {
                $result = mysqli_query($connect,"SELECT * FROM $table WHERE Method=\"$methodarray[0]\"");
                while ($row = $result->fetch_row())
                {
                        echo "<div class=\"item\">";
                                echo "<input type=\"image\" src=\"" . $row[6] ."\">";
                                echo "<p> Name:" . $row[1] . " </p>";
                                echo "<p> Price:$" . $row[2] . " </p>";
                                echo "<p> Method:" . $row[3] . "</p>";
                                echo "<p> Carrying Store:" . $row[4] . "</p>";
                                echo "<p> Store Hours:" . $row[5] . "</p>";
                                echo "</div>";

                        }
                $result->free();
         }
}
else if ((isset(($_POST["budget"]))) && ((!isset($_POST["method"])))){
         $result = mysqli_query($connect,"SELECT * FROM $table WHERE Price BETWEEN \"$min\" AND \"$max\"");
                while ($row = $result->fetch_row())
                {
                        echo "<div class=\"item\">";
                                echo "<input type=\"image\" src=\"" . $row[6] ."\">";
                                echo "<p> Name:" . $row[1] . " </p>";
                                echo "<p> Price:$" . $row[2] . " </p>";
                                echo "<p> Method:" . $row[3] . "</p>";
                                echo "<p> Carrying Store:" . $row[4] . "</p>";
                                echo "<p> Store Hours:" . $row[5] . "</p>";
                                echo "</div>";

                        }
                $result->free();
}
else {
        $result = mysqli_query($connect,"SELECT * FROM $table");
                while ($row = $result->fetch_row())
                {
                        echo "<div class=\"item\">";
                                echo "<input type=\"image\" src=\"" . $row[6] ."\">";
                                echo "<p> Name:" . $row[1] . " </p>";
                                echo "<p> Price:$" . $row[2] . " </p>";
                                echo "<p> Method:" . $row[3] . "</p>";
                                echo "<p> Carrying Store:" . $row[4] . "</p>";
                                echo "<p> Store Hours:" . $row[5] . "</p>";
                                echo "</div>";

                        }
                $result->free();
}


print <<<BOTTOM
</div>
</div>
</body>
</html>
BOTTOM;


?>

