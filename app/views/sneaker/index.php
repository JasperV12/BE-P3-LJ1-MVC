<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($data['result'])) : ?>
                        <?php foreach($data['result'] as $sneaker) : ?>
                            <tr>
                                <td><?= $sneaker->Merk; ?></td>
                                <td><?= $sneaker->Model; ?></td>
                                <td><?= $sneaker->Type; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3">Geen sneakers gevonden</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>