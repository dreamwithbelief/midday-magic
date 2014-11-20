<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="text-center content-block-lg">Gallery Image Uploader</h2>
        </div>
        <div class="col-md-6">
            <form action="admin/gallery" method="post" enctype="multipart/form-data">
                <input name="files[]" id="files" type="file" multiple="multiple" />
            </form>
        </div>
        <div class="col-md-6">
            <ul class="list-unstyled" id="fileList"></ul>
        </div>
    </div>
</div>