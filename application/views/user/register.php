<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="text-center content-block-lg">Member Registration</h2>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <form action="/register" method="post">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="conf_password">Confirm Password</label>
                    <input type="password" class="form-control" id="conf_password" name="conf_password">
                </div>
                <div class="form-group">
                    <label for="club_key">Key Code</label>
                    <input type="text" class="form-control" id="club_key" name="club_key">
                </div>
                <div class="form-group text-right inner">
                    <input type="submit" class="btn btn-success" id="submit" name="submit" value="Signup">
                    <button class="btn btn-danger clear">Clear</button>
                </div>
            </form>
        </div>
    </div>
</div>