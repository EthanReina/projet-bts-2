<div class="container w-50">

    <form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mission</label>
        <input type="text" class="form-control" id="" aria-describedby="emailHelp">
    </div>
    <div class="mt-4" id="input-form">
        <h1 class="display-5 fs-2">Frais</h1>
    </div>

    <a class="btn text-white mt-3" style="background-color: #25d366;" href="#!" role="button">
            <img src="vue/images/ajouter.png" alt="" srcset="" height=20>
    </a>

    <div class="mt-4" id="input-form">
        <h1 class="display-5 fs-2">Véhicules</h1>

        <?php
            
            if(count($infoVehicule)==0) {

                echo "Vous n'avez pas de véhicule";

            } else {    ?>

                    <select class="form-select mt-3" aria-label="Default select example">
                        <?php
                            foreach($infoVehicule as $vehicule) { ?>
                            <option><?php echo ucfirst($vehicule['marque']).' '.ucfirst($vehicule['carburant']).' '.$vehicule['nb_places'].' places'; ?></option>
                            <?php } ?>
                    </select>

                <?php } 

        ?>

    </div>

    <div class="mt-5 form-check text-center">
    <button type="submit" class="btn btn-secondary">Créer</button>
    </div>
    </form>

</div>

<script>

    const element =   `<div class="row g-3 mt-1">

                            <div class="col-4" style="width: 60%">
                                <label for="">Libellé</label>
                                <input type="text" class="form-control" id="">
                            </div>

                            <div class="col-4" style="width: 30%"">
                                <label for="">Montant (€)</label>
                                <input type="number" class="form-control" id="">
                            </div>
                            
                            <div class="col-4" style="width: 10%">
                                <button type="button" class="btn btn-danger mt-4"> <img src='vue/images/close.png' height=15></button>
                            </div>

                        </div>
  
                        `;

    $(document).ready(function() {
        $('.btn').click(function() {
            $('#input-form').append(

                element
            );
        });

        $(document).on('click', '.btn-danger', function() {
            $(this).parent().parent().remove();
        });
    });




</script>