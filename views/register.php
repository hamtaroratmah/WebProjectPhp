
<form action="index.php?action=register" method="post" id="register" class="forms">
    <h2 id="register_title">S'inscrire</h2>
    <p><input type="text" name="username_register" placeholder="Username"></p>
    <p><input type="email" name="mail_register" placeholder="Adresse mail"/></p>
    <p><input type="password" name="password_register" placeholder="Mot de passe"/></p>
    <p><input type="submit" name="form_register" value="signin" id="register_button"></p>
    <a id="register_link" href="index.php?action=login">Déjà inscrit ?</a>
    <p><?php echo $notification_register;?></p>
</form>