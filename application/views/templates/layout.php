<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?=base_url('assets/css/vendor/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/vendor/bootstrap-theme.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/vendor/slick.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/main.css');?>?version=<?=rand(0,100);?>">
    <script src="<?=base_url('ckeditor/ckeditor.js');?>"></script>
</head>

<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?= anchor('/', 'SpeakOut!', 'class=navbar-brand'); ?>
            </div>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="nav navbar-nav navbar-right">
                    <li<?=$this->uri->segment(1)=='about' ? ' class="active"' : '' ?>><?= anchor('about', 'About'); ?></li>
                    <li<?=$this->uri->segment(1)=='gallery' ? ' class="active"' : '' ?>><?= anchor('gallery', 'Gallery'); ?></li>
                    <li<?=$this->uri->segment(1)=='events' ? ' class="active"' : '' ?>><?= anchor('events', 'Events'); ?></li>
                    <li<?=$this->uri->segment(1)=='officers' ? ' class="active"' : '' ?>><?= anchor('officers', 'Officers'); ?></li>
                    <li<?=$this->uri->segment(1)=='contact' ? ' class="active"' : '' ?>><?= anchor('contact', 'Contact'); ?></li>
                    <li<?=$this->uri->segment(1)=='login' ? ' class="active"' : '' ?>><?= anchor('login', 'Login'); ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="wrapper">

    <?php echo $body; ?>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url('assets/js/vendor/bootstrap.min.js');?>"></script>
<script src="<?=base_url('assets/js/vendor/slick.min.js');?>"></script>
<script src="<?=base_url('assets/js/main.js');?>?version=<?=rand(0,100);?>"></script>
</body>
</html>