<section class="" style="background-color: #609a7d;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="card-body p-4 p-lg-5 text-black">
				<form action=".?r=contact/send&to=<?php echo $data["to"]->idutilisateur; ?>" method="post">

					<div class="mb-3 pb-1 text-center">
					<span class="h1 fw-bold mb-0">Faire une proposition</span>
					</div>

					<h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Ecriver un message et selectionner ce que vous echanger et ce que vous voulez</h5>

					<div class="form-outline mb-4">
					<label class="form-label" for="title">Titre de la proposition</label>
					<input type="text" id="title" name="title" class="form-control form-control-lg" />
					</div>

					<div class="form-outline mb-4">
					<label class="form-label" for="desc">Description</label>
					<textarea id="desc" name="desc" rows="2" class ="form-control form-control-lg"></textarea>
					</div>

					<div class = "row">
						<div class = "col mb-5 min-vw-50">
							<p class="fw-normal">Je souhaiterais :</p>
							<div class="mx-3">
							<?php
								foreach($data["demandes"] as $d){

									$produit = $d->produit;

									echo <<<html

									<div class="form-check">
										<input
											class="form-check-input"
											type="checkbox"
											value="$produit->idproduit"
											id="flexCheckDefault"
											name="wants[]"
										/>
										<label class="form-check-label" for="flexCheckDefault">
											$produit->nom
										</label>
									</div>

									html;

								}
								?>
							</div>
						</div>
						<div class = "col mb-5 min-vw-50">
							<p class="fw-normal">Je propose :</p>
							<div class="mx-3">
								<?php
								foreach($data["proposes"] as $d){

									$produit = $d->produit;

									echo <<<html

									<div class="form-check">
										<input
											class="form-check-input"
											type="checkbox"
											value="$produit->idproduit"
											id="flexCheckDefault"
											name="gives[]"
										/>
										<label class="form-check-label" for="flexCheckDefault">
											$produit->nom
										</label>
									</div>

									html;

								}
								?>
							</div>
						</div>
					</div>

					<div class="pt-1 mb-4 text-center">
					<button class="btn btn-dark btn-lg btn-block" type="submit">Valider la proposition</button>
					</div>

				</form>
			</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
