<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fa-solid fa-circle-xmark" onclick="this.parentElement.remove();"></i>
        </div>
        ';

    }
}


?>

<header class="admin-header">

    <div class="admin-flex fixed-top">
      <a href="index.php"><img class="logo" src="icon/logo.png"></a>

    <nav class="adminnavbar">
        <a href="index.php">HOME</a>
        <a href="menu.php">MENU</a>
        <a href="order.php">ORDER</a>
        <a href="review.php">REVIEW</a>
        <a href="about.php">ABOUT</a>
        <a href="contact.php">CONTACT</a>
    </nav>

    <div class="admin-icon">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user"></div>
       
        <a href="search_page.php"><div id="search-btn" class="fa-solid fa-magnifying-glass"></div></a>
        <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
         ?>
        <a href="wishlist.php"><div id="fav-btn" class="fa-solid fa-heart"><div><span class="fav-counter"><?= $count_wishlist_items->rowCount(); ?></span></div></div></a> 
        <a href="cart.php"><div id="cart-btn" class="fa-solid fa-cart-shopping"><div><span class="counter-counter"><?= $count_cart_items->rowCount(); ?></span></div></div></a>


    <div class="profile">
        <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
        ?>
        <a href="login.php" class="admin-btn">login</a>
        <a href="register.php" class="option-btn">register</a>

    </div>

    </div>

</header>