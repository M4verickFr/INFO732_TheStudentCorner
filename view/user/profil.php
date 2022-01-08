<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row mb-4 d-flex justify-content-center">
		<div class="col-md-12">
			<div class="card mb-4 mb-md-0">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-3">
							<p class="mb-0">Full Name</p>
						</div>
						<div class="col-sm-9">
							<p class="text-muted mb-0"><?php print($data["user"]->prenom." ".$data["user"]->nom); ?></p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3">
							<p class="mb-0">Email</p>
						</div>
						<div class="col-sm-9">
							<p class="text-muted mb-0"><?php print($data["user"]->email); ?></p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-3">
							<p class="mb-0">Campus</p>
						</div>
						<div class="col-sm-9">
						<p class="text-muted mb-0"><?php print($data["user"]->idcampus->nom_campus); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row d-flex justify-content-center">

		<?php 

			foreach(["Je cherche" => "demandes", "Je propose" => "offres"] as $title => $name){
				echo <<<html

				<div class="col-md-6">
				<div class="card mb-4 mb-md-0">
					<div class="card-body">
						<h4 class="mb-4">$title</h4>
						<div class="row mb-4 d-flex justify-content-center">
							<form class="col-md-12" action=".?r=user/profil" method="post" id="addProductForm">
								<input type="hidden" value="addProduct" name="action" />
								<input type="hidden" value="$name" name="to" />
								<div class="input-group d-flex justify-content-around">
									<select name="type" class="col-md-2 rounded">
										<option selected>Type...</option>
										<option value="1">Service</option>
										<option value="2">Produit</option>
									</select>
	
									<input type="text" id="nom" name="nom" placeholder="Nom" class="col-md-2 rounded" />
									<input type="text" id="desc" name="desc" placeholder="Description" class="col-md-6 rounded" />
									
									<div class="input-group-append">
										<button class="btn btn-outline-secondary" type="submit" nmae="submit">Ajouter</button>
									</div>
								</div>
							</form>
						</div>

				html;


				foreach($data[$name] as $d){

					echo <<<hop

					<div class="d-flex justify-content-between mt-3">
						<p class="mb-0 align-self-center">$d->nom</p>
						<button type="button" class="btn btn-primary btn-floating btn-remove" data-id="$d->idproduit">Remove</button>
					</div>

					hop;
				};

				echo <<<html

						</div>
					</div>
				</div>

				html;
			};

		?>

    </div>
  </div>
</section>