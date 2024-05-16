<?php

error_reporting(E_ALL);

// Retrieve the JSON data from the request
$json = file_get_contents('php://input');
$data = json_decode($json, true);


// Database connection settings
$servername = "localhost";
$username = "root";
$password = "khalid0000";
$dbname = "maya";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if($data['type'] == "intern"){

            // Extract data
        $fname = $data['firstName'];
        $lname = $data['lastName'];
        $email = $data['email'];
        $age = $data['age'];
        $gender = $data['gender'];
        $adress = $data['adress'];
        $tel = $data['tel'];
        $pass = $data['password'];
        $branch = $data['branche'];
        $year = $data['year'];
        $portfolio = $data['portfolio'];
        


        $Etid =1;

        echo "First Name: " . $fname . "<br>";
        echo "Last Name: " . $lname . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Age: " . $age . "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "Address: " . $adress . "<br>";
        echo "Telephone: " . $tel . "<br>";
        echo "Password: " . $pass . "<br>";
        echo "Branch: " . $branch . "<br>";
        echo "Year: " . $year . "<br>";
        echo "Portfolio: " . $portfolio . "<br>";
      
        echo "Etid: " . $Etid . "<br>";


        

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO Stagiaire (nom,prenom,gender,branche ,password,annee,adresse,tel,email,portfolio,id_etablissement	
        ) VALUES ( ?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssissssi", $fname, $lname, $gender, $branch,$pass,  $year,  $adress, $tel, $email, $portfolio, $Etid);

}elseif($data['type'] == "company"){
      // Extract data
      $name = $data['name'];
      $email = $data['email'];
      $adress = $data['adress'];
      $fix = $data['fix'];
      $password = $data['password'];


    

      // Prepare and bind
      $stmt = $conn->prepare("INSERT INTO Entreprise (nom,email,adresse, fixe,password) VALUES ( ?,?, ?, ?, ?)");
      $stmt->bind_param("sssss", $name, $email, $adress, $fix, $password);
      
}


// Execute the query
if ($stmt->execute()) {
    echo "New record created successfully";
   
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();


?>






