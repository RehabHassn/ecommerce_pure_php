<?php
session_start();
// include_once 'helpers/validate.php';
// $conn=connectToDB();
// phpinfo();

include_once 'guard/check_user_login.php';
include_once 'classes/users.php';
include_once 'models/usersModel.php';
// check_login();
// var_dump($_SESSION);
//  $user_obj = new Users('car ','15000$');
//  echo $user_obj->delivery('car');
 
//  echo $user_obj->getEmail();

include_once 'models/usersModel.php';
$data = get_users();
$employee_access = ['id','username'];

if($_SERVER['REQUEST_METHOD']=='POST'){
    $filter = 'where 1 = 1';
    $search='';
    if ($_POST['type'] != '') {
        $filter = $filter.' and '.'type="'.$_POST['type'].'"';
    }
    if ($_POST['search'] != '') {
        $search=' and name or email LIKE "%'.$_POST['search'] .'%" ';
    }
    
    $data = get_users($filter,$search);

//     /////////////////////////////////////////////////////////////
    // another solution to filter types:
    // if($_POST['type'] === ''){
    //     $data = get_users();
    // }else{
    //     $data = get_users('WHERE type="'.$_POST['type'].'"');
    // }
}

if(isset($_SESSION['message'])){
    $msg= $_SESSION['message'];
    unset($_SESSION['message']);
}

$title = 'Home';
include_once 'templet/header.php';
?>
    <div class="container pt-5">
        <?php
        if(isset($msg)){
            echo '<p class="alert alert-success">'.$msg.'</p>';
        }
        ?>
         <form method="POST" class="m-auto ">
            <div class="row">
                <select name="type" id="" class="col-3 me-3 ht-30">
                    <option value="">All</option>
                    <option value="client">Client</option>
                    <option value="admin">Admin</option>
                    <option value="moderator">moderator</option>
                    <option value="user">user</option>
                </select>
                <input class="col-3 me-3 ht-30" type="text" name="search" placeholder="Search " style="position :relative">
                <i class="fa-solid fa-magnifying-glass" style="position:absolute"></i>
                <input type="submit" class="btn btn-success mb-3 col-1 ht-30" value="filter">
                
                
            </div>
        </form>
        <br>
        <?php //include_once 'layout/form.php' ?>
        <br> 
        <?php if(isset($data) && sizeof($data) > 0) { ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
               <td class="bg-secondary">id</td>
                <td class="bg-secondary">Username</td>
                <!-- <td class="bg-secondary">Email</td> -->
                <td class="bg-secondary">Control</td>
            </thead>
            <tbody>
                <?php
                foreach($data as $user){
                    echo '<tr>';
                    foreach($employee_access as $access){
                        echo '<td>'.$user[$access].'</td>';
                    }
                    echo '<td>
                    <a href="show.php?user_id='.$user['id'].'" class="btn btn-success m-2">Show <i class="fa-regular fa-eye"></i></a>
                    <a href="update_user.php?user_id='.$user['id'].'" class="btn btn-primary me-2 ">Edit <i class="ri-edit-2-fill"></i></a>
                    <a href="delete.php?user_id='.$user['id'].'" class="btn btn-danger delete" >Delete <i class="ri-delete-bin-6-line"></i></a></td> ';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php } else {
            echo '<p class="alert alert-danger text-center m-3">There is no data</p>';
            }?> 
    </div>
<script>
const btnsDelete =document.querySelectorAll('.delete');
// console.log(btnsDelete);
for(let i=0; i<btnsDelete.length; i++){
    btnsDelete[i].onclick= function(e){
       let conf =confirm('Are you sure to delete this item ?');
       if(!conf){
          e.preventDefault();
         }
    }
  
}
</script>
<?php
include_once 'templet/footer.php';
?>