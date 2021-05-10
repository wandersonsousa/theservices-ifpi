<div class="content">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Atualizar Serviço</h1>
        </div>
    </div>
    <form action="<?= base_url(['atualizar-servico', $service['id_service']]) ?>" class="new-service-form" method="POST" enctype="multipart/form-data">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <?php if (session()->get("fail")) : ?>
            <div class="alert alert-danger">
                <?= session()->get("fail") ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="name" class="form-label">Novo nome: </label>
            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name', $service['service_name']) ?>">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Nova descrição: </label>
            <textarea class="form-control" id="description" name="description" rows="3"><?= set_value('description', $service['service_description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="service-img" class="form-label">Nova imagem: </label>
            <input class="form-control" type="file" id="service-img" name="service-img" value="<?= base_url(['uploads', 'img', 'services', $service['service_img']]) ?>">
        </div>

        <div class="mb-3 price-row">
            <label for="price" class="form-label">Novo valor: </label>
            <input class="form-control" type="number" name="price" id="price" value="<?=set_value('price', $service['service_price'])?>">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>



</div>