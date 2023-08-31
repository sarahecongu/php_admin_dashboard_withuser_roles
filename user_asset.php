<?php
session_start();
require_once('./connection/connect.php');
?>
<?php
if (isset($_POST['search_user_asset']) && !empty($_POST['search_user_asset'])) {
    $search_user_asset = $_POST['search_user_asset'];

    $sql = "SELECT user_asset.*, users.first_name, users.last_name, assets.name
        CASE return_status 
           WHEN 1 THEN 'Returned' 
           WHEN 0 THEN 'Not Returned' 
           ELSE 'Unknown' 
            FROM user_asset 
            JOIN users ON user_asset.user_id = users.id
            JOIN assets ON user_asset.asset_id = assets.id
            WHERE users.first_name = :search_user_asset OR users.last_name = :search_user_asset OR assets.name = :search_user_asset
            ORDER BY user_asset.id DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search_user_asset', $search_user_asset, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $query = "SELECT user_asset.*, users.first_name, users.last_name, assets.name
              FROM user_asset 
              JOIN users ON user_asset.user_id = users.id
              JOIN assets ON user_asset.asset_id = assets.id
              ORDER BY user_asset.id DESC";
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
<?php
include("./includes/nav.php");
?>
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4 mt-4">
<div class="container-fluid mt-5">


        <div class="container mt-5">
            <!-- searchbar -->
            <div class="row">
                <div class="col-md-12 mt-4">
                    <form action="user_asset.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control text-center" name="search_user_asset"
                                placeholder="Search for a user asset">
                            <button type="submit" class="btn btn-secondary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" ">
                <a href="add_user_asset.php" class="btn btn-success fixed mt-4 mb-3 float-mid-center"><i
                        class="fas fa-user-plus"></i>
                    Add User Asset</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Asset</th>
                                <th>Return Status</th>
                                <th>Given date</th>
                                <th>Return date</th>
                                <th>Created At</th>
                               
                                <th>Updated At</th>
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
                                        <td><?= ucfirst($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                        <td><?= ucfirst($row['name']); ?></td>
                                        
                                        <td>
                                            <?= ucfirst($row['return_status'] == 1 ? 'Returned' : 'Not Returned');?>
                                        </td>
                                        <td>
                                            <?= $row['given_date']; ?>
                                        </td>
                                    <td>
                                            <?= ucfirst($row['return_date']);?>
                                        </td>
                                       <td>
                                            <?= $row['created_at']; ?>
                                        </td>
                                        <td>
                                            <?= $row['updated_at']; ?>
                                        </td>
                                        <td class="d-flex gap-2">
                                            <a href="update_user_asset.php?id=<?= $row['id'] ?>"
                                                class="btn btn-success btn-sm float-end">
                                                <i class="bi bi-pencil-square"></i> EDIT
                                            </a>
                                        <form action="./server/handler.php" method="POST">
                                                <button type="submit" name="user_asset_delete" class="btn btn-danger btn-sm float-end"
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