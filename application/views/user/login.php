<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="text-center content-block-lg">Member Login</h2>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <form action="/login" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <input type="checkbox" id="remember" name="remember" value="remember">&nbsp;&nbsp;&nbsp;<label for="remember">Remember Me</label>
                </div>
                <div class="form-group text-right inner">
                    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Login">
                    <?= anchor('register', 'Signup', array('class' => 'btn btn-success')); ?>
                </div>
            </form>
        </div>
    </div>
</div>