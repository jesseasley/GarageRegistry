<?php
    include("database.php");

// get the user
$sql = "select * from TrackMuse_News order by ts desc";
$rs = $conn->query($sql);
$news = "";
if ($rs->num_rows > 0) {
    while($row = $rs->fetch_assoc()) {
        if ($news > "")
            $news .= ",";
        $news .= "{\"caption\": \"" . $row["caption"] . "\", \"link\": \"" . $row["link"] . "\", \"source\": \"";
        $news .= $row["source"] . "\", \"imagepath\": \"" . $row["imagePath"] . "\", \"active\": \"";
        $news .= $row["active"] . "\", \"id\": \"" . $row["id"] . "\"}";
    }
    $news = "{\"news\": ["  . $news . "]}";
    echo $news;
} 
else{
    echo "{\"news\": {\"error\": \"No news records returned\"}}";
}

$conn->close();
?>