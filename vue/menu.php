<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 border-bottom">
    <div class="container">
        <a href="index.php" class="navbar-brand">Note de frais</a>
            <div class="navbar-nav ms-auto">
                <?php
                    // Si l'utilisateur est connecté, on affiche l'icone profil et le bouton deconnexion    
                    if(isset($_SESSION['connect'])){ ?>
                        <a href="index.php?ctl=utilisateur&action=profil" class="nav-item nav-link"><img id="profil" src="vue/images/profil.png" alt="Icone Profil"></a>
                        <a href="index.php?ctl=utilisateur&action=deConnect" class="nav-item nav-link"><button class="btn btn-outline-primary">Déconnexion</button></a>
                    <?php } else { ?>
                        <a href="index.php?ctl=utilisateur&action=formConnect" class="nav-item nav-link"><button class="btn btn-outline-primary">Connexion</button></a>
                    <?php } 
                ?>
            </div>
    </div>
</nav>

