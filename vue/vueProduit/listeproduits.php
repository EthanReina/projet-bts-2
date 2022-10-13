<div class ="row">
  <table class="table">
			   <thead class="thead-dark">
				  <tr>
					 <th>Ref</th>
					 <th>Designation</th>
					 <th>Prix</th>
					 <th>Action</th>
				  </tr>
			   </thead>
		    <tbody>		   	 
				<?php
				foreach($liste as $ligne){
					 echo "<tr>
							 <td>".$ligne['ref']."</td>
							 <td>".$ligne['libelle']."</td>
							 <td>".$ligne['prix']."</td>
							 <td>
								<a href=supprimerArticle.php?num=".$ligne['id']."><img src='./vue/images/remove.png' height=10 width=10></a>
								<a href=detailProduit.php?num=".$ligne['id']."><img src='./vue/images/detail.png' height=15 width=15></a>
								<a href=modifierProduit.php?num=".$ligne['id']."><img src='./vue/images/editer.png' height=15 width=15></a>
							 </td> 
						   </tr>";		
				}
				?>
		    </tbody>
  </table>   
        		  
</div>

