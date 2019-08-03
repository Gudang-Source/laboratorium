<?php
mysql_connect("localhost", "root", "");
mysql_select_db("laboratorium");

function sql($tgl) {
    $tglsql = substr($tgl, 6, 4) . "-" . substr($tgl, 3, 2) . "-" . substr($tgl, 0, 2);
    return $tglsql;
}

if (isset($_POST['addsubmit'])) { // jika tombol addsubmit ditekan
    $date1 = $_POST['date'];
    $date = sql($date1);
    $time = $_POST['time'];
    $datetime = $date . ' ' . $time;
    $title = $_POST['title'];
    $description = $_POST['description'];

    $simpan = mysql_query("INSERT INTO agendadosen(
                        date,                       
                        title, 
                        description)
                        
		VALUES(
                        '$datetime',                        
                        '$title', 
                        '$description'                        
                        )");

    echo '<script type="text/javascript">
                    alert("Jadwal berhasil Disimpan");</script>';
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}; // if(kondisi) {hasil};
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width" />

        <title>Event Calender</title>
        <link rel="shortcut icon" href="images/favicon.ico" />
        <!-- Bootsrap -->
        <link rel="stylesheet" href="css/bootstrap.css">

        <!-- Core CSS File. The CSS code needed to make eventCalendar works -->
        <link rel="stylesheet" href="css/eventCalendar.css">

        <!-- Theme CSS file: it makes eventCalendar nicer -->
        <link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">

        <!--<script src="js/jquery.js" type="text/javascript"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

    </head>
    <body id="responsiveDemo">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="h4">Kalender</h2>
                    <div id="eventCalendarHumanDate"></div>
                    <script>
                        $(document).ready(function() {
                            $("#eventCalendarHumanDate").eventCalendar({
                                eventsjson: 'json.php',
                                jsonDateFormat: 'human'  // 'YYYY-MM-DD HH:MM:SS'
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <hr/>
       

    <script src="js/jquery.eventCalendar.js" type="text/javascript"></script>

</html>