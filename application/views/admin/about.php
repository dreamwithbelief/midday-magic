<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 content-block-lg">
            <h1 class="text-center content-block-lg">About Page Content Editor</h1>
            <form action="/admin/about" method="post">
                <textarea name="editor1" id="editor1"></textarea>
                <script>
                    CKEDITOR.replace('editor1', {
                        height: 600
                    });
                </script>
            </form>
        </div>
    </div>
</div>