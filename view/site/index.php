<section class="masthead">
	<div class="container position-relative">
		<div class="row justify-content-center">
			<div class="col-xl-6">
				<div class="text-center text-white">
					<!-- Page heading-->
					<h1 class="mb-5">Rejoints rapidement le site d'echange entre etudiants.</h1>
					<form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
						<!-- Email address input-->
						<div class="row">
							<div class="col">
								<input class="form-control form-control-lg" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
								<div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">Email Address is required.</div>
								<div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
							</div>
							<div class="col-auto"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button></div>
						</div>
						<!-- Submit success message-->
						<!---->
						<!-- This is what your users will see when the form-->
						<!-- has successfully submitted-->
						<div class="d-none" id="submitSuccessMessage">
							<div class="text-center mb-3">
								<div class="fw-bolder">Form submission successful!</div>
								<p>To activate this form, sign up at</p>
								<a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
							</div>
						</div>
						<!-- Submit error message-->
						<!---->
						<!-- This is what your users will see when there is-->
						<!-- an error submitting the form-->
						<div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>



<?php if (isset($_SESSION['user']) && $_SESSION['user']['idrole'] == 3){?>

	<script src="js/presentation.js"></script>

	<input id="btn-change" class="btn"
	type="button"
	value="Modifier">

	<input id="btn-validate" class="btn"
	type="button"
	value="Valider"
	hidden>
<?php } ?>

