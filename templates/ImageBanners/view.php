<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImageBanner $imageBanner
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Image Banner'), ['action' => 'edit', $imageBanner->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Image Banner'), ['action' => 'delete', $imageBanner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageBanner->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Image Banners'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Image Banner'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="imageBanners view content">
            <h3><?= h($imageBanner->path_image) ?></h3>
            <table>
                <tr>
                    <th><?= __('Path Image') ?></th>
                    <td><?= h($imageBanner->path_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url Decription') ?></th>
                    <td><?= h($imageBanner->url_decription) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($imageBanner->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($imageBanner->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($imageBanner->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Piority') ?></th>
                    <td><?= $this->Number->format($imageBanner->piority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($imageBanner->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($imageBanner->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($imageBanner->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($imageBanner->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $imageBanner->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
