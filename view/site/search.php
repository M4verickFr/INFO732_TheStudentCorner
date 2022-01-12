<section class="mb-5">
	<div class="row col-md-6 offset-md-3 mt-5">

		<form class="input-group mb-3">
			<div class="input-group-text p-0">
				<select name="type" class="form-select form-select-lg shadow-none bg-light border-0">
					<option value="0" <?php echo $data["type"] == 0 ? "selected" : ""; ?>>Service / Produit</option>
					<option value="1" <?php echo $data["type"] == 1 ? "selected" : ""; ?>>Service</option>
					<option value="2" <?php echo $data["type"] == 2 ? "selected" : ""; ?>>Produit</option>
				</select>
			</div>

			<input type="text" value="<?php echo $data["search"]; ?>" name="search" class="form-control" placeholder="Search Here">
			<button type="submit" class="input-group-text shadow-none px-4 btn-warning">
				<i class="bi bi-search"></i>
			</button>
		</form>

	</div>
	<div class="row col-md-6 offset-md-3">

	<div class="card card-margin">
                <div class="card-body">
                    <div class="row search-body">
                        <div class="col-lg-12">
                            <div class="search-result">
                                <div class="result-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="records">Showing: <b>1-20</b> of <b>200</b> result</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-body">
                                    <div class="table-responsive">
                                        <table class="table widget-26">
                                            <tbody>
												<?php 

												foreach($data["res"] as $d){
													$user = $d[0];

													$demandes = "";
													$offres = "";

													// $demandes = implode(', ', $d[1]);

													foreach($d[1] as $demande){
														$demandes .= $demande->produit->nom . ", ";
													}

													foreach($d[2] as $offre){
														$offres .= $offre->produit->nom . ", ";
													}

													$demandes = substr($demandes, 0, -2);
													$offres = substr($offres, 0, -2);

													if ($demandes == "") $demandes = "Rien pour le moment";
													if ($offres == "") $offres = "Rien pour le moment";

													echo <<<html

													<tr>
														<td>
															<div class="widget-26-profil-img">
																<img src="https://bootdey.com/img/Content/avatar/avatar3.png" />
															</div>
														</td>
														<td>
															<div class="widget-26-profil">
																<a href="?r=user&id=$user->idutilisateur">$user->nom $user->prenom</a>
																<p class="text-muted m-0">Annecy</p>
															</div>
														</td>
														<td>
															<div class="widget-26-profil-info">
																<p class="m-0"><strong>Je recherche : </strong> $demandes </p>
																<p class="m-0"><strong>Je propose : </strong> $offres </p>
															</div>
														</td>
														<td>
														<div class="widget-26-icon">
															<a href="?r=contact&to=$user->idutilisateur"><i class="bi bi-arrow-right-square-fill"></i></a>
														</div>
													</td>
													</tr>

													html;
												};

												?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="d-flex justify-content-center">
                        <ul class="pagination pagination-base pagination-boxed pagination-square mb-0">
                            <li class="page-item">
                                <a class="page-link no-border" href="#">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link no-border" href="#">1</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">2</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">3</a></li>
                            <li class="page-item"><a class="page-link no-border" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link no-border" href="#">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
</section>