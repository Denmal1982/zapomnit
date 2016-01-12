<div class="speaker-widget">
    <div class="speaker-wrapper">

        <div class="speaker-icon">
            <img src="<?=Yii::getAlias('@web')?>/uploads/<?=$model->image_hash?>" width="100" height="100">
        </div>

        <div class="speaker-content">
            <div class="speaker-header">
                <?=$model->name0?> <?=$model->name1?>
            </div>
            <div class="speaker-type">
                Публицист, аналитик
            </div>
            <div class="speaker-join">
                <i class="fa fa-calendar">  <?=$model->create_at?></i>
            </div>

        </div>

        <div class="speaker-rating">

            <p style="display: block">34%</p>

        </div>
    </div>
    <div class="speaker-statistic">
        <div class="sp_subscribers">
            <i title="Заметки" class="fa fa-bullseye"> 5</i>
        </div>
        <div class="sp_notes">
            <i title="Заметки" class="fa fa-sticky-note"> 22</i>
        </div>
        <div class="sp_creator">

        </div>
        <div  style="float: right" class="sp_btn">
            <div class="btn btn-success btn-xs">на заметку</div>
        </div>


    </div>
</div>

<div class="row">

</div>
