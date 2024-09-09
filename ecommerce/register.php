<?php
session_start();
include_once 'models/usersModel.php';
include_once 'guard/check_user_login.php';

// var_dump($_SESSION);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $check_exist_email = check_exist_email($_POST['email']);
    if ($check_exist_email == false){
        $data_check = register($_POST['username'],$_POST['email'],$_POST['password'],$_POST['phone']) ;
    }
    // var_dump($_POST);
    // $data_check = register($_POST['username'],$_POST['email'],$_POST['password'],$_POST['phone']);
    // header('location:index.php');
    // if (isset($data_check)){
    //     // var_dump($data_check);
    // }
    
}
$title='Register';

include_once 'templet/header.php';

?>

<div class="login p-5">
    <div class="container">
        <h2 class="text-center mb-3">Register</h2>
        
        <form method="POST" class="m-auto pt-2 p-4" style="max-width: 500px;">
            <div class="field mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="field mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
                <?php
                if (isset($check_exist_email)&& is_array($check_exist_email)){
                    echo '<div class="alert alert-danger text-center">User already exists</div>';
            }else{
                echo '<div class="alert alert-success text-center">User registered successfully</div>';
            }
                ?>
            </div>
            <div class="field mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="field mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" required>
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