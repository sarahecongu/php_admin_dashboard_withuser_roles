<?php
session_start();
require_once('./connection/connect.php');
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
// count total assets
$sql = "SELECT COUNT(*) AS total_assets FROM assets";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_assets = $result['total_assets'];

// cont total users
$sql = "SELECT COUNT(*) AS total_users FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_users = $result['total_users'];
// total count for categories
$sql = "SELECT COUNT(*) AS total_category FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_category = $result['total_category'];

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
if ($_SESSION["is_admin"]) {
 ?>
<?php 
include("./includes/header.php");
 ?>
<body>
    <!-- Sidebar Navigation -->
    <div class="container">
        <div class="row">
        <?php 
           include("./includes/sidebar.php");
           ?>
            <div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4">
                <div class="header bg-gradient">
                    <h2 class="text-center">Welcome to Admin Dashboard</h2>
                </div>
                <!-- Admin stats Start -->
                    <div class="summary bg-dark.bg-gradient">
                    <h3 class="text-center mb-3">Summary</h3>
                    <div class="summary-cards">
                        <div class="summary-card bg-warning">
                            <i class="fas fa-users summary-icon text-white"></i>
                            <div class="summary-text">
                                <h4 class="text-white">Total Users</h4>
                                <p class="text-white"><?php echo $total_users; ?></p>
                            </div>
                        </div>
                        <div class="summary-card  bg-success">
                            <i class="fas fa-boxes summary-icon text-white"></i>
                            <div class="summary-text">
                                <h4 class="text-white">Total Assets</h4>
                                <p class="text-white"><?php echo $total_assets; ?></p>
                            </div>
                        </div>
                        <div class="summary-card bg-dark">
                            <i class="fas fa-list-ul summary-icon text-white"></i>
                            <div class="summary-text">
                                <h4 class="text-white">Total Categories</h4>
                                <p class="text-white"><?php echo $total_category; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                 <?php 
                }
                else {
                ?>
               

                 <?php 
                include("./includes/header.php");
                ?>
                 <?php 
                include("./includes/sidebar.php");
                ?>
                <div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4  ">
                <div class="header bg-gradient ml-4">
                    <h2 class="text-center text-warning"><?php echo $_SESSION["first_name"]; ?> welcome to your Dashboard</h2>
                </div>
                <div class="container-fluid mt-5">
                       <div class="summary bg-dark.bg-gradient">
                    <h3 class="text-center mb-3">Summary</h3>
                    <div class="summary-cards">
            <div class="summary-card bg-warning">
                <i class="fas fa-users summary-icon text-white"></i>
                <div class="summary-text">
                    <h4 class="text-white">Total Assets</h4>
                    <p class="text-white"><?php echo count($user_assets); ?></p>
                </div>
            </div>
            <div class="summary-card bg-success">
                <i class="fas fa-boxes summary-icon text-white"></i>
                <div class="summary-text">
                    <h4 class="text-white">Returned Assets</h4>
                    <p class="text-white">
                        <?php
                        $returned_count = 0;
                        foreach ($user_assets as $assets) {
                            if ($assets['return_status']) {
                                $returned_count++;
                            }
                        }
                        echo $returned_count;
                        ?>
                    </p>
                </div>
            </div>
            <div class="summary-card bg-dark">
                <i class="fas fa-list-ul summary-icon text-white"></i>
                <div class="summary-text">
                    <h4 class="text-white">Not Returned</h4>
                    <p class="text-white"><?php echo count($user_assets) - $returned_count; ?></p>
                </div>
            </div>
        </div>
                </div>
        
  




    </div>
</div>







                </div>
              


            <?php 
            } ?>
                 
                

                
           
            </div>
        </div>
    <?php 
           include("./includes/footer.php");
           ?>

 