<?php
session_start();
require_once('./connection/connect.php');

$user_id = $_SESSION['id'];
$sql = "SELECT user_asset.*, assets.name
FROM user_asset
INNER JOIN assets ON user_asset.asset_id = assets.id
WHERE user_asset.user_id = :user_id
ORDER BY user_asset.id DESC";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user_assets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php 
include("./includes/header.php");
 ?>
      <?php 
                include("./includes/header.php");
                ?>
                 <?php 
                include("./includes/sidebar.php");
                ?>
                <div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4  ">
                <div class="container-fluid mt-5">
        <h2 class="text-center mt-3">My Assets</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Asset</th>
                    <th>Return Status</th>
                    <th>Given Date</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user_assets as $assets) { ?>
                    <tr>
                        <td><?php echo $assets['name']; ?></td>
                       <td><?php echo $assets['return_status'] ? 'Returned' : 'Not Returned'; ?></td>
                        <td><?php echo $assets['given_date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
                </div>
                </div>
