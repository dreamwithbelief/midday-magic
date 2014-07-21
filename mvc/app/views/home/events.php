<div id="calendar">
    <h2 class="center title"><?= date('F - Y'); ?></h2>
    <?php for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, date('m'), date('y'));$i++) {?>
        <div class="day"><?=$i;?></div>
    <?php } ?>
    <div class="clearfix"></div>
</div>