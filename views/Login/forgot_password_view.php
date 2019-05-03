<?php
if (isset($error))
    echo '<div class="row"><div class="col-md-4 offset-md-4"><p class="has-text-danger">'.$error.'</p></div></div>';
?>
<div class="row">
<form class="col-md-4 offset-md-4" action="/index.php/Login/forgotpassword" method="post">

    <div class="form-group">
        <label class="label">Email</label>
        <div class="control">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input class="form-control" type="email" name="user_email" placeholder="Votre adresse email" required value="<?php if(isset($_POST['user_email'])){echo $_POST['user_email'];}?>">
            </div>
        </div>
    </div>

    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token'];?>">

    <div class="clearfix">
        <button class="btn btn-secondary mb-2 float-right" type="submit">Envoyez moi un mail</button>
    </div>
</form>
</div>