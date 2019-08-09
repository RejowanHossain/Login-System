<?php 
    include "inc/header.php";
    include "library/user.php";
?>

<?php
    
    $user = new user();
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['register'])){
        $userLogin = $user->userLogin($_POST);
    }

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>User Login <span class="pull-right"><strong>Welcome!</strong>Rezwan</span></h2>
    </div>
    <div class=" panel-body">
<?php if(isset($userLogin)){
    echo $userLogin;
}
?>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="ppasword">Password</label>
                <input type="password" id="password" name="password" class="form-control" required="">
            </div>
            <button type="submit" name="login" class="btn btn-success">Login</button>
        </form>
    </div>
</div>
<?php include "inc/footer.php"?>
