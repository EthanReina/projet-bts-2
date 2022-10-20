<!-- Vue utilisateur -->

<div class="container">

    <div class="row p-5" style="height: 600px">

        <div class="col-3 border border-dark bg-white">

            <div class="row border border-dark" style="height: 250px">

                <div class="col-12 text-center">
                    <img src="vue/images/profil.png" alt="Profil" class="img-fluid" style="height: 175px">

                    <!-- ucfirst() met la premiere lettre du mot En Majuscule -->
                    <h3 class="text-center display-6 fs-2"><?php echo ucfirst($result['prenom']) . " " . ucfirst($result['nom']); ?></h3>
                </div>

            </div>

            <div class="row text-center">

                <!-- Le href renvoie sur le ctl utilisateur et l'action 'profile', elle affiche les informations utilisateurs  -->
                <button class="w-100 h-100 btn btn-outline-primary fs-4 rounded-0" style="border: 0"><a class="nav-link" href="index.php?ctl=utilisateur&action=profil">Informations</a></button>
            </div>

            <div class="row text-center">
                <button class="w-100 h-100 btn btn-outline-primary fs-4 rounded-0" style="border-left: 0; border-right: 0; border-bottom: 0" disabled>Mot de passe</button>
            </div>

            <div class="row text-center">
                <button class="w-100 h-100 btn btn-outline-primary fs-4 rounded-0" style="border-left: 0; border-right: 0;" disabled>Confidentialité & Sécurité</button>
            </div>

        </div>

        <div class="col-9 border border-dark bg-white">

            <div class="row">
                <h5 class="fs-4 p-5">Informations du compte</h5>
            </div>

            <div class="row">

                <div class="col-6 border">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Prenom</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo ucfirst($result['prenom']) ?>" disabled>
                    </div>

                </div>

                <div class="col-6 border">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Nom</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo ucfirst($result['nom']) ?>" disabled>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-6 border">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Adresse e-mail</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['email'] ?>" disabled>
                    </div>

                </div>

                <div class="col-6 border">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Login</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['login'] ?>" disabled>
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-12">

                    <div class="mb-3">

                        <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Véhicule(s)</label>

                        <!-- Les véhicules de l'utilisateur sont affichés dans un tableau  -->

                        <?php
                        if(count($infoVehicule)==0){
                            echo "<br>Vous n'avez pas de véhicule";
                        }
                        else{?>

                        <table class="table">
                            <tr>
                                <th>Marque</th>
                                <th>Carburant</th>
                                <th>Nombre de place</th>
                            </tr>
                            <?php
                            // On parcours le tableau $infoVehicule renvoyé par la fonction getInfoVehicule(), on affiche les informations du véhicule
                            foreach ($infoVehicule as $vehicule) {
                                echo "<tr>";
                                echo "<td>" . $vehicule['marque'] . "</td>";
                                echo "<td>" . $vehicule['carburant'] . "</td>";
                                echo "<td>" . $vehicule['nb_places'] . "</td>";
                                echo "<td><a class='px-2' href='index.php?ctl=utilisateur&action=supprimer&id=".$vehicule['id_vehicule']."'><img src='./vue/images/trash.png' height=20 width=20></a></td>";

                                echo "</tr>";
                            }
                            ?>
                        </table>

                        <?php
                        }
                        
                        ?>

                        <div class="text-center">

                            <!-- Bouton pour ajouter un véhicule -->
                            <button class="btn btn-outline-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un véhicule</button>

                            <!-- Le Pop-up qui s'affiche sur le clic du bouton ci-dessus -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header mb-3">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajout de véhicule</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Formulaire dans le pop up, elle redirige vers le controller utilisateur et l'action ajoutVehicule -->
                                <form action="index.php?ctl=utilisateur&action=ajoutVehicule" method="post">

                                    <div class="container w-75">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="marque" placeholder="Marque du véhicule">
                                        </div>
                                        <select class="form-select mb-3" aria-label="Default select example" name="carburant">
                                            <option value="diesel">Diesel</option>
                                            <option value="essence">Essence</option>
                                            <option value="electrique">Electrique</option>
                                        </select>
                                        
                                        <div class="mb-3">
                                            <input type="number" class="form-control" name="nb_places" placeholder="Nombre de place">
                                         </div>
                            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-outline-success">Ajouter</button>
                                        </div>
                                    </div>

                                </form>

                                </div>
                            </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>