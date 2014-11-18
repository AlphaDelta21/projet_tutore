<script type="text/javascript" src="jquery-2.1.1.js"></script>

<h2>Cette page est réservée au STAFF du club. </h2>
<table style="width: 100%;">
	<tr>
		<td style="border-right: 2px dotted purple; width: 50%; vertical-align : top;">	
			<table>
				<tr>
					<h2 style="">Connexion</h2>
					<td><label>Identifiant :</label></td> 
					<td><input type="text" name="identifiant" id="identifiant"></td>
				</tr>
				<tr>
					<td><label>Mot de passe :</label></td> 
					<td><input type="password" name="log" id="log"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Valider" id="valider"></td>
				</tr>
				<tr>
					<td id="destination"></td>		
				</tr>
			</table>
		</td>
		<td style="text-align : justify; padding-left : 70px; width: 50%;">
				<h2>Inscription</h2>
				<p>Pas encore inscrit ? Merci de remplir le formulaire ci-dessous :</p>
				
				<form method="POST" action="inscriptionstaff.php" target="_blank" style="text-align: left;">
					<label>NOM :</label> <input type="text" name="nom" autofocus required> <br>
					<label>Prénom : </label> <input type="text" name="prenom" required> <br>
					<label>Adresse mail : </label> <input type="email" name="mail" required> <br>
					<label>Identifiant :</label> <input type="text" name="identifiant" required> <br>
					<label>Mot de passe :</label> <input type="password" name="mot_de_passe" required> <br>
					<input type="Submit" value="S'inscrire" id="sinscrire">
				</form> 
		</td>
	</tr>
</table>


<script type="text/javascript">

	jQuery(function ()
			{
				$('#valider').on('click',function ()
				{
					var lien = 'secret.php?identifiant='+$('#identifiant').val()+'&log='+$('#log').val();
					$.ajax({type : 'GET',
							  url : lien,
							  async : false,
							  timeout : 3000,
							  success : function (data) {
						  		$('#destination').html(data);
							  },
							  error: function () {
							  	alert('La requete secret.php a échoué.');
							  }
							  
							 })
				});				
			})
</script>
