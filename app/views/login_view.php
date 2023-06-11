<nav class="mt-5">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link <? if(!isset($errregister)): ?> active <? endif; ?>" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login"
                type="button" role="tab" aria-controls="nav-login" aria-selected="true">Вход</button>
        <button class="nav-link <? if(isset($errregister)): ?> active <? endif; ?>" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Регистрация</button>
    </div>
</nav>
<div class="tab-content p-4 border-bottom border-start border-end">

    <div class="tab-pane fade <? if(!isset($errregister)): ?> show active <? endif; ?>" id="nav-login" role="tabpanel" aria-labelledby="home-tab">
        <? if(isset($errlogin)): ?>
        <span class="text-danger"><?=$errlogin; ?></span>
        <? endif; ?>
        <form action="/user/login" method="post">
            <div class="row mt-3">
                <div class="col-4">
                    <input minlength="3" class="form-control" type="text" name="login" placeholder="логин">
                </div>
                <div class="col-4">
                    <input class="form-control" type="password" name="password" placeholder="пароль">
                </div>
                <div class="col-4">
                    <input type="submit" class="btn btn-dark">
                </div>
            </div>
        </form>
    </div>

    <div class="tab-pane fade <? if(isset($errregister)): ?>show active <? endif; ?>" id="nav-register">
        <? if(isset($errregister)): ?>
            <span class="text-danger"><?=$errregister; ?></span>
        <? endif; ?>
        <form action="/user/register" method="post">
            <div class="row mt-3">
                <div class="col-3">
                    <input minlength="3" class="form-control" type="text" name="login" placeholder="логин">
                </div>
                <div class="col-3">
                    <input minlength="5" class="form-control" type="password" name="password" placeholder="пароль">
                </div>
                <div class="col-3">
                    <input minlength="5" class="form-control" type="password" name="password_confirm" placeholder="подтверждение пароля">
                </div>
                <div class="col-3">
                    <input type="submit" class="btn btn-dark">
                </div>
            </div>
        </form>
    </div>

</div>