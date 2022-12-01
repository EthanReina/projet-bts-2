<div class="container w-50">

    <form action="index.php?ctl=utilisateur&action=validFormNoteFrais" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <h1 class="display-5 fs-2">Mission</h1>
        <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="mission" required>
    </div>
    <div class="mt-4" id="input-form">
        <h1 class="display-5 fs-2">Frais</h1>
    </div>

    <a class="btn text-white mt-5" id="add" style="background-color: #25d366;" href="#!" role="button">
            <img src="vue/images/ajouter.png" alt="" srcset="" height=20>
    </a>

    <div class="mt-5" id="input-form">
        <h1 class="display-5 fs-2">Véhicules</h1>

        <?php
            
            if(count($infoVehicule)==0) {

                echo "Vous n'avez pas de véhicule";

            } else {    ?>

                    <select class="form-select mt-3" aria-label="Default select example" name="vehicule">
                        <?php
                            foreach($infoVehicule as $vehicule) { ?>
                            <option value="<?php echo $vehicule['id_vehicule'] ?>"><?php echo ucfirst($vehicule['marque']).' '.ucfirst($vehicule['carburant']).' '.$vehicule['nb_places'].' places'; ?></option>
                            <?php } ?>
                    </select>

                    <div class="mt-5">
                        <label for="exampleInputEmail1" class="form-label">Nombres de kilomètres parcourus</label>
                        <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="nb_kilometres" required>
                    </div>

                <?php } 

        ?>

    </div>

    <div class="mt-5 form-check text-center">
        <button type="submit" class="btn btn-secondary" name="submit">Créer</button>
    </div>
    </form>

</div>

<script>

    const element =   `<div class="row g-3 mt-4 border-top">

                            <div class="col-4" style="width: 60%">
                                <label for="">Libellé</label>
                                <input type="text" class="form-control" name="libelle[]" required placeholder="Restaurant, Titre de transport, Parking, Péage etc...">
                            </div>

                            <div class="col-4" style="width: 30%"">
                                <label for="">Montant (€)</label>
                                <input type="number" class="form-control" name="montant[]" required>
                            </div>
                            
                            <div class="col-4" style="width: 10%">
                                <button type="button" id="close" class="btn btn-danger mt-4"> <img src='vue/images/close.png' height=15></button>
                            </div>

                            <div class="mt-3">
                                <label for="formFile" class="form-label">Joindre le justificatif</label>
                                <input class="form-control" type="file" id="formFile" name="images[]">
                            </div>

                        </div>`


    $(document).ready(function() {
        $('#add').click(function() {
            $('#input-form').append(

                element
            );
        });

        $(document).on('click', '#close', function() {
            $(this).parent().parent().remove();
        });
    });




</script>