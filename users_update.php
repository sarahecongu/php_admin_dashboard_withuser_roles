<?php
session_start();

?>
<?php
require_once('./connection/connect.php');
?>
<?php
       if (isset($_GET['id'])) {
        $user_id = $_GET['id'];
        $sql = "SELECT * FROM users  WHERE id=:users_id";
        $stmt = $conn->prepare($sql);
        $data = [':users_id' => $user_id];
        $stmt->execute($data);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
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
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4 mt-4 mb-3">
<div class="container mt-5">
<h2>Update User</h2>
<form action="./server/handler.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="<?php echo $user['first_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $user['last_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="profile" >Image:</label>
            <input type="file" class="form-control" name="profile" required>
</div>
        <div class="form-group">
            <label for="pwd">password:</label>
            <input type="password" class="form-control" name="pwd" value="<?php echo $user['pwd']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="userupdate"><i class="fas fa-check"></i> Update User</button>
        <a href="users.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </form>
</div>
</div>


</body>
</html>
