<footer class="footer ft-1">
    <nav id="footerNav" class="nav-foot w-100 h-100 flex justify-content-center align-items-center">
        <ul class="flex centerAll">
            <li class="mx-3 my-1"><a class="nav-a py-2" href="/main">ACCUEIL</a></li>
            <li class="mx-3 my-1"><a class="nav-a py-2" href="/categories">CATEGORIES</a></li>
            <li class="mx-3 my-1"><a class="nav-a py-2" href="/articles/tousLesArticles/1">ARTICLES</a></li>
            <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>

                <li class="nav-li mx-3 my-1"><a class="nav-a py-2" href="/utilisateurs/profil">PROFIL</a></li>

                <?php if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] === 1337 || $_SESSION['user']['id_droits'] === 42) : ?>
                    <li class="nav-li mx-3 my-1"><a class="nav-a py-2" href="/admin">ADMIN</a></li>
                <?php endif; ?>

            <?php endif; ?>
        </ul>
    </nav>
</footer>

</main>
<script src="/js/scripts.js"></script>
</body>

</html>