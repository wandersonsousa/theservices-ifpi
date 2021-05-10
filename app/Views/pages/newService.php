<div class="content">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Novo Serviço</h1>
        </div>
    </div>
    <form action="<?= base_url('novo-servico') ?>" class="new-service-form" method="POST" enctype="multipart/form-data">

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
            <label for="name" class="form-label">Nome: </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="ex: vou fazer seus trabalhos acadêmicos">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Detalhe seu serviço: </label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="service-img" class="form-label">Envie uma imagem para atrair mais clientes: </label>
            <input class="form-control" type="file" id="service-img" name="service-img">
        </div>

        <div class="mb-3 price-row">
            <label for="price" class="form-label">Valor: </label>
            <input class="form-control" type="number" name="price" id="price">
        </div>

        <button type="submit" class="btn btn-primary">Postar</button>
    </form>



</div>