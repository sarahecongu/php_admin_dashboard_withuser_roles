
<?php
// exit();
require_once('./connection/connect.php');
session_start();
$sql = "SELECT * FROM categories"; 
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("./includes/header.php")?>

<div class="container-fluid mt-5">
<div class="row">
<?php 
include("./includes/sidebar.php");

include("./includes/sidebar.php");
?>
 <div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4">

    <h2>Add Asset</h2>
    <form action="./server/handler.php" method="POST" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Asset Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="qtity">Quantity:</label>
            <input type="number" class="form-control" name="quantity" required>
        </div>
        <div class="form-group">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" rows="2"></textarea>
        </div>
  
    <div class="form-group">
    <label for="id">Category:</label>
    <select class="form-control" name="category_id" required>
        <option value="" disabled selected>Select a category</option>
        <?php
        
        foreach ($categories as $category) {
                echo "<option value='{$category['id']}'>{$category['name']}</option>";
}
        ?>
    </select>
    </div>

        
        <div class="form-group">
            <label for="asset_image" >Image:</label>
            <input type="file" class="form-control" name="image" required>

</div>
        <button type="submit" class="btn btn-success" name="assetsubmit"><i class="fas fa-check"></i> Add Asset</button>
        <a href="assets..php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </form>
</div>
</div>
</div>

<?php 
include("./includes/footer.php");
?>
