<?php

include 'inc/logging.php';
include 'mysql.php';

$module = $_GET["m"];
$b = $_GET["b"];
$rid = $_GET["rid"];
$search_type = $_GET["search_type"];
$client_id = $_GET["client_id"];
$is_sure = $_GET["is_sure"];
$event_id = $_GET["event_id"];

$place_id = $_GET["place_id"];

echo "<html>\n";
echo "<head>\n";
echo "<title>Concept Music Art Sp. z o.o.</title>\n";
echo "</head>\n";

echo "<frameset border=\"0\" cols=\"15%,*\">\n";
echo "\t<frame noresize=\"noresize\" src=\"menu.php\" name=\"menu\">\n";


if (!isset($module)) {

    echo "\t<frame noresize=\"noresize\" src=\"listasprzetu.php\" name=\"main\">\n";

} else {

    echo "\t<frame noresize=\"noresize\" src=\"" . $module . ".php?b=" .$b . "&rid=". $rid ."&search_type=".$search_type  . "&place_id=".$place_id." \" name=\"main\">\n";

}

echo "</frameset>\n";

?>
