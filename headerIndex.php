<?php ?>
<header>
<button id="menuButton"><span class="material-symbols-outlined">menu</span></button>

            <nav>
            <button role="icon-button">X</button>
                <li ><a href="index.php" class="menuLink">Accueil</a></li>
            <?php if (empty($_SESSION['id'])){ ?>
                <li><a href="View/inscription.php" class="menuLink">S'enregistrer</a></li>
                <li><a href="View/connexion.php" class="menuLink">Se connecter</a></li>
            <?php } ?>


            <?php if ($_SESSION['id']!=null){ ?>
                <li><a href="View/taskform.php" class="menuLink">Liste de tâches</a></li>
                <li><a href="View/etiquette.php" class="menuLink">Version étiquettes</a></li>
                <li><a href="View/deconnexion.php" class="menuLink">Déconnexion</a></li>
            <?php } ?>

            </nav>

</header>