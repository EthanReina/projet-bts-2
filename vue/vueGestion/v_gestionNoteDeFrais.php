<div class="container">

    <div class="row">
        <div class="col-12">

        <div class="card">

            <div class="card-body">

            <h5 class="card-title p-2"><?php  echo $result['mission'] ?></h5>

            <table class="table table-borderless table-bordered">
                <tr>
                    <th>Libellé</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Justificatif</th>
                    <th>Action</th>
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
                                    </td>

                                    <td>
                                        <?php 
                                            if ($DonneesInfoLigneFc['justificatif'] == NULL) {
                                                echo '<p class="text-danger fw-bold">Aucun</p>'; } 
                                            else { 
                                                echo '<a class="fw-bold" href='.$DonneesInfoLigneFc['justificatif'].'>'.$DonneesInfoLigneFc['justificatif'].'</a>'; }
                                        ?>
                                    </td>

                                    <td>
                                        <a href="index.php?ctl=gestion&idnote=<?php echo $result['id_note']?>&action=validStatut&idLigneFc=<?php echo $DonneesInfoLigneFc['id_fc'] ?>"><button class="btn btn-success">Valider</button></a>
                                        <a href="index.php?ctl=gestion&idnote=<?php echo $result['id_note']?>&action=deniedStatut&idLigneFc=<?php echo $DonneesInfoLigneFc['id_fc'] ?>"><button class="btn btn-danger">Refuser</button></a>
                                    </td>


                                </tr>

                            <?php 


                            $statusGlobal[] = $DonneesInfoLigneFc['statut'];

                            } ?>
                        
                        
                        
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

                        foreach($infoLigneFk as $DonneesInfoLigneKm) {
                            ?>

                            
                            <td><?php echo $DonneesInfoLigneKm['kilometre'] ?></td>
                            <td><?php echo $DonneesInfoLigneKm['montant'] ?> € </td>
                            

                    <?php } ?>
                </tr>
            </table>

            <div class="border p-2 mb-3">
                <b>Total à rembourser : <?php echo $result['montant'] ?> €</b>
            </div>

            <div class="p-2 border fw-bold text-warning fs-5 text-center">
                
                <?php
                    if(in_array(2, isset($statusGlobal) ? $statusGlobal : [])) {
                        echo '<p class="text-danger fw-bold">Refusé</p>';
                        DbUtilisateur::changerStatutGlobal(2, $result['id_note']);

                    }
                    else if(in_array(0, isset($statusGlobal) ? $statusGlobal : [])) {
                        echo '<p class="text-warning fw-bold">En attente</p>';
                        DbUtilisateur::changerStatutGlobal(0, $result['id_note']);
                    }
                    else {
                        echo '<p class="text-success fw-bold">Validé</p>';
                        DbUtilisateur::changerStatutGlobal(1, $result['id_note']);
                    }
                ?>
            </div>

            </div>
        </div>
    </div>
    </div>

</div>