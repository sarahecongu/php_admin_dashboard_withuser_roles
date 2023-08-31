<?php
require_once('./connection/connect.php');
session_start();
$sql = "SELECT * FROM categories"; 
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("./includes/header.php")?>
<?php 
include("./includes/sidebar.php");
?>
<?Php
    if (isset($_GET['id'])) {
        $asset_id = $_GET['id'];
        $sql = "SELECT * FROM assets WHERE id = :asset_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':asset_id', $asset_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
    }
   
    ?>
 <div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4  ">
        <h2>Update Assets</h2>
        <form action="./server/handler.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <div class="form-group">
                <label for="asset_name">Asset Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="file">Image:</label>
                <input type="file" class="form-control" name="image" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
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
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" name="quantity" value="<?php echo $result['quantity'] ?>">
            </div>
            <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" value="<?php echo $result['description'] ?>" rows="2"></textarea>
        </div>
            
            <button type="submit" class="btn btn-primary" name="assetupdate"><i class="fas fa-check"></i> Update
                Asset</button>
            <a href="assets.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back </a>
        </form>
    </div>
    <?php 
           include("./includes/footer.php");
           ?>