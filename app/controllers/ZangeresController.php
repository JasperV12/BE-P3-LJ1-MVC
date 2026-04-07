<?php

class ZangeresController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    private function parseNaam(string $naam): array
    {
        $parts = preg_split('/\s+/', trim($naam));
        $voornaam = array_shift($parts) ?: '';
        $achternaam = count($parts) ? implode(' ', $parts) : '';

        return [
            'voornaam' => $voornaam,
            'achternaam' => $achternaam
        ];
    }

    private function leeftijdNaarGeboortedatum($leeftijd): string
    {
        $leeftijd = filter_var($leeftijd, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]) ?: 0;
        $year = (int) date('Y') - $leeftijd;
        return sprintf('%04d-01-01', $year);
    }

    private function prepareZangeresData(array $post): array
    {
        $nameParts = $this->parseNaam($post['naam'] ?? '');

        return [
            'voornaam' => $nameParts['voornaam'],
            'achternaam' => $nameParts['achternaam'],
            'land' => $post['land'] ?? '',
            'genre' => $post['genre'] ?? '',
            'grammyawards' => 0,
            'vermogen' => $post['vermogen'] ?? 0,
            'geboortedatum' => $this->leeftijdNaarGeboortedatum($post['leeftijd'] ?? 0)
        ];
    }

    public function index($display = 'none', $message = '')
    {
        $result = $this->zangeresModel->getAllZangeressen();

        $data = [
            'title' => 'Rijkste zangeressen',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        $this->view('zangeres/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->zangeresModel->delete($Id);
        header('Refresh:3; url=' . URLROOT . '/ZangeresController/index');
        $this->index('flex', 'Het record is succesvol verwijderd');
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe zangeres toevoegen',
            'display' => 'none',
            'message' => '',
            'errors' => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['naam'])) {
                $data['errors']['naam'] = 'Voor een naam in';
            }

            if (empty($_POST['genre'])) {
                $data['errors']['genre'] = 'Voor een genre in';
            }

            if (empty($_POST['land'])) {
                $data['errors']['land'] = 'Voor een land in';
            }

            if (!isset($_POST['leeftijd']) || $_POST['leeftijd'] === '') {
                $data['errors']['leeftijd'] = 'Voor een leeftijd in';
            }

            if (empty($_POST['vermogen'])) {
                $data['errors']['vermogen'] = 'Voor een vermogen in';
            }

            if (empty($data['errors'])) {
                $input = $this->prepareZangeresData($_POST);
                $this->zangeresModel->create($input);
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';
                $data['color'] = 'success';
                header('Refresh: 3; URL=' . URLROOT . '/ZangeresController/index');
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'Controleer de invoer en verbeter de gemarkeerde velden.';
                $data['color'] = 'danger';
            }
        }

        $this->view('zangeres/create', $data);
    }

    public function update($id = NULL)
    {
        $data = [
            'title' => 'Wijzig zangeres',
            'display' => 'none',
            'message' => '',
            'color' => 'success',
            'errors' => []
        ];

        $data['zangeres'] = $this->zangeresModel->getZangeresById($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['naam'])) {
                $data['errors']['naam'] = 'Voor een naam in';
            }

            if (empty($_POST['genre'])) {
                $data['errors']['genre'] = 'Voor een genre in';
            }

            if (empty($_POST['land'])) {
                $data['errors']['land'] = 'Voor een land in';
            }

            if (!isset($_POST['leeftijd']) || $_POST['leeftijd'] === '') {
                $data['errors']['leeftijd'] = 'Voor een leeftijd in';
            }

            if (empty($_POST['vermogen'])) {
                $data['errors']['vermogen'] = 'Voor een vermogen in';
            }

            if (empty($data['errors'])) {
                $input = $this->prepareZangeresData($_POST);
                $input['id'] = $_POST['id'];
                $this->zangeresModel->updateZangeres($input);
                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen';
                $data['color'] = 'success';
                header('Refresh: 3; url=' . URLROOT . '/ZangeresController/index');
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'Controleer de invoer en verbeter de gemarkeerde velden.';
                $data['color'] = 'danger';
            }
        }

        $this->view('zangeres/update', $data);
    }
}
