<!-- tag required for menu alignment -->


<div class="content">
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?=session()->getFlashdata('success')?>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('fail')) : ?>
    <div class="alert alert-danger" role="alert">
        <?=session()->getFlashdata('fail')?>
    </div>
<?php endif; ?>


    <div class="text-center heading-title fancy-underline heading-bigger-nomargin left">
        <h1>Explore os serviços oferecidos em <span class="city">Teresina</span></h1>
    </div>

    <div class="service-grid text-center">
        <?php foreach ($services as $service) : ?>
            <div class="card service-card">
                <a href="<?= base_url(['servico', $service['id_service']]) ?>">
                    <img src="<?= base_url(['uploads', 'img', 'services', $service['service_img']]) ?>" width="220" height="250" class="card-img-top" alt="imagem do serviço">
                </a>
                <div class="card-body service-card-body">
                    <p class="card-text fw-lighter"><?= $service['user_name'] ?></p>

                    <div class="text-center">
                        <h5 class="card-title text-start"><a class="card-title-link fw-normal" href="<?= base_url(['servico', $service['id_service']]) ?>"><?= $service['service_name'] ?></a> </h5>
                    </div>
                </div>

                <div class="card-bottom-info">
                    <div class="total-sales">
                        <i class="fas fa-shopping-cart"></i>
                        <span id="total-sales"><?= $service['service_sold'] ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>




</div>