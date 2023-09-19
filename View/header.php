<?php ?>
<header>
<button id="menuButton"><span class="material-symbols-outlined">menu</span></button>

            <nav>
            <button role="icon-button">X</button>
                <li ><a href="../index.php" class="menuLink">Accueil</a></li>
            <?php if (empty($_SESSION['id'])){ ?>
                <li><a href="inscription.php" class="menuLink">S'enregistrer</a></li>
                <li><a href="connexion.php" class="menuLink">Se connecter</a></li>
            <?php } ?>
            <?php if (($_SESSION['login']==='admiN1337$')){ ?>
                <li><a href="admin.php" class="menuLink">Admin</a></li>
            <?php } ?>

            <?php if ($_SESSION['id']!=null){ ?>
                <li><a href="profil.php" class="menuLink">To do liste</a></li>
                <li><a href="deconnexion.php" class="menuLink">Déconnexion</a></li>
            <?php } ?>


            </nav>

</header>