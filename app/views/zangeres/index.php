<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10 text-begin">
            <a href="<?= URLROOT; ?>/ZangeresController/create" class="btn btn-warning" role="button">Nieuwe zangeres</a>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-10 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Land</th>
                        <th>Genre</th>
                        <th>Grammy Awards</th>
                        <th>Vermogen</th>
                        <th>Geboortedatum</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($data['result']) && count($data['result']) > 0) : ?>
                        <?php foreach($data['result'] as $zangeres) : ?>
                            <tr>
                                <td><?= $zangeres->Voornaam; ?></td>
                                <td><?= $zangeres->Achternaam; ?></td>
                                <td><?= $zangeres->Land; ?></td>
                                <td><?= $zangeres->Genre; ?></td>
                                <td><?= $zangeres->Grammyawards; ?></td>
                                <td><?= $zangeres->Vermogen; ?></td>
                                <td><?= $zangeres->Geboortedatum; ?></td>
                                <td class="text-center">
                                    <a href="<?= URLROOT; ?>/ZangeresController/update/<?= $zangeres->Id; ?>">
                                        <i class="bi bi-pencil-fill text-success"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= URLROOT; ?>/ZangeresController/delete/<?= $zangeres->Id; ?>" 
                                       onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                       <i class="bi bi-trash3-fill text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="9" class="text-center">Geen zangeressen gevonden in de database.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i> Terug</a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
