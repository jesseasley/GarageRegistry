<?php
    include("database.php");

    $projectID = $_GET["ProjectID"];

    // get the base project
    $sql = "select up.id, up.name, up.description, up.year, up.make, up.model, up.trim, up.builtby, up.active, ";
    $sql .= "ifnull(u.imagePath, '') imagePath, u.coverphoto, u.id userID ";
    $sql .= "from TrackMuse_UserProjects up ";
    $sql .= "join TrackMuse_Users u on u.id = up.TMUserID ";
    $sql .= "where up.id = " . $projectID;
    //echo $sql;

    $images = "";
    $parts = "";
    $project = "";
    if ($projectID == "-1"){
        $project = "({'project':{'id':'-1','name':'','description':'','year':'','make':'','model':'','trim':''";
        $project .= ",'builtby':'','active':'','userImage':'','userCoverPhoto':'','userID':''}";
        $images = "";
        $parts = "";
    }
    $rs = $conn->query($sql);
    if ($rs->num_rows > 0) {
        $row = $rs->fetch_assoc();
        
        $project = "({'project': {'id': '" . $row["id"] . "', 'name': '" . $row["name"] . "', 'description': '";
        $project .= $row["description"] . "', 'year': '" . $row["year"] . "', 'make': '" . $row["make"] . "', 'model': '";
        $project .= $row["model"] . "', 'trim': '" . $row["trim"] . "', 'builtby': '" . $row["builtby"];
        $project .= "', 'active': '" . $row["active"] . "', 'userImage': '" . $row["imagePath"] . "', ";
        $project .= "'userCoverPhoto': '" . $row["coverphoto"] . "', 'userID': '" . $row["userID"] . "'";

        //get all of the project pictures
        $sql = "select id, projectid, filename, title, coverphoto, description, active ";
        $sql .= "from TrackMuse_UserProjectImages ";
        $sql .= "where projectid = " . $projectID . " order by ts desc;";
        $images = "";
        $rs = $conn->query($sql);
        $tallest = 0;
        $tallestItem = -1;
        $cnt = 0;
        while($row = $rs->fetch_assoc()) {
            $size = getimagesize("images/projects/" . $row["filename"]);
            if ($images > "")
                $images .= ",";
            $images .= "{'id': '" . $row["id"] . "', 'projectid': '" . $row["projectid"];
            $images .= "', 'filename': '" . $row["filename"] . "', 'title': '" . $row["title"];
            $images .= "', 'description': '" . $row["description"] . "', 'active': '" . $row["active"];
            $images .= "', 'coverphoto': '" . $row["coverphoto"] . "', 'fullpath': 'images/projects/";
            $images .= $row["filename"] . "', 'width': '" . $size[0] . "', 'height': '" . $size[1] . "'";
            $images .= ", 'targetHeight': '', 'targetWidth': '', 'targetTop': '', 'targetLeft': ''}";
            if (($size[1] > $tallest) && ($row["active"] == "1")){
                $tallest = $size[1];
                $tallestItem = $cnt;
            }
            $cnt += 1;
        }
        $project .= ", 'tallest': '" . $tallest . "', 'tallestItem': '" . $tallestItem . "'}";

        //get all of the project parts
        $sql = "select id, projectid, filename, title, description, pricepaid, vendorlink, active ";
        $sql .= "from TrackMuse_UserProjectParts ";
        $sql .= "where projectid = " . $projectID . "  order by ts desc;";
        $parts = "";
        $rs = $conn->query($sql);
        while($row = $rs->fetch_assoc()) {
            $size = getimagesize("images/projects/" . $row["filename"]);
            if ($parts > "")
                $parts .= ",";
            $parts .= "{'id': '" . $row["id"] . "', 'projectid': '" . $row["projectid"];
            $parts .= "', 'filename': '" . $row["filename"] . "', 'title': '" . $row["title"];
            $parts .= "', 'description': '" . $row["description"] . "', 'fullpath': 'images/projects/";
            $parts .= $row["filename"] . "', 'width': '" . $size[0] . "', 'height': '" . $size[1] . "'";
            $parts .= ", 'pricepaid': '" . $row["pricepaid"];
            //$parts .= "', 'description': '', 'pricepaid': '" . $row["pricepaid"];
            $parts .= "', 'vendorlink': '" . $row["vendorlink"] . "', 'active': '" . $row["active"] . "'";
            $parts .= ", 'targetHeight': '', 'targetWidth': '', 'targetTop': '', 'targetLeft': ''}";
        }
    } 
    $project = $project . ", 'images': [" . $images . "], 'parts': [" . $parts . "]})";
    echo $project;
$conn->close();
?>