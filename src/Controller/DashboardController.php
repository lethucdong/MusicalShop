<?php
namespace App\Controller;

use Cake\ORM\Table;
use Cake\I18n\FrozenDate;
use Cake\Http\Exception\NotFoundException;

class DashboardController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('OrderDetails');
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        // Doanh thu
        $startDate = $this->request->getQuery('start_date');
        $endDate = $this->request->getQuery('end_date');
        $dateType = $this->request->getQuery('date_type');

        if (!$startDate) {
            $startDate = new FrozenDate('first day of this month');
        } else {
            $startDate = new FrozenDate($startDate);
        }

        if (!$endDate) {
            $endDate = new FrozenDate('last day of this month');
        } else {
            $endDate = new FrozenDate($endDate);
        }
        $startDate1 = $startDate;
        $endDate1 =  $endDate;

        if (!$dateType) {
            $dateType = 'day';
        }

        $query = $this->OrderDetails->find()
            ->select([
                'total_amount' => $this->OrderDetails->query()->func()->sum('OrderDetails.price')
            ])
            ->where([
                'OrderDetails.delete_flg' => 0,
                'OrderDetails.created_at >=' => $startDate,
                'OrderDetails.created_at <=' => $endDate
            ]);

        switch ($dateType) {
            case 'day':
                $query->select([
                    'day' => 'DAY(OrderDetails.created_at)',
                    'month' => 'MONTH(OrderDetails.created_at)',
                    'year' => 'YEAR(OrderDetails.created_at)',
                ])
                ->group(['YEAR(OrderDetails.created_at)', 'MONTH(OrderDetails.created_at)', 'DAY(OrderDetails.created_at)'])
                ->order(['YEAR(OrderDetails.created_at)' => 'ASC', 'MONTH(OrderDetails.created_at)' => 'ASC', 'DAY(OrderDetails.created_at)' => 'ASC']);
                break;
        }

        $results = $query->all();

        $labels = [];
        $data = [];
        foreach ($results as $record) {
            if ($dateType === 'day') {
                $labels[] = sprintf('%d-%02d-%02d', $record->year, $record->month, $record->day);
            } elseif ($dateType === 'month') {
                $labels[] = sprintf('%d-%02d', $record->year, $record->month);
            } else {
                $labels[] = $record->year;
            }
            $data[] = $record->total_amount;
        }

        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Amount',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                    'data' => $data,
                ],
            ]
        ];

        // End Doanh thu

        // Số lượng sản phẩm

        $query1 = $this->OrderDetails->find()
        ->select([
            'product_id',
            'product_name' => 'Products.name',
            'total_quantity' => $this->OrderDetails->query()->func()->sum('OrderDetails.quantity'),
            'total_amount' => $this->OrderDetails->query()->func()->sum('OrderDetails.price'),
        ])
        ->where([
            'OrderDetails.delete_flg' => 0,
            'OrderDetails.created_at >=' => $startDate1,
            'OrderDetails.created_at <=' => $endDate1
        ])
        ->contain(['Products'])
        ->group(['product_id', 'product_name'])
        ->order(['product_id' => 'ASC']);

        $results1 = $query1->all();

        $labels1 = [];
        $data1 = [];
        $colors = [];
        $usedColors = [];

        foreach ($results1 as $record) {
            $labels1[] =  $record->product_name;
            $data1[] = $record->total_quantity;

            // Tạo màu ngẫu nhiên
            $color = $this->generateRandomColor($usedColors);
            $colors[] = $color;
            $usedColors[] = $color;
        }

        $chartData1 = [
            'labels' => $labels1,
            'datasets' => [
                [
                    'label' => 'Total products',
                    'backgroundColor' => $colors,
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                    'data' => $data1,
                ],
            ]
        ];

        
        $this->set(compact('chartData', 'chartData1', 'startDate', 'endDate', 'dateType', 'startDate1', 'endDate1'));
    }

    public function totalAmountChart()
    {
        // Doanh thu
        $startDate = $this->request->getQuery('start_date');
        $endDate = $this->request->getQuery('end_date');
        $dateType = $this->request->getQuery('date_type');

        if (!$startDate) {
            $startDate = new FrozenDate('first day of this month');
        } else {
            $startDate = new FrozenDate($startDate);
        }

        if (!$endDate) {
            $endDate = new FrozenDate('last day of this month');
        } else {
            $endDate = new FrozenDate($endDate);
        }

        if (!$dateType) {
            $dateType = 'day';
        }

        $query = $this->OrderDetails->find()
            ->select([
                'total_amount' => $this->OrderDetails->query()->func()->sum('OrderDetails.price')
            ])
            ->where([
                'OrderDetails.delete_flg' => 0,
                'OrderDetails.created_at >=' => $startDate,
                'OrderDetails.created_at <=' => $endDate
            ]);

        switch ($dateType) {
            case 'day':
                $query->select([
                    'day' => 'DAY(OrderDetails.created_at)',
                    'month' => 'MONTH(OrderDetails.created_at)',
                    'year' => 'YEAR(OrderDetails.created_at)',
                ])
                ->group(['YEAR(OrderDetails.created_at)', 'MONTH(OrderDetails.created_at)', 'DAY(OrderDetails.created_at)'])
                ->order(['YEAR(OrderDetails.created_at)' => 'ASC', 'MONTH(OrderDetails.created_at)' => 'ASC', 'DAY(OrderDetails.created_at)' => 'ASC']);
                break;

            case 'month':
                $query->select([
                    'month' => 'MONTH(OrderDetails.created_at)',
                    'year' => 'YEAR(OrderDetails.created_at)',
                ])
                ->group(['YEAR(OrderDetails.created_at)', 'MONTH(OrderDetails.created_at)'])
                ->order(['YEAR(OrderDetails.created_at)' => 'ASC', 'MONTH(OrderDetails.created_at)' => 'ASC']);
                break;

            case 'year':
                $query->select([
                    'year' => 'YEAR(OrderDetails.created_at)',
                ])
                ->group(['YEAR(OrderDetails.created_at)'])
                ->order(['YEAR(OrderDetails.created_at)' => 'ASC']);
                break;
        }

        $results = $query->all();

        $labels = [];
        $data = [];
        foreach ($results as $record) {
            if ($dateType === 'day') {
                $labels[] = sprintf('%d-%02d-%02d', $record->year, $record->month, $record->day);
            } elseif ($dateType === 'month') {
                $labels[] = sprintf('%d-%02d', $record->year, $record->month);
            } else {
                $labels[] = $record->year;
            }
            $data[] = $record->total_amount;
        }

        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Amount',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                    'data' => $data,
                ],
            ]
        ];

        $this->set(compact('chartData'));
        $this->viewBuilder()->setClassName('Json');
        $this->set('_serialize', ['chartData']);
    }

    public function totalProductChart()
    {
        // Số lượng sản phẩm
        $startDate = $this->request->getQuery('start_date');
        $endDate = $this->request->getQuery('end_date');
        $dateType = $this->request->getQuery('date_type');

        if (!$startDate) {
            $startDate = new FrozenDate('first day of this month');
        } else {
            $startDate = new FrozenDate($startDate);
        }

        if (!$endDate) {
            $endDate = new FrozenDate('last day of this month');
        } else {
            $endDate = new FrozenDate($endDate);
        }

        if (!$dateType) {
            $dateType = 'day';
        }

        $query = $this->OrderDetails->find()
        ->select([
            'product_id',
            'product_name' => 'Products.name',
            'total_quantity' => $this->OrderDetails->query()->func()->sum('OrderDetails.quantity'),
            'total_amount' => $this->OrderDetails->query()->func()->sum('OrderDetails.price'),
        ])
        ->where([
            'OrderDetails.delete_flg' => 0,
            'OrderDetails.created_at >=' => $startDate,
            'OrderDetails.created_at <=' => $endDate
        ])
        ->contain(['Products'])
        ->group(['product_id', 'product_name'])
        ->order(['product_id' => 'ASC']);

        $results = $query->all();

        $labels = [];
        $data = [];
        $colors = [];
        $usedColors = [];
        foreach ($results as $record) {
            $labels[] =  $record->product_name;
            $data[] = $record->total_quantity;
            // Tạo màu ngẫu nhiên
            $color = $this->generateRandomColor($usedColors);
            $colors[] = $color;
            $usedColors[] = $color;
        }

        $chartData1 = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Amount',
                    'backgroundColor' => $colors,
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                    'data' => $data,
                ],
            ]
        ];

        $this->set(compact('chartData1'));
        $this->viewBuilder()->setClassName('Json');
        $this->set('_serialize', ['chartData1']);
    }

    private function generateRandomColor($usedColors) {
        do {
            $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        } while (in_array($color, $usedColors));
    
        return $color;
    }
}
