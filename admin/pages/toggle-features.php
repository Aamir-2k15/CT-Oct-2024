<?php

foreach (CT_AVAILABLE_OPTIONS as $k => $v) {
    FORMBUILDER->field([
        'type' => $v,
        'label' => formatAndStrip($k, 'CT_', ''),
        'name' => $k,
        'id' => $k,
        'dbval' => !empty(CT_SETTINGS[$k]) ? CT_SETTINGS[$k] : '',
        'container_class' => 'row',
        'label_class' => 'col',
        'input_class' => 'col ',
    ]);
}