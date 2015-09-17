<ol class="dd-list">
    <?php foreach ($child as $child): ?>
        <li class="dd-item" data-id="<?php echo $child['id']; ?>">
            <div class="dd-handle"><?php echo $child['category_name']; ?></div>
            <a class="btn btn-icon nestable-edit delete_category">
                <i class="fa text-warning fa-remove"></i>
            </a>
            <a class="btn btn-icon nestable-delete edit_category" href="#add_category_modal" data-toggle="modal">
                <i class="fa fa-pencil"></i>
            </a>
            <?php if ($child = $child['children']): ?>
                <?php require(TEMPLATE_DIR . DS . 'products' . DS . 'nested_category.php'); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ol>