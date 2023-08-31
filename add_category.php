<?php
session_start();

?>
<?php include("./includes/header.php")?>>

<div class="container-fluid mt-5">
<div class="row">
<?php 
include("./includes/sidebar.php");

?>


 <div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4">

<div class="container mt-5">
    <h2>Add Category</h2>
    <form action="./server/handler.php" method="POST">
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-success" name="categorysubmit"><i class="fas fa-check"></i> Add Category</button>
        <a href="categories.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </form>
</div>
</div>


</body>
</html>
