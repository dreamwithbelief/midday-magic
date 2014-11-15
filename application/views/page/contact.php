<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="text-center">Contact Us</h2>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <form action="/contact" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="6"></textarea>
                </div>
                <div class="form-group text-right">
                    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Send">
                    <input type="reset" class="btn btn-danger" id="reset" value="Clear">
                </div>
            </form>
        </div>
    </div>
</div>