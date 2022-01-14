<section class="mb-5">
    <div class="text-center row col-md-6 offset-md-3 mt-5">

        <h3>Mes propositions</h3>

    </div>
    <div class="row mt-3 col-md-6 offset-md-3">

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

                                                foreach($data["propositions"] as $d){
                                                    $expediteur = $d->expediteur;
                                                    $destinataire = $d->destinataire;

                                                    echo <<<html

                                                    <tr>
                                                        <td>
                                                            <div class="widget-26-profil">
                                                                $d->titre
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-26-profil">
                                                                <p>$d->description</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="widget-26-profil-info">
                                                                <p class="m-0"><strong>Expediteur : </strong>$expediteur->nom $expediteur->prenom</p>
                                                                <p class="m-0"><strong>Destinataire : </strong>$destinataire->nom $destinataire->prenom</p>
                                                            </div>
                                                        </td>
                                                        
                                                        
                                                        <td>
                                                        <div class="widget-26-icon">
                                                            <a href="#"><i class="bi bi-arrow-right-square-fill"></i></a>
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
                </div>
            </div>
</section>