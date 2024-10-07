    <?php
    foreach (CT_SOCIAL_MEDIA_PLATFORMS as $key => $value) :

        FORMBUILDER->field([
            'type' => 'text',
            'label' => $key,
            'name' => 'sm_' . $value,
            'id' => 'sm_' . $value,
            'dbval' => !empty(CT_SOCIALMEDIA['sm_'.$value]) ? CT_SOCIALMEDIA['sm_'.$value] : '',
        ]);

    endforeach;

    ?>
