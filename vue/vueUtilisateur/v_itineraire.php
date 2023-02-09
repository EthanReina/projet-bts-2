<!-- v_itineraire.php -->

	<div class="container">
		<div class="row px-5 gx-5 pt-5 mt-5">
			<div class="col-md-6">
							<!-- <input type="text" name="code-postal" id="code-postal-depart"> -->

		<div class="input-group mb-3">
			<span class="input-group-text" id="basic-addon1">Ville de départ</span>
			<input type="text" name="code-postal" id="code-postal-depart" class="form-control" placeholder="Saisir le code postal" aria-label="Username" aria-describedby="basic-addon1">
		</div>


		<!-- select -->
		<br>
		<br>
		<select class="form-select" name="ville" id="ville-depart" size="4">

		</select>

		<div id="text-depart" class="pt-5">

		</div>
			</div>
			<div class="col-md-6">
				<div>

					<!-- <input type="text-arrivee" name="code-postal" id="code-postal-arrivee"> -->

					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Ville d'arrivée</span>
						<input type="text-arrivee" name="code-postal" id="code-postal-arrivee" class="form-control" placeholder="Saisir le code postal" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<!-- select -->
					<br>
					<br>
					<select class="form-select" name="ville" id="ville-arrivee" size="4">
				
					</select>
				
					<div id="text-arrivee" class="pt-5">
				
					</div>
				
				</div>
				
			</div>
		</div>
	</div>







<div class="container text-center mt-5 pt-5">
	<p id="nb_km" class="display-6 fs-3">Nombre de km : </p>
    <input id="nb_km_input" type="text" style="display: none;" name="nb_km_input" value="">
</div>

<script>


	// DEPART

	$('#code-postal-depart').on('keyup', function() {	
		var codePostalDepart = $(this).val();
		$.ajax({
			url: `https://geo.api.gouv.fr/communes?codePostal=${codePostalDepart}`,
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				console.log(data);
				// add respone to select #ville
				$('#ville-depart').html('');
				//$('#ville').append(`<option selected disabled>${codePostal}</option>`);		
				$.each(data, function(index, value) {
					$('#ville-depart').append(`<option value="${value.nom}">${value.nom}</option>`);		
				});
			}
		});
	});


		// console log input value select
		$('#ville-depart').on('change', function() {
		console.log($(this).val());

		// add respone to div #text
		$('#text-depart').html('');
		$('#text-depart').append(`<p> Ville de départ : ${$(this).val()}</p>`);

		// lontitude et latitude de la ville
		$.ajax({
			url: `https://nominatim.openstreetmap.org/search?q=${$(this).val()}&format=json`,
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				console.log(data);
				const latitudeDepart = data[0].lat;
				const longitudeDepart = data[0].lon;
				// $('#text-depart').append(`<p> Latitude : ${data[0].lat}</p>`);
				// $('#text-depart').append(`<p> Longitude : ${data[0].lon}</p>`);

				$('#code-postal-arrivee').on('keyup', function() {	
				var codePostalArrivee = $(this).val();
				$.ajax({
					url: `https://geo.api.gouv.fr/communes?codePostal=${codePostalArrivee}`,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						console.log(data);
						// add respone to select #ville
						$('#ville-arrivee').html('');
						//$('#ville').append(`<option selected disabled>${codePostal}</option>`);		
						$.each(data, function(index, value) {
							$('#ville-arrivee').append(`<option value="${value.nom}">${value.nom}</option>`);		
						});
					}
				});
			});


				// console log input value select
				$('#ville-arrivee').on('change', function() {
				console.log($(this).val());

				// add respone to div #text
				$('#text-arrivee').html('');
				$('#text-arrivee').append(`<p> Ville de d'arrivée : ${$(this).val()}</p>`);

				// lontitude et latitude de la ville
				$.ajax({
					url: `https://nominatim.openstreetmap.org/search?q=${$(this).val()}&format=json`,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						console.log(data);
						const latitudeArrivee = data[0].lat;
						const longitudeArrivee = data[0].lon;
						// $('#text-arrivee').append(`<p> Latitude : ${data[0].lat}</p>`);
						// $('#text-arrivee').append(`<p> Longitude : ${data[0].lon}</p>`);

						// calcul distance avec l'API https://wxs.ign.fr/calcul/geoportail/itineraire/rest/1.0.0/route?resource=bdtopo-pgr&profile=car&optimization=shortest&start=2.655400,48.542107&end=2.333333,48.866667

						$.ajax({
							url: `https://wxs.ign.fr/calcul/geoportail/itineraire/rest/1.0.0/route?resource=bdtopo-pgr&profile=car&optimization=shortest&start=${longitudeDepart},${latitudeDepart}&end=${longitudeArrivee},${latitudeArrivee}`,
							type: 'GET',
							dataType: 'json',
							success: function(data) {
								console.log(data);
								$('#nb_km').html('');
								
								$('#nb_km').append(`<p> Distance : ${data.distance / 1000} KM</p>`);
                                $('#nb_km_input').val(data.distance / 1000);

							}
						});

						
					}
				});

			});

			}
		});

	});


	// if input is empty remove div #text
	$('#code-postal-depart').on('keyup', function() {
		if ($(this).val() == '') {
			$('#text-depart').html('');
			$('#nb_km').html('');
			// empty input code postal arrivee
			$('#code-postal-arrivee').val('');
			// empty select ville arrivee
			$('#ville-arrivee').html('');
			$('#text-arrivee').html('');
			$('#nb_km').html('');


		}
	});

	$('#code-postal-arrivee').on('keyup', function() {
		if ($(this).val() == '') {
			$('#text-arrivee').html('');
			$('#nb_km').html('');
		}
	});

</script>


