<?php
session_start();
require_once('./connection/connect.php');

if (isset($_GET['id'])) {
    $asset_id = $_GET['id'];
    $sql = "SELECT assets.*, categories.name AS category_name FROM assets
            LEFT JOIN categories ON assets.category_id = categories.id
            WHERE assets.id = :asset_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':asset_id', $asset_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Asset ID not provided.";
    exit;
}
?>

<?php include("./includes/header.php"); ?>
<?php include("./includes/sidebar.php"); ?>
<style>
    .asset-image {
        max-width: 150px; 
        height: auto;
    }
    .card-title {
        font-weight: bold;
    }
    .card-text {
        word-wrap: break-word;
        font-size: 15px;
    }
</style>

<div class="main-content col-md-9 ml-sm-auto col-md-10 px-md-4 mt-4">
    <div class="container-fluid mt-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <h2 class="text-center">View Asset Details</h2>
                <div class="card">
                    <img src="<?= $result['image']; ?>" class="card-img-top" alt="Asset Image">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder"><?= ucfirst($result['name']); ?></h5>
                        <p class="card-text">Category: <i><?= $result['category_name']; ?></i></p>
                        <p class="card-text">Quantity: <i><?= $result['quantity']; ?></i></p>
                        <p class="card-text">Description: <i><?=  $result['description']; ?></i></p>
                    </div>
                    <div class="card-footer">
                        <a href="update_asset.php?id=<?= $result['id']; ?>" class="btn btn-primary">Edit</a>
                        <form action="./server/handler.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="assetdelete" value="<?= $result['id']; ?>">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this asset?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./includes/footer.php"); ?>
