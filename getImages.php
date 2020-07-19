<?php
    include("database.php");

// get the user
$sql = "select ts, id, filename, concat('images/autos/', filename) fullpath, title, '' description, '' projectID ";
$sql .= "from TrackMuse_StockImages where active = '1' ";
$sql .= "union all ";
$sql .= "select upi.ts, upi.id, upi.filename, concat('images/projects/', upi.filename) fullpath,  ";
$sql .= "up.name title, upi.description, upi.projectID  ";
$sql .= "from TrackMuse_UserProjectImages upi  ";
$sql .= "join TrackMuse_UserProjects up on up.id = upi.projectid ";
$sql .= "where upi.active = '1' order by ts desc ; ";

$rs = $conn->query($sql);
$images = "";
if ($rs->num_rows > 0) {
    while($row = $rs->fetch_assoc()) {
        $pos = false;//strpos($images, $row["filename"]);
        $search_string = $row["filename"];
        //$search_string = "65mustang.jpg";
        if (strpos($images, $search_string)){
            $pos = strpos($images, $search_string);
            //echo "found " . $search_string . " at position " . $pos  . "<br>";
            $new = substr($images, 0, $pos);
            //echo "new: " . $new . "<br>";
            $start = strrpos($new, "{", -1);
            if ($start > 0) 
                $start -= 1;
            $end = strpos($images, "}", $pos);
            //echo "found { at position " . $start . "<br>";
            //echo "found } at position " . $end . "<br>";
            //echo "string found: " . substr($images, $start, $end - $start + 1) . "<br>";
            //echo "<br>";
            $images = substr($images, 0, $start) . substr($images, $end+1, 10000);
            if (substr($images, 0, 1) == ",")
                $images = substr($images, 1, 10000);
        }
        //if ($pos === false){
            if ($images > "")
                $images .= ",";
            $images .= "{'id': '" . $row["id"] . "', 'fullpath': '" . $row["fullpath"];
            $images .= "', 'title': '" . $row["title"] . "', 'description': '" . $row["description"];
            $images .= "', 'projectID': '" . $row["projectID"] . "', 'filename': '" . $row["filename"] . "'}";
        //}
    }
}
$images = "({'images': ["  . $images . "]})";
echo $images;

$conn->close();
?>