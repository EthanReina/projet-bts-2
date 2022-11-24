<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 border-bottom">
    <div class="container">
        <a href="index.php" class="navbar-brand">Note de frais</a>
            <div class="navbar-nav ms-auto">
            <?php
                        // Si l'utilisateur est connecté, on affiche l'icone profil et le bouton deconnexion    
                        if(isset($_SESSION['connect'])){ ?>
                            <div class="dropdown">
                                <li class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                    <img id="profil" src="vue/images/profil.png" alt="Icone Profil">
                                </li>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?ctl=utilisateur&action=profil" class="nav-item nav-link">Profil</a></li>
                                    <li><a href="index.php?ctl=utilisateur&action=deConnect" class="nav-item nav-link">Déconnexion</a></li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <a href="index.php?ctl=utilisateur&action=formConnect" class="nav-item nav-link"><button class="btn btn-outline-primary">Connexion</button></a>
                        <?php } 
                        ?>
            </div>
    </div>
</nav>

<?php

// EN TEST 

if(isset($_SESSION['connect']) && !isset($_GET['action'])) {

    include 'model/dbUtilisateur.php';
    
    $result = DbUtilisateur::getInfoUser($_SESSION['email']);
    $id_utilisateur = $result['id_utilisateur'];
    $infoNoteDeFrais = DbUtilisateur::getNoteDeFrais($id_utilisateur);


    ?>



    <div class="container text-center pt-2">

        <h1 class="pb-5">Bienvenue <?php echo ucfirst($result['prenom']); echo ' '.ucfirst($result['nom']) ?></h1>

        <h2 class="pb-5">Vos notes de frais</h2>

        <?php

            if(count($infoNoteDeFrais)== 0) { ?>

                <p class="pt-5 fs-5">Pas de note de frais</p>

            <?php } else { 
                
                //$infoLigneFc = DbUtilisateur::getLigneFc($infoNoteDeFrais['id_note']); ?>
                
                <div class="row">


                    <?php
                     
                    foreach($infoNoteDeFrais as $DonneesInfoNoteDeFrais) {
                        
                        $infoLigneFc = DbUtilisateur::getLigneFc($DonneesInfoNoteDeFrais['id_note']);
                        $infoLigneKm = DbUtilisateur::getLigneFk($DonneesInfoNoteDeFrais['id_note']);
                        
                        ?>





                        <div class="col-4">

                            <div class="card">

                                <div class="card-body">

                                <h5 class="card-title p-2"><?php  echo $DonneesInfoNoteDeFrais['mission'] ?></h5>

                                <table class="table table-borderless table-bordered">
                                    <tr>
                                        <th>Libellé</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                    </tr>
                                    <tr>
                                                <?php

                                                $total = 0;

                                                foreach($infoLigneFc as $DonneesInfoLigneFc) {
                                                    

                                                    ?>


                                                    <tr>
                                                        <td><?php echo $DonneesInfoLigneFc['libelle'] ?></td>
                                                        <td><?php echo $DonneesInfoLigneFc['montant_fc']; $total += $DonneesInfoLigneFc['montant_fc']; ?></td>
                                                        
                                                        <td>
                                                            <?php 
                                                                if ($DonneesInfoLigneFc['statut'] == 0) {
                                                                    echo '<p class="text-warning fw-bold">En attente</p>'; } 
                                                                else if ($DonneesInfoLigneFc['statut'] == 1) { 
                                                                    echo '<p class="text-success fw-bold">Validé</p>'; }
                                                                    
                                                                else {
                                                                    echo '<p class="text-danger fw-bold">Refusé</p>';
                                                                }
                                                            ?>

                                                    </tr>

                                                <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Sous total<b>
                                        </td>
                                        <td colspan="2" class="text-center">
                                            <?php echo $total; ?>
                                        </td>   
                                    </tr>
                                </table>


                                <table class="table table-borderless table-bordered">
                                    <tr>
                                        <th>Nombre de kilomètres</th>
                                        <th>Indémnités kilomètriques</th>
                                    </tr>
                                    <tr>
                                        <?php

                                            foreach($infoLigneKm as $DonneesInfoLigneKm) {
                                                ?>

                                                
                                                <td><?php echo $DonneesInfoLigneKm['kilometre'] ?></td>
                                                <td><?php echo $DonneesInfoLigneKm['montant'] ?> € </td>
                                                

                                        <?php } ?>
                                    </tr>
                                </table>

                                <div class="border p-2 mb-3">
                                    <b>Total à rembourser : <?php echo $DonneesInfoNoteDeFrais['montant'] ?> €</b>
                                </div>

                                <div class="p-2 border fw-bold text-warning fs-5 text-center">
                                    En attente
                                </div>

                                </div>
                            </div>
                        </div>


                     <?php }?>
    

                </div>
            <?php  } ?>




        <a href="index.php?ctl=utilisateur&action=formNoteFrais"><button class="btn btn-outline-secondary mt-5">Créer une note de frais</button></a>


    </div>


<?php }

?>
