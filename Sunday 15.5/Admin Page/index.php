<?php
session_start();
include_once "../Sign Up Page/connection.php";

if(isset($_POST["delete"])){
    $id= $_POST["id"];
    $deletingdata= "DELETE FROM users_data WHERE id=$id;";
    mysqli_query($conn , $deletingdata);
}

if(isset($_POST["updatename"])){
    $idid= $_POST["idid"];
    $newname= $_POST["newname"];
    $query= "UPDATE users_data SET username='$newname' WHERE id=$idid;";
    $x= mysqli_query($conn , $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Josefin+Sans:wght@300&family=Playfair+Display:ital@1&family=Raleway:wght@200;400&family=Ramaraja&family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">
    <title>Admin</title>
    <style>
        body{
            text-align: center;
            font-size: 20px;
            font-family: 'Josefin Sans', sans-serif;
            background-color: #5A54FF; 
        }
        div{
            margin: 1%; 
            padding: 2%;
            background-color: white; 
            height: 88vh;
            display:flex;
            flex-direction: column;
            justify-content:center;
        }
        h1{
            margin: 1% 0;
            color: #F54E4E;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;   
        }
        table{
            text-align: center;
            padding: 8px;
        }
        #logouta{
            text-decoration: none;
            color: #5A54FF;
            margin: 2%;
            font-weight: bold;
        }
        @media (min-width:2000px)
        {
            body{font-size: 30px;}
            h1{font-size: 50px;}
        }
        @media (max-width:700px)
        {
            body{font-size: 16px;}
            h1{font-size: 32px;}
        }
        @media (max-width:380px)
        {
            body{font-size: 12px;}
            h1{font-size: 28px;}
        }
    </style>
</head>
<body>
    
    <div>
        <h1>Users Data</h1>
        <table> 
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Account Cration Date</th>
            <th>Last Login Date</th>
        </tr>
        <?php
        // $id= 1;
        // foreach ($_SESSION["usersData"] as $value) {
        //     if($value["admin"] == true){
        //         continue;
        //     }
        //     echo "<tr>
        //             <td>".$id."</td>
        //             <td>".$value["name"]."</td>
        //             <td>".$value["email"]."</td>
        //             <td>".$value["password"]."</td>
        //             <td>".$value["Creation_Date"]."</td>
        //             <td>".$value["Last-Login-Date"]."</td>
        //         </tr>";
        //     $id++;
        // }
        $stat = "SELECT * FROM users_data;";
        $result = mysqli_query($conn,$stat);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck > 0)
        {
        while($value = mysqli_fetch_assoc($result))
        {
            echo "<tr>
                     <td>".$value['id']."</td>
                     <td>".$value["username"]."</td>
                     <td>".$value["email"]."</td>
                     <td>".$value["passwordd"]."</td>
                     <td>".$value["created_at"]."</td>
                     
                 </tr>";
        }
        }
        ?>
    </table>

    <form action="" method="post">
    <label>Enter the id</label>
    <input type="number" name="id">
    <input type="submit" name="delete" value="delete">
    </form>

    <form action="" method="post">
    <label>Enter the id</label>
    <input type="number" name="idid">
    <label>Enter the new name</label>
    <input type="text" name="newname">
    <input type="submit" name="updatename" value="update name">
    </form>

    <a id="logouta" href="../index.html">Log Out</a>
</div>
</body>
</html>
<!-- <td>".$value["Last-Login-Date"]."</td> -->