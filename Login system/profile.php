<?php include "inc/header.php"?>

<div class="panel panel-default">
     <div class="panel-heading">
                <h2>User List <span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></span></h2>
            </div>
    <div class=" panel-body">

        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="Rezwan Hossain	">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="Rezwan">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="rezwan.hossain@outlook.com	">
            </div>

            
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
<?php include "inc/footer.php"?>
