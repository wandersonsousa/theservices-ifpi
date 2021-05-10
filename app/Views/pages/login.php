<!-- tag required for menu alignment -->
<div class="content">
    <div class="row login-container">
        <div class="col-5">
            <div class="form-container">
                <?php if (isset($validation)) { ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php } ?>
                <?php if (session()->get("fail")) { ?>
                    <div class="alert alert-danger">
                        <?= session()->get("fail") ?>
                    </div>
                <?php } ?>
        
                <form action="<?= base_url(["login"]) ?>" method="POST">
                    <div class="mb-3 text-center">
                        <label for="email" class="form-label">Email</label>
                        <input required type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Senha</label>
                        <input required type="password" name="password" class="form-control" id="password">
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="mb-3">
                        <a href="<?= base_url("register") ?>">Criar conta</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
