<?php
namespace App\Controller;

class DashboardController extends AppController
{
    public function index()
    {
        $chartData = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                ]
            ]
        ];

        $this->set(compact('chartData'));
    }
}
