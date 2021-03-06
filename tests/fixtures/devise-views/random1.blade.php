<?php
$loadDefaults = (!isset($element->value->file) || $element->value->file == '') ? 'dvs-editor-load-defaults' : '';
?><?= Form::open(array('route' => array('dvs-fields-update', $element->id), 'method' => 'put', 'data-dvs-field-id' => $element->id, 'data-dvs-field-type' => $element->dvs_type, 'id' => 'dvs-sidebar-field-form')) ?>
    <div class="dvs-editor-values">

        <?= Form::label('File Path')?>
        <?= Form::text('file',
                        $element->value->file,
                        array('class'=>'dvs-liveupdate-listen ' . $loadDefaults,
                                 'data-dvs-type' => 'file',
                                 'data-dvs-index' => $element->index,
                                 'data-dvs-alternate-target' => $element->alternateTarget,
                                 'data-dvs-key' => $element->key
                        )) ?>

        <div class="dvs-sidebar-button-grid dvs-property">
            <button type="button" data-target="file" class="browse dvs-button dvs-button-solid dvs-button-success">Select or Upload File</button>
        </div>

        <?php echo $__env->make('devise::admin.sidebar._collection_instance_id', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('devise::admin.sidebar._field_scope', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?= Form::close() ?>

<script type="text/javascript">
    devise.require(['app/sidebar/file'], function(obj){
        var mediaManagerUlr = '<?= URL::route('dvs-media-manager') ?>';
        obj.init(mediaManagerUlr);
    });
</script>