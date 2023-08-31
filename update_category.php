<?php
session_start();

?>
<?php
require_once('./connection/connect.php');
?>
<?php include("./includes/header.php")?>

<?php include("./includes/nav.php")?>

<?php
include("./includes/header.php");
?>

<div class="container-fluid mt-5">
<div class="row">
<?php 
include("./includes/sidebar.php");
?>
<?php
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    $sql = "SELECT * FROM categories  WHERE id=:cat_id ";
    $stmt = $conn->prepare($sql);
    $data = [':cat_id' => $category_id];
    $stmt->execute($data);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4">
<div class="container mt-5">
    <h2>Edit Category</h2>
 

    <form action="./server/handler.php" method="post">
        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
        <div class="form-group">
            <label for="categoryname">Category Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $category['name']; ?>"required>
        </div>
        <button type="submit" class="btn btn-primary" name="categoryupdate"><i class="fas fa-check"></i> Update Category</button>
        <a href="categories.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back  </a>
    </form>
</div>


</body>
</html>
