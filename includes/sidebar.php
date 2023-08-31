
<?php 
if ($_SESSION["is_admin"]) {
?>
    
    <aside class="col-md-4 col-lg-2 d-md-block sidebar fixed-top mb-3 nav-sidebar">
    <ul class="nav flex-column bg-dark text-white">
        <li class="nav-item">
            <div class="profile">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/020/765/399/small/default-profile-account-unknown-icon-black-silhouette-free-vector.jpg"
                    alt="Profile Picture" class="profile-pic">
                <h3>Sarah E.A</h3>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link-info text-white"
                href="dashboard.php">
                <i class="bi bi-house-door text-white"></i> Dashboard
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link-info text-white dropdown-toggle"
                href="categories.php" id="categoriesDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#categoriesSubmenu"
                aria-expanded="false">
                <i class="bi bi-list text-white"></i> Categories
            </a>
            <ul class="collapse bg-dark text-white" id="categoriesSubmenu">
                <li><a class="dropdown-item text-white" href="categories.php">View Categories</a></li>
                <li><a class="dropdown-item text-white" href="add_category.php">Add category</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link-info text-white dropdown-toggle"
                href="assets.php" id="assetsDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#assetsSubmenu"
                aria-expanded="false">
                <i class="bi bi-box text-white"></i> Assets
            </a>
            <ul class="collapse bg-dark" id="assetsSubmenu">
                <li><a class="dropdown-item text-white" href="assets.php">View Assets</a></li>
                <li><a class="dropdown-item text-white" href="add_asset.php">Add Assets</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link-info text-white dropdown-toggle"
                href="users.php" id="usersDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#usersSubmenu"
                aria-expanded="false">
                <i class="bi bi-person text-white"></i> Users
            </a>
            <ul class="collapse bg-dark" id="usersSubmenu">
                <li><a class="dropdown-item text-white" href="users.php">View Users</a></li>
                <li><a class="dropdown-item text-white" href="users_add.php">Add Users</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link-info text-white dropdown-toggle"
                href="user_asset.php" id="userAssetDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#userAssetSubmenu"
                aria-expanded="false">
                <i class="bi bi-person-plus text-white"></i> User Asset
            </a>
            <ul class="collapse bg-dark" id="userAssetSubmenu">
                <li><a class="dropdown-item text-white" href="user_asset.php">View User Assets</a></li>
                <li><a class="dropdown-item text-white" href="add_user_asset.php">Add User Asset</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link-info text-white "
                href="my_asset.php"><i  class="bi bi-box text-white"></i> My Assets
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link-info text-white" href="login.php">
                <i class="bi bi-box-arrow-right text-white"></i> Logout
            </a>
        </li>
    </ul>
</aside>
<?php 
}else  { 
        
    ?>
<aside class="col-md-4 col-lg-2 d-md-block sidebar fixed-top mb-3">
    <ul class="nav flex-column">
        <div class="profile">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/020/765/399/small/default-profile-account-unknown-icon-black-silhouette-free-vector.jpg"
                alt="Profile Picture" class="profile-pic">
            <h3>Sarah E.A</h3>
        </div>
        <ul class="nav flex-column bg-dark">
            <li class="nav-item">
                <a class="nav-link "
                    href="dashboard.php">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="my_asset.php"><i  class="bi bi-box"></i> my Assets
                </a>
            </li>
           <li class="nav-item">
                <a class="nav-link" href="login.php">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </li>
        </ul>
</aside>
<?php 
} ?>


