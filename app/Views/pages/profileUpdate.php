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

                <form action="<?= base_url(["atualizar-perfil"]) ?>" method="POST">
                    <div class="mb-3 text-center">
                        <label for="name" class="form-label">Nome</label>
                        <input value="<?=set_value('name', $user['user_name'])?>" type="name" name="name" class="form-control" id="name">
                    </div>

                    <div class="mb-3 text-center">
                        <label for="email" class="form-label">Email</label>
                        <input value="<?=set_value('email', $user['user_email'])?>" type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>