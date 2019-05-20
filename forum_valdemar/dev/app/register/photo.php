<?php
    if(isset($_POST['submit'])){
     if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
        echo " error ";
     } else {
        $image = $_FILES['image']['tmp_name'];
        $image = addslashes(file_get_contents($image));
        saveimage($image);
     }
    }

    function saveimage($image){
        $db_connectie = new PDO('localhost', 'dbname=forum', 'root', '');
        // $qry = "insert into tablename (name) values ('$image')";
        
        $db_query = $db_connectie->prepare("INSERT INTO profielfoto (images) VALUES (:image)");
        
        $db_query = $db_connectie->prepare(
            "SELECT * FROM profielfoto 
                WHERE images = ':image'"
        );
        
        // $result=mysqli_query($dbcon,$qry);
        $result = $db_query->execute([
            ':image'=> $image
        ]);

        if($result){
            echo " <br/>Image uploaded.";
            header('location:index.php');
        } else {
            echo " error ";
        }
    }