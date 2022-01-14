</section>

    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href=".?r=site/index">Accueil</a></li>
                <li class="list-inline-item"><a href=".?r=site/index">Rechercher un produit</a></li>
                <li class="list-inline-item"><a href=".?r=about/index">A propos</a></li>
				<?php if (isset($_SESSION['user'])){?>
                    <li class="list-inline-item"><a href=".?r=user/profil">Mon profil</a></li>
                    <li class="list-inline-item"><a href=".?r=user/logout">Se déconnecter</a></li>
                     
                <?php }else{?>
                    <li class="list-inline-item"><a href=".?r=user/login">Se connecter</a></li>
                    <li class="list-inline-item"><a href=".?r=user/register">S'inscrire</a></li>
                <?php } ?>
                </ul>
            <p class="copyright">The Student Corner © 2021</p>
        </footer>
    </div>




</main>

</body>
</html>