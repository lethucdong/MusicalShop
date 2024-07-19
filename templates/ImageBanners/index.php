<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ImageBanner> $imageBanners
 */
?>
<div class="imageBanners index content">
    <?= $this->Html->link(__('New Image Banner'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Image Banners') ?></h3>
    <!-- Form tìm kiếm -->
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('search', ['label' => __('Search'), 'value' => $this->request->getQuery('search')]) ?>
    <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->end() ?>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('piority') ?></th>
                    <th><?= $this->Paginator->sort('path_image') ?></th>
                    <th><?= $this->Paginator->sort('url_decription') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <!-- <th><?= $this->Paginator->sort('delete_flg') ?></th> -->
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($imageBanners as $imageBanner): ?>
                <tr>
                    <td><?= $this->Number->format($imageBanner->id) ?></td>
                    <td><?= $this->Number->format($imageBanner->piority) ?></td>
                    <td><?= h($imageBanner->path_image) ?></td>
                    <td><?= h($imageBanner->url_decription) ?></td>
                    <td><?= h($imageBanner->start_date) ?></td>
                    <td><?= h($imageBanner->end_date) ?></td>
                    <td><?= h($imageBanner->created_at) ?></td>
                    <td><?= h($imageBanner->created_by) ?></td>
                    <td><?= h($imageBanner->updated_at) ?></td>
                    <td><?= h($imageBanner->updated_by) ?></td>
                    <!-- <td><?= h($imageBanner->delete_flg) ?></td> -->
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $imageBanner->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imageBanner->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imageBanner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageBanner->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
