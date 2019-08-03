<?php
mysql_connect("localhost", "root", "");
mysql_select_db("laboratorium");
$query = "SELECT * from agendadosen";
$result = mysql_query($query) or die(mysql_error());

$arr = array();
while ($data = mysql_fetch_assoc($result)) {
    $temp = array(
        "date" => $data["date"],       
        "title" => $data["title"],
        "description" => $data["description"]);

    array_push($arr, $temp);}
$data = json_encode($arr);
echo $data
?>