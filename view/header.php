<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>The Student Corner</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>

	<?php echo file_exists('./css/'.strtolower($model).'.css') ? "<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/".strtolower($model).".css\"/>" : ""; ?>
	<?php echo file_exists('./js/'.strtolower($model).'.js') ? "<script src=\"./js/".strtolower($model).".js\"></script>" : ""; ?>
</head>
<body>
	<main>
	<!-- <?php var_dump($_SESSION); ?> -->
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href=".">The Student Corner</a>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 flex-row h-100">
					<li class="nav-item mx-2"><a class="nav-link active" href=".">Home</a></li>
					<li class="nav-item mx-2"><a class="nav-link active" href=".?r=about">About</a></li>
				</ul>
				<?php if (isset($_SESSION['user'])){?>
					<a class="text-decoration-none d-flex px-2" href=".?r=user/profil">
						<button class="btn btn-outline-dark" type="submit">
							<i class="bi-cart-fill me-1"></i>
							Mon Profil
						</button>
					</a>
					<a class="text-decoration-none d-flex px-2" href=".?r=user/logout">
						<button class="btn btn-outline-dark" type="submit">
							<i class="bi-cart-fill me-1"></i>
							Déconnexion
						</button>
					</a>
				<?php } else {?>
					<a class="text-decoration-none d-flex px-2" href=".?r=user/login">
						<button class="btn btn-outline-dark" type="submit">
							<i class="bi-cart-fill me-1"></i>
							Connexion
						</button>
					</a>
					<a class="text-decoration-none d-flex px-2" href=".?r=user/register">
						<button class="btn btn-outline-dark" type="submit">
							<i class="bi-cart-fill me-1"></i>
							Inscription
						</button>
					</a>
				<?php } ?>
            </div>
        </nav>
	</header>
	<section class="background">