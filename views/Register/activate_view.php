<?php if (isset($error)){?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
            <p class="display-4">Activation du compte</p>
            <p class="lead"><?php echo $error; ?></p>
            <div class="clearfix">
                <a class="float-right btn btn-sm btn-secondary" href="/index.php/Register/sendmail" class="has-text-grey-dark">Renvoyez moi un mail !</a>
            </div>
        </div>
    </div>
</div>
<?php } else if (isset($success)) {?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
            <p class="display-4">Activation du compte</p>
            <p class="lead"><?php echo $success; ?></p>
            <div class="clearfix">
                <a class="float-right btn btn-sm btn-secondary" href="/index.php/Login" class="has-text-grey-dark">Me connecter</a>
            </div>
        </div>
        </article>
    </div>
</div>
<?php } ?>
