<h3><?= Session::get_flash( 'register' ); ?></h3>
<form action="register" method="post">
    <label for="username">Name:</label>
    <input type="text" id="name" name="name"/>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"/>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"/>
    <input type="hidden" name="token" value="<?= Token::generate(); ?>"/>
    <input type="submit" id="submit" name="submit" value="Register"/>
</form>