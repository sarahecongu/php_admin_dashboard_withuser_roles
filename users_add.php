<?php
session_start();

?>
<?php
include("./includes/header.php");
?>
<?php
include("./includes/sidebar.php");
?>
<?php
include("./includes/nav.php");
?>
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4 mt-4">

<div class="container mt-5">
    <h2>Create User</h2>
    <form action="./server/handler.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="profile" >Dp:</label>
            <input type="file" class="form-control" name="profile" required>
       
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="pwd" required>
        </div>
        <div class="form-group">
            <label for="text">Admin:</label>
            <input type="checkbox" name="is_admin">
            
        </div>
   

        <button type="submit" class="btn btn-success" name="usersubmit"><i class="fas fa-check"></i>Create User</button>
        <a href="users.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </form>
</div>


</body>
</html>
