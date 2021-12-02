<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>The Student Corner</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>


	<?php echo file_exists('./css/'.strtolower($model).'.css') ? "<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/".strtolower($model).".css\"/>" : ""; ?>
	<?php echo file_exists('./js/'.strtolower($model).'.js') ? "<script src=\"./js/".strtolower($model).".js\"></script>" : ""; ?>
</head>
<body>
	<main>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">The Student Corner</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
				<form class="d-flex px-2">
					<button class="btn btn-outline-dark" type="submit">
						<i class="bi-cart-fill me-1"></i>
						Connexion
					</button>
				</form>
				<form class="d-flex px-2">
					<button class="btn btn-outline-dark" type="submit">
						<i class="bi-cart-fill me-1"></i>
						Inscription
					</button>
				</form>
            </div>
        </nav>
	</header>
	<section class="background">