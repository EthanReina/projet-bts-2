<div class="container">
    <h1>Mon profil</h1>
    <div class="mb-3">

        <div class="card w-1">
            <div class="card-body">
                <h5 class="card-title"> <h4><p1 class="fst-italic"> <p class="text-center" >Mes informations</p></p1></h4>

            </div>


        <div class="container">
            <div class="row">

                <div class="col-6 ">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Prenom</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo ucfirst($result['prenom']) ?>" disabled>
                    </div>

                </div>

                <div class="col-6 ">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Nom</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo ucfirst($result['nom']) ?>" disabled>
                    </div>
                    
                </div>


        </div>

        <div class="row">

            <div class="col-6 ">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Adresse e-mail</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['email'] ?>" disabled>
                </div>

            </div>

            <div class="col-6 ">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Login</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['login'] ?>" disabled>
                </div>

            </div>

        </div>

        <div class="row">



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
                        echo "<td>" . ucfirst($vehicule['carburant']) . "</td>";
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
                                    <input type="text" class="form-control" name="marque" placeholder="Marque du véhicule" required>
                                </div>
                                <select class="form-select mb-3" aria-label="Default select example" name="carburant">
                                    <option value="diesel">Diesel</option>
                                    <option value="essence">Essence</option>
                                    <option value="electrique">Electrique</option>
                                </select>
                                
                                <div class="mb-3">
                                    <input type="number" class="form-control" name="nb_places" placeholder="Nombre de place" required>
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






                    
      
<div class="mb-3">
    <form action='index.php?ctl=utilisateur&action=modification' method='post'>
        <div class="container">
            <div class="card w-1">
            <div class="card-body">
                <h5 class="card-title"><p1 class="fst-italic"> <p class="text-center" >Modification de mot de passe </h5></p></p>
            
            
                <div class="form-group">
                    <label for="pwd">Nouveau mot de passe:</label>
                    <input type="password" class="form-control" name="pwd">
                </div>
                
                <div class="mt-3">
                    <button  type="submit" class="btn btn-outline-primary" value="valider" name="Submit">Valider</button>
                </div>
            </div>
        </div>
    </form>
</div>
