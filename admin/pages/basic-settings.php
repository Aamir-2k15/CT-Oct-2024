<?php
/*
foreach (CT_AVAILABLE_OPTIONS as $key => $value) {
    FORMBUILDER->field([
        'type' => 'checkbox',
        'label' => $value,
        'name' => $key,
        'id' => $key,
        'dbval' => !empty(CT_SETTINGS[$key]) ? CT_SETTINGS[$key] : '',
    ]);
}
echo '<hr>';
*/
foreach (CT_AVAILABLE_FEATURES as $k => $v) {
    FORMBUILDER->field([
        'type' => $v,
        'label' => $k,
        'name' => $k,
        'id' => $k,
        'dbval' => !empty(CT_SETTINGS[$k]) ? CT_SETTINGS[$k] : '',
        'container_class' => 'row',
        'label_class' => 'col',
        'input_class' => 'col ',
    ]);
}
echo '<hr>';

