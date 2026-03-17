<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?= $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeresController/create" method="post">
                <div class="mb-3">
                    <label for="voornaam" class="form-label">Voornaam</label>
                    <input name="voornaam" type="text" class="form-control" id="voornaam" required>
                </div>
                <div class="mb-3">
                    <label for="achternaam" class="form-label">Achternaam</label>
                    <input name="achternaam" type="text" class="form-control" id="achternaam" required>
                </div>
                <div class="mb-3">
                    <label for="land" class="form-label">Land</label>
                    <input name="land" type="text" class="form-control" id="land" required>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input name="genre" type="text" class="form-control" id="genre" required>
                </div>
                <div class="mb-3">
                    <label for="grammyawards" class="form-label">Grammy Awards</label>
                    <input name="grammyawards" type="number" min="0" class="form-control" id="grammyawards" required>
                </div>
                <div class="mb-3">
                    <label for="vermogen" class="form-label">Vermogen (€)</label>
                    <input name="vermogen" type="number" min="0" step="0.01" class="form-control" id="vermogen" required>
                </div>
                <div class="mb-3">
                    <label for="geboortedatum" class="form-label">Geboortedatum</label>
                    <input name="geboortedatum" type="date" class="form-control" id="geboortedatum" required>
                </div>
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>
            <br>
            <a href="<?= URLROOT; ?>/ZangeresController/index"><i class="bi bi-arrow-left"></i> Terug</a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
