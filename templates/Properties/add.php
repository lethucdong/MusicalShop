<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties form content">
            <?= $this->Form->create($property) ?>
            <fieldset>
                <legend><?= __('Add Property') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('name');
                ?>
                <div>
                    <label><?= __('Type') ?></label>
                    <?= $this->Form->radio('type', [
                        ['value' => 'text', 'text' => __('Text'), 'checked' => true],
                        ['value' => 'color', 'text' => __('Color')]
                    ], ['id' => 'type-radio']) ?>
                </div>
                <div>
                    <?= $this->Form->control('value', ['type' => 'text', 'id' => 'value-input']) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var typeRadios = document.querySelectorAll('input[name="type"]');
        var valueInput = document.getElementById('value-input');

        typeRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.value === 'color') {
                    valueInput.type = 'color';
                } else {
                    valueInput.type = 'text';
                }
            });
        });

        // Set the initial input type to text
        valueInput.type = 'text';
    });
</script>
