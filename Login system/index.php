<?php 
    include "inc/header.php";
    include "library/user.php";
    $user = new user();
?>
       
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>User List <span class="pull-right"><strong>Welcome!</strong>Rezwan</span></h2>
            </div>
            <div class=" panel-body">
                <table class="table table-striped">
                    <tr>
                        <th width="20%">Serial</th>
                        <th width="20%">Name</th>
                        <th width="20%">Username</th>
                        <th width="20%">Email</th>
                        <th width="20%">Action</th>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td>Rezwan Hossain</td>
                        <td>Rezwan</td>
                        <td>rezwan.hossain@outlook.com</td>
                        <td>
                            <a class="btn btn-primary" href="profile.php?id=1">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Niaz Morshed</td>
                        <td>Niaz</td>
                        <td>niaz@outlook.com</td>
                        <td>
                            <a class="btn btn-primary" href="profile.php?id=1">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Dhrubo Ahmed</td>
                        <td>Dhrubo</td>
                        <td>dhrubo@outlook.com</td>
                        <td>
                            <a class="btn btn-primary" href="profile.php?id=1">View</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
       <?php include "inc/footer.php"?>