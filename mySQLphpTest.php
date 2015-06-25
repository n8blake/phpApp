<!DOCTYPE html>

<html>

<head>

	<script>
	
	</script>

</head>

<body>

	<?php
	
		/*//report all errors
        error_reporting(E_ALL);
        display_errors(1);
        */
        
        require "phpTestCredentials.php";
        
        echo $user;
        //$dbname = "myDB";

        // Create connection
        $conn = new mysqli($host, $user, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        echo "Connected successfully";
        echo "<br><br>";
        echo "$user, $host, $port, $dbname <br><br>";

        $sql = "INSERT INTO MyUsers (username, firstname, lastname) VALUES ( 'newUser2', 'NULL', 'NULL')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created sucessfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn-error;
        }

        /*
        // Create database
        $sql = "CREATE DATABASE myDB";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
            echo "<br><br>";
        } else {
            echo "Error creating database: " . $conn->error;
            echo "<br><br>";
        }
        */
        
        /*
        //create a table of users
        
        $sql = "CREATE TABLE MyUsers(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(10), firstname VARCHAR(30), lastname VARCHAR(30), email VARCHAR(50), reg_date TIMESTAMP
        )";

        if ($conn->query($sql) === TRUE){
            echo "Table MyUsers created sucessfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        */
        
       /*

        //Insert data into table
        $sql = "INSERT INTO 'myDB' . 'MyUsers' ('username', 'firstname', 'lastname') VALUES ('newUser', 'FirstName', 'LastName')";

        if ($conn->query ($sql)) === TRUE) {
            echo "New record created sucessfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn-error;
        }
*/
        /*
        //query database for an entry
        $sql = "SELECT id, firstname, lastname FROM MyGuests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "0 results";
            echo "<br><br>";
        }
        */
    
        $conn->close();
	
	
	?>

</body>

</html>