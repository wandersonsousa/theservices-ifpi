<!-- tag required for menu alignment -->
<div class="content">
    </div>
    <div class="service-container text-center">
        <h1 class="text-center service-title"><?= $service['service_name'] ?></h1>
        <img src="<?= base_url(['uploads', 'img', 'services', $service['service_img']]) ?>" alt="service image">

        <div class="details">
            <div class="data">
                <button type="button" class="btn btn-light btn-lg">Preço: <span class="badge bg-secondary">R$<?= $service['service_price'] ?></span></button>

                <button type="button" class="btn btn-light btn-lg">Vendidos: <span class="badge bg-secondary"><?= $service['service_sold'] ?></span></button>
            </div>

            <div class="detail-text">
                <p>
                    <?= $service['service_description'] ?>
                </p>
            </div>
        </div>
    </div>
</div>