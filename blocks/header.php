<header class="header">
            <a href="index.php" class="logo">
                <h2 class="logo-h2">Сборник методической документации</h2>
                <h1 class="logo-h1">ОАТК</h1>
                <img class="logo-img" src="img/svg/logo.svg" alt="логотип">
    </a>
            <div class="header-menu">
                <div class="profile">
                    <a href="<?php 
                    if($_SESSION["user"]["id"])
                    {
                        echo "profile.php?idProfile=" . $_SESSION["user"]["id"]."&window=1&num_rows=2";
                    }else{
                        echo "/login-window.php";
                    }
                    ?>">
                <img class="avatar-img" src="<?php
                if($_SESSION["user"]["name"]){
                    echo $_SESSION["user"]["avatar"];
                }else{
                    echo "avatars\GOST.jpg";
                }
                
                ?>" alt="аватар">
                </a>
                <div class="name-info">
                    <div class="profile-name">
                    <?PHP
                    if($_SESSION["user"]["name"]){
                        echo $_SESSION["user"]["name"];
                    } else {
                        echo "Гость";
                    };
                    ?>
                    
                    </div>
                </div>
                <?PHP
                    if($_SESSION["user"]["name"]){
                ?>
                <form action="/unlogin.php" method="post">
                <button class="unlogin " type="submit"><img src="img/svg/close.svg" alt=""></button>
                </form>
                <?PHP
                    }else{
                ?>
                <form action="/login-window.php" method="post">
                    <button class="unlogin " type="submit"><img src="/img/svg/update.svg" alt=""></button>
                </form>
                <?PHP
                    };
                ?>
                </div>
                <ul class="func-menu">
                <?PHP
                    if($_SESSION["user"]["rule"]=="admin"|| $_SESSION["user"]["rule"]=="superadmin"){
                ?>
                    <li class="func-item">
                        <a href="add-form.php" class="func-link">
                        <img class="func-ico" src="img/svg/plus-ico.svg" alt="Добавить методичку" class="func-icon">
                        <h4 class="item-name">Добавить методичку</h4>
                        </a>
                    </li>
                    
                <?PHP
                    }
                ?>
                    <li class="func-item">
                        <a href="search.php" class="func-link">
                        <img class="func-ico" src="img/svg/search.svg" alt="Поиск методички" class="func-icon">
                        <h4 class="item-name">Поиск методички</h4>
                    </a>
                    </li>
                    <li class="func-item">
                        <a href="admin-list.php?idProfile=1&window=1&num_rows=2&searchProfile=" class="func-link">
                        <img class="func-ico" src="img/svg/users.svg" alt="Добавить методичку" class="func-icon">
                        <h4 class="item-name">Поиск учасников</h4>
                        </a>
                    </li>
                </ul>
            </div>
    </header>