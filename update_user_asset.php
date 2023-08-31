<?php
session_start();

?>
<?php
require_once('./connection/connect.php');
?>
<?php
include("./includes/header.php");

$query_user = "SELECT id, first_name,last_name FROM users";
$stmt = $conn->prepare($query_user);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch asset names
$query_asset = "SELECT id,name FROM assets";
$stmt = $conn->prepare($query_asset);
$stmt->execute();
$assets = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<?php
       if (isset($_GET['id'])) {
        $user_asset_id = $_GET['id'];
        $sql = "SELECT * FROM user_asset  WHERE id=:user_asset_id";
        $stmt = $conn->prepare($sql);
        $data = [':user_asset_id' => $user_asset_id];
        $stmt->execute($data);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4 mt-4">

    <div class="container mt-5">
        <h2>Update Assets</h2>
        <form action="./server/handler.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <div class="form-group">
            <label for="asset_id">user Name:</label>
            <select name="user_id" class="form-control" required>
                    <?php
                foreach ($users as $result) {

                echo "<option value='" . $result['id'] . "'>" . $result['first_name'] . " " . $result['last_name'] . "</option>";
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                    <label for="asset_id">Asset:</label>
                    <select class="form-control" name="asset_id" required>
                        <?php
                        foreach ($assets as $result) {
                            echo "<option value='{$result['id']}'>{$result['name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                <label for="return_status"> Returned:</label>
                <input type="checkbox" name="return_status" value="1">
                

            </div>
            <div class="form-group">
                <label for="return_date">return_date</label>
                <input type="date" class="form-control" name="return_date">
            </div>
           
            <button type="submit" class="btn btn-primary" name="update_user_asset"><i class="fas fa-check"></i> Update
                Asset</button>
            <a href="update_user_asset.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back </a>
        </form>
    </div>
</body>

</html>