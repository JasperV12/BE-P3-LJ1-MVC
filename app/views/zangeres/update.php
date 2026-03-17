<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling naar de gebruiker -->
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6 text-begin text-primary">
            <div class="alert alert-<?= $data['color']; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>

    <!-- Update formulier -->
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/ZangeresController/update" method="post">
                <div class="mb-3">
                    <label for="voornaam" class="form-label">Voornaam</label>
                    <input name="voornaam" type="text" class="form-control" id="voornaam" value="<?= $_POST['voornaam'] ?? $data['zangeres']->Voornaam ?>">
                </div>
                <div class="mb-3">
                    <label for="achternaam" class="form-label">Achternaam</label>
                    <input name="achternaam" type="text" class="form-control" id="achternaam" value="<?= $_POST['achternaam'] ?? $data['zangeres']->Achternaam ?>">
                </div>
                <div class="mb-3">
                    <label for="land" class="form-label">Land</label>
                    <input name="land" type="text" class="form-control" id="land" value="<?= $_POST['land'] ?? $data['zangeres']->Land ?>">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input name="genre" type="text" class="form-control" id="genre" value="<?= $_POST['genre'] ?? $data['zangeres']->Genre ?>">
                </div>
                <div class="mb-3">
                    <label for="grammyawards" class="form-label">Grammy Awards</label>
                    <input name="grammyawards" type="number" min="0" class="form-control" id="grammyawards" value="<?= $_POST['grammyawards'] ?? $data['zangeres']->Grammyawards ?>">
                </div>
                <div class="mb-3">
                    <label for="vermogen" class="form-label">Vermogen (€)</label>
                    <input name="vermogen" type="number" min="0" step="0.01" class="form-control" id="vermogen" value="<?= $_POST['vermogen'] ?? $data['zangeres']->Vermogen ?>">
                </div>
                <div class="mb-3">
                    <label for="geboortedatum" class="form-label">Geboortedatum</label>
                    <input name="geboortedatum" type="date" class="form-control" id="geboortedatum" value="<?= $_POST['geboortedatum'] ?? $data['zangeres']->Geboortedatum ?>" required>
                </div>
                
                <!-- Hidden veld voor het ID -->
                <input type="hidden" name="id" value="<?= $_POST['id'] ?? $data['zangeres']->Id ?>">
                
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/ZangeresController/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>
<!-- eind tabel -->
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
