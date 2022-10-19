<div class="container">
    <div class="row p-5" style="height: 600px">
        <div class="col-3 border border-dark">
            <div class="row border border-dark" style="height: 250px">
                <div class="col-12 text-center">
                    <img src="vue/images/profil.png" alt="Profil" class="img-fluid" style="height: 175px">
                    <h3 class="text-center display-6 fs-2"><?php echo ucfirst($result['prenom']) . " " . ucfirst($result['nom']); ?></h3>
                </div>
            </div>

            <div class="row text-center">
                <button class="w-100 h-100 btn btn-outline-primary fs-4 rounded-0" style="border: 0">Informations</button>
            </div>
            <div class="row text-center">
                <button class="w-100 h-100 btn btn-outline-primary fs-4 rounded-0" style="border-left: 0; border-right: 0; border-bottom: 0" disabled>Mot de passe</button>
            </div>
            <div class="row text-center">
                <button class="w-100 h-100 btn btn-outline-primary fs-4 rounded-0" style="border-left: 0; border-right: 0;" disabled>Confidentialité & Sécurité</button>
            </div>
        </div>

        <div class="col-9 border border-dark">
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
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php  ?>" disabled>
                        <div class="text-center">
                            <button class="btn btn-outline-secondary mt-3">Ajouter un véhicule</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>