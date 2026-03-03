<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        // Laad de Sneaker model in
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index()
    {
        // Haal de data op via de model
        $result = $this->sneakerModel->getAllSneakers();

        $data = [
            'title' => 'Overzicht Sneakers',
            'result' => $result
        ];

        // Stuur de data naar de view
        $this->view('sneaker/index', $data);
    }
}