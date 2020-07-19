<?php
    include("database.php");

    $parentObject = $_GET["ParentObject"];

    $forum = "";
    // get the forum listing
    $sql = "select f.id, u.username, u.imagePath, f.parentObject, f.parentID, f.title, f.message, f.TMUserID, f.active, f.projectID, ";
    $sql .= "(select count(*) from TrackMuse_Forum where parentID = f.id and active='1') children ";
    $sql .= "from TrackMuse_Users u ";
    $sql .= "join TrackMuse_Forum f on u.id = f.TMUserID ";
    $sql .= "where f.parentObject = '" . $parentObject . "' and f.active = '1' and f.projectID = " . $_GET["projectID"];
    //echo $sql;

    $rs = $conn->query($sql);
    if ($rs->num_rows > 0) {
        while($row = $rs->fetch_assoc()) {
            if ($forum > "")
                $forum .= ",";
            $forum .= "{'id': '" . $row["id"] . "', 'username': '" . $row["username"];
            $forum .= "', 'parentID': '" . $row["parentID"] . "', 'title': '" . $row["title"];
            $forum .= "', 'message': '" . $row["message"] . "', 'imagePath': '" . $row["imagePath"] . "'";
            $forum .= ", 'parentObject': '" . $row["parentObject"] . "', 'TMUserID': '" . $row["TMUserID"];
            $forum .= "', 'active': '" . $row["active"] . "', 'children': '" . $row["children"];
            $forum .= "', 'expanded': '0', 'projectID': '" . $row["projectID"] . "'}";
        }
    } 
    $forum = "{'forum': ["  . $forum . "]}";
    echo $forum;
$conn->close();
?>