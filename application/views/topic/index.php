<main>
    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="content">
                <div class="btn-group">
                    <a href="<?= base_url('Forum/board/'.$breadcrumb[0]['id_board'].'') ?>" class="btn btn-default grey"><?= $breadcrumb[0]['board']; ?></a>
                    <a href="#" class="btn btn-default grey on"><?= $replies[0]['title']; ?></a>
                </div>
                <div class="btn-group pull-right">
                    <a href="#" class="btn grey" style="padding: 9px 12px;"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="btn-group pull-right">
                    <a class="btn indigo" href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i><span> Responder</span></a>
                </div>
                <?php foreach($replies as $reply){ ?>
                <div class="message">
                    <div class="account">
                        <div class="avatar" style="background-image:url('http://cdn.habtium.com/accounts/avatars/null.png');"></div>
                        <div class="nick">
                            <span><h1><a href="/<?= $reply['author']; ?>"><?= $reply['author']; ?></a></h1></span>
                        </div>
                        <div class="box" style="background-color:#A4A4A4;">Usuario</div>
                        <div class="box" style="color:#000;"><i class="fa fa-comments" aria-hidden="true"></i> 2.150</div>
                    </div>
                    <div class="body">
                        <button class="btn btn-default grey pull-left"><i class="fa fa-clock-o" aria-hidden="true"></i> Hace <?= timespan($reply['poster_time'],time(),1); ?></button>
                        <button clasS="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i></button>
                    </div>
                    <div class="body text">
                        <?= nl2br($reply['body']); ?>
                    </div>
                </div>
                <?php } ?>
            </div>


        </div>
        <div class="col-md-1"></div>
    </div>
</main>