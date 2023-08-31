<?php
session_start();
require_once('./connection/connect.php');
require_once('./server/search.category.php');
if (isset($_POST['search_category']) && !empty($_POST['search_category'])) {
    $search =$_POST['search_category'];
    $query = "SELECT * FROM categories WHERE name=:search_category ORDER BY id DESC";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':search_category', $search, PDO::PARAM_STR);
    $stmt->execute();
    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql = "SELECT * FROM categories ORDER BY id DESC";
    $stmt = $conn->query($sql);
    $stmt->execute();
    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);}
?>
<?php
include("./includes/header.php");
?>
<?php
include("./includes/sidebar.php");
?>
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4 mt-4">
<div class="container-fluid mt-4">

    <div class="container mt-5">
        <!-- search bar -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <form action="categories.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control text-center" name="search_category"
                            placeholder="Search for a specific category">
                        <button type="submit" class="btn btn-secondary ">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="add_category.php" class="btn btn-success mb-3 mt-4 "><i class="fas fa-plus"></i> Add Category</a>
        <div class="row">
            <div class="col-12 justify-content-between">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($category) {
                            foreach ($category as $row) {
                            ?>

                                <tr>
                                    <td>
                                        <?= $row['id'] ?>
                                    </td>

                                    <td>
                                        <?= ucfirst($row['name']); ?>
                                    </td>
                                    <td>
                                        <?= $row['created_at']; ?>
                                    </td>
                                    <td>
                                        <?= $row['updated_at']; ?>
                                    </td>



                                    <td class="d-flex gap-2">
                                        <a href="update_category.php?id=<?= $row['id'] ?>"
                                            class="btn btn-success btn-sm ">
                                            <i class="bi bi-pencil-square"></i> EDIT
                                        </a>
                                  
                                   
                                        <form action="./server/handler.php" method="POST">
                                            <button type="submit" name="categorydelete" class="btn btn-danger btn-sm "
                                                value="<?= $row['id']; ?>"
                                                onclick="return confirm('Are you sure you want to delete category?')">
                                                <i class="bi bi-trash3"></i> DELETE
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }

                        } else {
                            ?>
                            <tr>
                                <td colspan="8">No Record</td>
                            </tr>
                            <?php
                        }



                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</body>

</html>

</body>

</html>