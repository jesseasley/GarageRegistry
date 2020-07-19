<?php
    include("database.php");

    // get the project list
    $sql = "select id, TMUserID, name, description, year, make, model, trim, builtby, active, ";
    $sql .= "(select filename from TrackMuse_UserProjectImages where projectid = pr.id and coverphoto='1'";
    $sql .= " and active = '1') leadimage, ";
    $sql .= " (select filename from TrackMuse_UserProjectImages where projectid = pr.id and (coverphoto = '' or ";
    $sql .= "coverphoto = '0') and active = '1' order by id limit 1) firstimage, ";
    $sql .= "(select count(*) from TrackMuse_UserProjectImages where projectid = pr.id) imagecount, ";
    $sql .= "(select count(*) from TrackMuse_UserProjectParts where projectid = pr.id) partcount ";
    $sql .= "from TrackMuse_UserProjects pr ";
    $sql .= "where TMUserID = " . $_GET["TMUserID"] . ";";
    //echo $sql;

    $rs = $conn->query($sql);
    $projects = "";
    if ($rs->num_rows > 0) {
        while($row = $rs->fetch_assoc()) {
            if ($projects > "")
                $projects .= ",";
            $projects .= "{'id': '" . $row["id"] . "', 'TMUserID': '" . $row["TMUserID"] . "', 'name': '" . $row["name"];
            $projects .= "', 'description': '" . $row["description"] . "', 'year': '" . $row["year"];
            $projects .= "', 'make': '" . $row["make"] . "', 'model': '" . $row["model"];
            $projects .= "', 'trim': '" . $row["trim"] . "', 'leadimage': '" . $row["leadimage"];
            $projects .= "', 'imagecount': '" . $row["imagecount"] . "', 'partcount': '" . $row["partcount"];
            $projects .= "', 'active': '" . $row["active"] . "', 'builtby': '" . $row["builtby"] . "',";
            $projects .= "'firstimage': '" . $row["firstimage"] . "'}";
        }
    } 
    echo "({'projects': [" . $projects . "]})";
$conn->close();
?>