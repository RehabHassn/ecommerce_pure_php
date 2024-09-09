<?php
include_once 'models/usersModel.php';
include_once 'helpers/dbConnection.php';
$id=$_GET['user_id'];
// $user = ['id','username','email','phone','type'];
$conn =connectToDB();
$sql =$conn->query("SELECT * FROM users WHERE id =$id");

$user=$sql->fetch();
$id =$user['id'];
$username =$user['username'];
$email =$user['email'];
$phone =$user['phone'];
$type =$user['type'];
$password =$user['password'];




?>
                
        <!-- <table class="table table-bordered table-striped table-hover">
            <thead>
                <td class="bg-warnning">items</td>
                <td class="bg-secondary">Data</td>
                
               
            </thead>
            <tbody>
                <?php
                // foreach($data as $user){
                //     echo '<tr>';
                //     foreach($user_access as $access){
                //         echo '<td>'.$user[$access].'</td>';
                //     }
                   
                //     echo '</tr>';
                // }
                // ?>
            </tbody>
        </table>
       
    </div> -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <table class="table table-bordered table-striped table-hover">
            <thead>
                <td class="bg-warning">items</td>
                <td class="bg-secondary">Data</td>
                
               
            </thead>
            <tbody>
                
                  <td>ID</td>
                    <td><?php echo $user['id'] ?></td>
                    </tr>
                    <tr>
                  <td>username</td>
                    <td><?php echo $user['username'] ?></td>
                    </tr>
                    <tr>
                  <td>email</td>
                    <td><?php echo $user['email'] ?></td>
                    </tr>
                    <tr>
                  <td>type</td>
                    <td><?php echo $user['type'] ?></td>
                    </tr>
                    <tr>
                  <td>Phone</td>
                    <td><?php echo $user['phone'] ?></td>
                    </tr>
                    <tr>
                  <td>password</td>
                    <td><?php echo $user['password'] ?></td>
                    </tr>
              
            </tbody>
    </table>
    </body>
    </html>