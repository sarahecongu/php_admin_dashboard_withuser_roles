<?php
session_start();

?>
<?php
require_once("./connection/connect.php");
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
include("./includes/sidebar.php");
?>

<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4 mt-4">

<div class="container mt-5">
    <h2>Create User Asset</h2>
    <form action="./server/handler.php" method="post">
    <div class="form-group">
    <label for="user_id">User Name:</label>
    <select class="form-control" name="user_id" required>
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
            <label for="date">Return date:</label>
            <input type="date" class="form-control" name="return_date" required>
        </div>
        <button type="submit" class="btn btn-success" name="userasset"><i class="fas fa-check"></i>Create User Asset</button>
        <a href="user_asset.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </form>
</div>


</body>
</html>
