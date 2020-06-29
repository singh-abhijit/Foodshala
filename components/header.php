<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <h4>Foodshala</h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item ">
                    <a class="nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Order Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart_items'])) {
                            $count = count($_SESSION['cart_items']);
                            echo $count;
                        } else {
                            echo 0;
                        }
                        ?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
                        <img src="./images/avatar2.webp" alt="User" class="user_avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">
                            <?php
                            if (isset($_SESSION['name'])) {
                                echo $_SESSION['name'];
                            } else {
                                echo "User";
                            }
                            ?>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Update Details</a>
                        <a class="dropdown-item" href="logout.php">
                            <?php
                            if (isset($_SESSION['name'])) {
                                echo "Log Out";
                            } else {
                                echo "Clear Cart";
                            }
                            ?>
                        </a>
                        <!-- <form class="myform" action="homepage.php" method="post">
                                <input name="logout" type="submit" id="logout_btn" value="Log Out" /><br>
                            </form> -->
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>