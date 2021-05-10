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

                <form action="<?= base_url(["register"]) ?>" method="POST">
                    <div class="mb-3 text-center">
                        <label for="name" class="form-label">Nome</label>
                        <input type="name" name="name" class="form-control" id="name">
                    </div>

                    <div class="mb-3 text-center">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                    <div class="mb-3">
                        <a href="<?= base_url("login") ?>">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>