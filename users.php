<?php
session_start();
require_once('./connection/connect.php');
?>
<?php
if (isset($_POST['search_user']) && !empty($_POST['search_user'])) {
    $search =$_POST['search_user'];
    $query = "SELECT * FROM users WHERE first_name=:search_user || last_name=:search_user || email = :search_user ORDER BY id DESC";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':search_user', $search, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $query = "SELECT * FROM users ORDER BY id DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>
<?php
include("./includes/header.php");
?>
<?php
include("./includes/sidebar.php");
?>

<style>
    .main-content {
    margin-left: 250px; 
    padding-top: 15px;
    padding-bottom: 15px;
    overflow-y: auto;
    max-height: 100vh; 
    background-color: #f8f9fa; 

    
}


</style>
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4 mt-4">
<div class="container-fluid mt-5">


        <div class="container mt-5">
            <!-- searchbar -->
            <div class="row">
                <div class="col-md-12 mt-4">
                    <form action="users.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control text-center" name="search_user"
                                placeholder="Search for a user">
                            <button type="submit" class="btn btn-secondary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" ">
                <a href="users_add.php" class="btn btn-success fixed mt-4 mb-3 float-mid-center"><i
                        class="fas fa-user-plus"></i>
                    Add User</a>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>dp</th>

                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Actions</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                
                            if ($result) {
                                foreach ($result as $row) {
                                    ?>
                                    
                                    <tr>
                                        <td>
                                            <?= $row['id'] ?>
                                        </td>
                                        <td style="width:10%">
                                        <img src="<?php  echo $row['profile'];?>"alt="dp" class="rounded-circle w-50 h-50 ">
                                        </td>
                                        <td>
                                            <?= ucfirst($row['first_name']); ?>
                                        </td>
                                        <td>
                                            <?= ucwords(substr($row['last_name'], 0, 2)) . strtolower(substr($row['last_name'], 2)); ?>
                                        </td>
                                        <td>
                                            <?= $row['email'] ?>
                                        </td>
                                        
                                        <td>
                                            <?= $row['created_at']; ?>
                                        </td>
                                        <td>
                                            <?= $row['updated_at']; ?>
                                        </td>
                                      

                                        <td class = "d-flex gap-2">
                                            <a href="users_update.php?id=<?= $row['id'] ?>"
                                                class="btn btn-success btn-sm float-end">
                                                <i class="bi bi-pencil-square"></i> EDIT
                                            </a>
                                      
                                            <form action="./server/handler.php" method="POST">
                                                <button type="submit" name="userdelete" class="btn btn-danger btn-sm float-end"
                                                    value="<?= $row['id']; ?>"
                                                    onclick="return confirm('Are you sure you want to delete user?')">
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
                                    <td colspan="12">No Record</td>
                                </tr>
                                <?php
                            }


                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
</div>
</div>


    </body>

    </html>


</body>

</html>