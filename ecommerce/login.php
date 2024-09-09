<?php
session_start();
include_once 'models/usersModel.php';
include_once 'guard/check_user_login.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $data_check = get_specific_user($_POST['email'],$_POST['password']);
    if(is_array($data_check)){
        $_SESSION['id'] = $data_check['id'];
        $_SESSION['email'] = $data_check['email'];
        $_SESSION['username'] = $data_check['username'];
        $_SESSION['type'] = $data_check['type'];
        // $check = check_admin_login();
        if($data_check['type']=='admin'){
            header('location: index.php');
        }
        else{
            header('location: register.php');
        }
       
    }
}

$title='Login';
include_once 'templet/header.php';
?>

<div class="login p-5">
    <div class="container">
        <h2 class="text-center mb-3">Login</h2>
        <?php
        if(isset($data_check)){
            if($data_check == false){
                echo '<div class="alert alert-danger text-center">Email or Password is incorrect</div>';
            }
        }
        //     else{
        //         echo '<div class="alert alert-danger text-center">'.$data_check.'</div>';
        //     }
        // }
        ?>
        <form method="POST" class="m-auto pt-2 p-4" style="max-width: 500px;">
            <div class="field mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="field mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="field mb-3">
                <input type="submit" class="btn btn-success form-control">
            </div>
        </form>
    </div>
</div>


<?php
include_once 'templet/footer.php';
?>