<?php
    include("database.php");

// get the user
$sql = "select id, email, username, zipcode, password, ts, level, active, imagePath from TrackMuse_Users";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    echo "({'users': [";
    $ress = "";
    while($resrow = $res->fetch_assoc()) {
        if ($ress > "")
            $ress = ", ";
        $ress .= "{'user': {'email': '" . $resrow["email"] . "', 'username': '" . $resrow["username"];
        $ress .= "', 'zipcode': '" . $resrow["zipcode"] . "', 'password': '" . $resrow["password"];
        $ress .= "', 'level': '" . $resrow["level"] . "', 'ts': '" . $resrow["ts"] . "', 'imagePath': '";
        $ress .= $resrow["imagePath"] . "', 'active': '" . $resrow["active"] . "', 'id': '" . $resrow["id"] . "'}";
        echo $ress;
        
        $sql = "select 'pic' tbl, upi.id, filename, concat('Project: ', up.name, ' -> Picture: ', upi.title) ";
        $sql .= "title, upi.active from TrackMuse_UserProjectImages upi  ";
        $sql .= "join TrackMuse_UserProjects up on up.id = upi.projectid ";
        $sql .= "where up.TMUserID = '" . $resrow["id"] . "'";
        $sql .= "union all ";
        $sql .= "select 'part' tbl, upp.id, filename, concat('Project: ', up.name, ' -> Part: ', upp.title)  ";
        $sql .= "title, upp.active from TrackMuse_UserProjectParts upp  ";
        $sql .= "join TrackMuse_UserProjects up on up.id = upp.projectid ";
        $sql .= "where up.TMUserID = '" . $resrow["id"] . "'; ";
        //$sql = "select * from TrackMuse_UserImages where tmuserid = '" . $resrow["id"] . "'";
        $pic = $conn->query($sql);
        echo ", 'pics': [";
        $pics = "";
        if ($pic->num_rows > 0) {
            while($picrow = $pic->fetch_assoc()) {
                if ($pics > "")
                    $pics .= ", ";
                $pics .= "{'id': '" . $picrow["id"] . "', 'filename': '" . $picrow["filename"];
                $pics .= "', 'tbl': '" . $picrow["tbl"] . "', 'title': '" . $picrow["title"];;
                $pics .= "', 'active': '" . $picrow["active"] . "'}";
            }
        }
        echo $pics . "]";
        echo "}";
    }
    echo "]})";
}
else{
    echo "{\"user\": {\"error\": \"Error getting users: " . $conn->error . "\"}}";
}

$conn->close();
?>