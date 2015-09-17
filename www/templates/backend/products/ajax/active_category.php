<li class="dd-item" data-id="<?php echo $category['id']; ?>">
    <div class="dd-handle"><?php echo $category['category_name']; ?></div>
    <a style="padding: 6px 0;" class="btn btn-icon nestable-edit delete_category">
        <i class="fa text-warning fa-remove"></i>
    </a>
    <a style="padding: 6px 0;" class="btn btn-icon nestable-delete edit_category" href="#add_category_modal" data-toggle="modal">
        <i class="fa fa-pencil"></i>
    </a>
</li>