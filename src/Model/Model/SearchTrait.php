<?php
namespace App\Model\Model;

use Cake\ORM\Query;

trait SearchTrait
{
    /**
     * Tạo finder tùy chỉnh `search` để tìm kiếm theo nhiều trường
     *
     * @param \Cake\ORM\Query $query
     * @param array $options
     * @return \Cake\ORM\Query
     */
    public function findSearch(Query $query, array $options): Query
    {
        $search = $options['search'] ?? '';

        if ($search) {
            $searchConditions = [];
            foreach ($this->getSearchFields() as $field) {
                $searchConditions[] = [$field . ' LIKE' => '%' . $search . '%'];
            }

            $query->where([
                'OR' => $searchConditions
            ]);
        }

        return $query;
    }

    /**
     * Trả về các trường tìm kiếm cho mô hình cụ thể
     *
     * @return array
     */
    protected function getSearchFields(): array
    {
        return [];
    }
}
