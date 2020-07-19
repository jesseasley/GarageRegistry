<?php
    include("database.php");

// get the user
$sql = "select * from TrackMuse_StockImages order by ts desc";
$rs = $conn->query($sql);
$images = "";
if ($rs->num_rows > 0) {
    while($row = $rs->fetch_assoc()) {
        if ($images > "")
            $images .= ",";
        $images .= "{\"id\": \"" . $row["id"] . "\", \"filename\": \"" . $row["filename"];
        $images .= "\", \"title\": \"" . $row["title"] . "\", \"active\": \"" . $row["active"] . "\"}";
    }
    $images = "{\"images\": ["  . $images . "]}";
    echo $images;
} 
else{
    echo "{\"images\": {\"error\": \"No stock image records returned\"}}";
}

$conn->close();
?>