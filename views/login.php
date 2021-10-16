
        <div class="formulaire">
            <form action="?action=login" method="post" id="login" class="forms">
                <h2>Se connecter<h2>
                <p><input type="email" name="mail" placeholder="email"/></p>
                <p><input type="password" name="password" placeholder="password"/></p>
                <p><input type="submit" name="form_login" value="Se connecter"></p>
                <a id="register_link" href="index.php?action=register">Pas encore inscrit ?</a>
                <p><?php echo $notification_login;?></p>
            </form>
        </div>

