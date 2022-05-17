<?php
session_start();
include_once "../Sign Up Page/connection.php";

$display='none';
if(isset($_POST["deleteuser"])){
    $id= $_POST["userid"];
    $deletingdata= "DELETE FROM users_data WHERE id=$id;";
    mysqli_query($conn , $deletingdata);
}

if(isset($_POST["edituser"])){
    $id= $_POST["userid"];
    $stat = "SELECT * FROM users_data WHERE id='$id';";
    $result = mysqli_query($conn,$stat);
    $resultcheck = mysqli_num_rows($result);
    if($resultcheck > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {$newName= $row["username"];
            $newEmail= $row["email"];
            $newPassword= $row["passwordd"];
            $display= 'block';
        }
    }
}
if(isset($_POST["newuser"])){
    $newname= $_POST['newName'];
    $newPassword= $_POST['newPassword'];
    $newEmail= $_POST['newEmail'];
    $id= $_POST['userid'];
    $query= "UPDATE users_data SET username='$newname', passwordd='$newPassword',email='$newEmail' WHERE id=$id;";
    $x= mysqli_query($conn , $query);
    $display= 'none';
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
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
    
        $stat = "SELECT * FROM users_data;";
        $result = mysqli_query($conn,$stat);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck > 0)
        {
        while($row = mysqli_fetch_assoc($result))
        {
            $y= $row['id'];
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row["username"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["passwordd"]."</td>
                    <td>".$row["created_at"]."</td>
                    <td>".$row["last_login"]."</td>
                    <td>".
                    "<form method='post'>
                    <input type='hidden' value='".$y."' name='userid'>
                    <input type='submit' value='Edit' name='edituser'>
                    </form>
                    "."</td>
                    <td>".
                    "<form method='post'>
                    <input type='hidden' value='".$y."' name='userid'>
                    <input type='submit' value='Delete' name='deleteuser'>
                    </form>
                    "."</td>
                 </tr>";
        }
        }
        ?>
    </table>

    <div id="editdiv" style="display: <?php echo $display ?>;">
        <form method="post">
            <input type="hidden" value="<?php echo $id ?>" name="userid">
            <label>Name:</label>
            <input type="text" value="<?php echo $newName ?>" name="newName">
            <label>Email:</label>
            <input type="text" value="<?php echo $newEmail ?>" name="newEmail">
            <label>Password:</label>
            <input type="text" value="<?php echo $newPassword ?>" name="newPassword">
            <input type='submit' value='Edit' name='newuser'>
    </div>


    <a id="logouta" href="../index.html">Log Out</a>
</div>
</body>
</html>
