<h3><?= Session::get_flash( 'login' ); ?></h3>
<form action="login" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"/>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"/>
    <input type="hidden" name="token" value="<?= Token::generate(); ?>"/>
    <input type="submit" id="submit" name="submit" value="Log In"/>
</form>