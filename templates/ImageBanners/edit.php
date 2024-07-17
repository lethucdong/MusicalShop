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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $imageBanner->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $imageBanner->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Image Banners'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="imageBanners form content">
            <?= $this->Form->create($imageBanner) ?>
            <fieldset>
                <legend><?= __('Edit Image Banner') ?></legend>
                <?php
                    echo $this->Form->control('piority');
                    echo $this->Form->control('path_image');
                    echo $this->Form->control('url_decription');
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date');
                    //echo $this->Form->control('created_at');
                    //echo $this->Form->control('created_by');
                    //echo $this->Form->control('updated_at');
                    //echo $this->Form->control('updated_by');
                    //echo $this->Form->control('delete_flg');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
