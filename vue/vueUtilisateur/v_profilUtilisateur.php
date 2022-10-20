<div class="container">

    <div class="row p-5" style="height: 600px">

        <div class="col-3 border border-dark bg-white">

            <div class="row border border-dark" style="height: 250px">

                <div class="col-12 text-center">
                    <img src="vue/images/profil.png" alt="Profil" class="img-fluid" style="height: 175px">
                    <h3 class="text-center display-6 fs-2"><?php echo ucfirst($result['prenom']) . " " . ucfirst($result['nom']); ?></h3>
                </div>

            </div>

            <div class="row text-center">
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

                        <label for="exampleInputEmail1" class="form-label pt-2 display-6 fs-5">Véhicule</label>

                        <table class="table">
                            <tr>
                                <th>Marque</th>
                                <th>Carburant</th>
                            </tr>
                        </table>

                        <div class="text-center">

                            <button class="btn btn-outline-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un véhicule</button>

                                                        <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header mb-3">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajout de véhicule</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="index.php?ctl=utilisateur&action=ajoutVehicule" method="post">

                                    <div class="container w-75">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Marque du véhicule">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Carburant">
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