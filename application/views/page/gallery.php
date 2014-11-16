<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="text-center content-block-lg">Club Gallery</h2>
        </div>
        <div class="col-md-8 col-md-offset-2 col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <div class="gallery">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 h1 text-center">
                    <a href="#" class="gallery-prev hidden-sm hidden-xs"><span class="glyphicon glyphicon-chevron-left"></span></a>
                </div>
                <div class="col-xs-10">
                    <div class="gallery-nav">
                        <?php for($i=0;$i<20;$i++): ?>
                            <div><img src="http://placehold.it/1000x1000" alt="Image" class="img-responsive content-block-sm"></div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="col-xs-1 h1 text-center">
                    <a href="#" class="gallery-next hidden-sm hidden-xs"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>