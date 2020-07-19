<?php
    include("database.php");

// get the user
$sql = "select * from TrackMuse_TitleImages";
$rs = $conn->query($sql);
$news = "";
if ($rs->num_rows > 0) {
    while($row = $rs->fetch_assoc()) {
        if ($news > "")
            $news .= ",";
        $news .= "{";
        $news .= "\"id\": \"" . $row["id"] . "\", ";
        $news .= "\"filename\": \"" . $row["filename"] . "\", ";
        $news .= "\"title\": \"" . $row["title"] . "\", ";
        $news .= "\"location\": \"" . $row["location"] . "\", ";
        $news .= "\"active\": \"" . $row["active"] . "\"";
        $news .= "}";
    }
    $news = "{\"images\": ["  . $news . "]}";
    echo $news;
} 
else{
    echo "{\"images\": {\"error\": \"No news records returned\"}}";
}

$conn->close();
?>