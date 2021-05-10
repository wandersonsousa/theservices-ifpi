<div class="content">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Meus Serviços</h1>
        </div>
    </div>

    <ul class="list-group list-group-flush">
        <?php foreach ($services as $service) : ?>
            <li class="list-group-item list-group-item-action service-li d-flex justify-content-between align-items-center">

                <img src="<?= base_url(['uploads', 'img', 'services', $service['service_img']]) ?>" alt="img_service" width="80px">

                <a class="link-service" href="<?= base_url(['servico', $service['id_service']])?>"> <?= $service['service_name'] ?></a>

                <div class="btn-group" role="group">
                    <a role="button" href="<?= base_url(['atualizar-servico', $service['id_service']]) ?>" class="btn btn-secondary btn-lg"><i class="fas fa-edit"></i></a>

                    <a role="button" class="btn btn-danger btn-lg" href="#modal-delete" data-bs-toggle="modal" data-id="<?= $service['id_service'] ?>" data-bs-placement="bottom" title="Excluir"><i class="fas fa-times"></i></a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="modal" tabindex="-1" id="modal-delete">
        <form id="form" action="<?= base_url(['deletar-servico']) ?>" role="form" method="post">
            <input type="hidden" name="id" id="id">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Exclusão De Serviço</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Deseja realmente excluir este serviço ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </div>
            </form>
    </div>




</div>


<script>
    var $modalDelete = document.getElementById('modal-delete');


    $modalDelete.addEventListener('shown.bs.modal', function(e) {
        let $btn = e.relatedTarget;
        $modalDelete.querySelector('#id').value = $btn.dataset.id;
    })
</script>