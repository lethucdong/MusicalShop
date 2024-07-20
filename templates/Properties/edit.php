<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $property->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $property->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="properties form content">
            <?= $this->Form->create($property) ?>
            <fieldset>
                <legend><?= __('Edit Property') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('name');
                ?>
                <div>
                    <label><?= __('Type') ?></label>
                    <?= $this->Form->radio('type', [
                        ['value' => 'text', 'text' => 'Text', 'checked' => false],
                        ['value' => 'color', 'text' => 'Color', 'checked' => false]
                    ], ['id' => 'type-radio']); ?>
                </div>
                <?php
                    echo $this->Form->control('value', [
                        'type' => 'text',
                        'id' => 'value-field'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radios = document.querySelectorAll('input[name="type"]');
        const valueField = document.getElementById('value-field');

        function isColor(value) {
            const s = new Option().style;
            s.color = value;
            return s.color !== '';
        }

        if (isColor(valueField.value)) {
            radios.forEach(radio => {
                if (radio.value === 'color') {
                    radio.checked = true;
                    valueField.type = 'color';
                }
            });
        } else {
            radios.forEach(radio => {
                if (radio.value === 'text') {
                    radio.checked = true;
                    valueField.type = 'text';
                }
            });
        }

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'color') {
                    valueField.type = 'color';
                } else {
                    valueField.type = 'text';
                }
            });
        });
    });
</script>
