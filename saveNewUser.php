<?php
    if ($_SERVER['SERVER_NAME'] == "localhost"){
        $servername = "DESKTOP-PSN6TIK";
        $username = "MyDB1138";
        $password = "HeTaretEC2u!";
        $dbname = "mydb1138";
    }
    else{
        $servername = "45.40.164.103";
        $username = "MyDB1138";
        $password = "HeTaretEC2u!";
        $dbname = "MyDB1138";
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // get current time
    date_default_timezone_set('America/Chicago');
    $d = new DateTime();
    $sd = $d->format('m-d-Y H:i:s');

    //check to see if the user already exists
    $sql = "select * from TrackMuse_Users where username = '" . $_POST["username"] . "'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        echo "{'user': {'error': 'That username is already in our system, would you rather use the login link?'}}";
    } 
    else
    {
        // add the user
        $sql = "insert into TrackMuse_Users (email, username, zipcode, password, level, active, ts, coverphoto)";
        $sql .= " values ('" . $_POST["email"] . "', '" . $_POST["username"] . "', '" . $_POST["zipcode"] . "', ";
        $sql .= "'" . md5($_POST["password"]) . "', 'standard', '1', '" . $sd . "', '')";

        if ($conn->query($sql) === TRUE) {
            $sql = "select * from TrackMuse_Users where email = '" . $_POST["email"] . "'";
            $res = $conn->query($sql);
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();
                echo "{'user': {'message': 'User successfully added', 'email': '" . $_POST["email"] . "', ";
                echo "'username': '" . $_POST["username"] . "', 'password': '" . $_POST["password"];
                echo "', 'id': '" . $row["id"] . "', 'imagePath': '', 'zipcode': '";
                echo $_POST["zipcode"] . "', 'level': 'standard', 'ts': '" . $sd . "', 'coverphoto': ''}}";
            } else {
                echo "{'user': {'error': 'Error adding user: " . $conn->error . "'}}";
            }
        }
    }
    $conn->close();
?>