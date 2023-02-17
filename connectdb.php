<?php
    if (isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    }

    $conn = new mysqli('localhost', 'root', '', 'gemtech-db');
    if ($conn->connect_error) {
        die('connection Failed : ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO gemtech(Full_Name, Email, Message) 
            VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $fname,$email, $message);
        $stmt->execute();

        $_SESSION['check_update'] = "1";
        setcookie("msg","Language Successfully Updated",time()+5,"/");
    
        header("location:index.html");
 
       
        
    
        
        
        

        $stmt->close();
        $conn->close();
    }
    ?>

