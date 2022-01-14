<section class="" style="background-color: #619a60;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img
                src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/img4.jpg"
                alt="Student photo"
                class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
              />
            </div>
            <form class="col-xl-6" action=".?r=user/register" method="post">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Student registration form</h3>

                <div class="form-outline input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Campus</label>
                    </div>
                    <select class="form-control" id="idcampus" name="idcampus">
                        <option selected>Choose...</option>
                        <?php 
                          foreach ($data["campus"] as $campus) {
                            echo '<option value="'.$campus->idcampus.'">'.$campus->nom_campus.'</option>';
                          }
                        ?>
                    </select>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" />
                      <label class="form-label" for="prenom">First name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="nom" name="nom" class="form-control form-control-lg" />
                      <label class="form-label" for="nom">Last name</label>
                    </div>
                  </div>
                </div>

                
                <div class="form-outline mb-4">
                  <input type="email" id="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="email">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password_confirm" name="password_confirm" class="form-control form-control-lg" />
                  <label class="form-label" for="password_confirm">Confirm password</label>
                </div>


                <div class="d-flex justify-content-end pt-3">
                  <!-- <button type="button" class="btn btn-light btn-lg">Reset all</button> -->
                  <button type="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>