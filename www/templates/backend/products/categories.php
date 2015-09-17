<?php echo $breadcrumbs; ?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                <h3 class="panel-title">Категории</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="row">
                        <div class="dd">
                            <ol class="dd-list">
                                <?php foreach ($categories as $category): ?>
                                    <li class="dd-item" data-id="<?php echo $category['id']; ?>">
                                        <div class="dd-handle"><?php echo $category['category_name']; ?></div>
                                        <a style="padding: 6px 0;" class="btn btn-icon nestable-edit delete_category">
                                            <i class="fa text-warning fa-remove"></i>
                                        </a>
                                        <a style="padding: 6px 0;" class="btn btn-icon nestable-delete edit_category" href="#add_category_modal" data-toggle="modal">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <?php if ($child = $category['children']): ?>
                                            <?php require(TEMPLATE_DIR . DS . 'products' . DS . 'nested_category.php'); ?>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="text-center">
            <a class="btn btn-info" data-toggle="modal" id="add_category" href="#add_category_modal">
                <i class="fa fa-plus"></i> Добавить категорию
            </a>
        </div>
        <br>
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h3 class="panel-title">Неактивные Категории</h3>
            </div>
            <div class="panel-body" id="inactive_categories">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add_category_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="category_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Новая Категория</h4>
                </div>
                <div class="modal-body with-padding">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" class="form-control" name="category[category_name]">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="category[active]" value="1" <?php if($category['active'] || !$category) echo 'checked'; ?>>
                                Активный
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="category[id]" value="">
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $('.dd').nestable({maxDepth:5});
        $('body').on('change', '.dd', function(){
            setTimeout(function()
            {
                var order = $('.dd').nestable('serialize');
                var params = {
                    'action': 'serialize',
                    'values': {'order': order},
                    callback: function (msg) {

                    }
                };
                ajax(params);
            },1000);
        });

        $("#add_category").click(function()
        {
            $("#category_form input[type='text'], #category_form textarea, #category_form select").each(function()
            {
                $(this).val('');
            })
        });
        $("#category_form").submit(function()
        {
            if(validate('category_form')) {
                var params = {
                    'action': 'save_category',
                    'get_from_form': 'category_form',
                    callback: function (msg) {
                        ajax_respond(msg,
                            function(respond){
                                if(respond.active) {
                                    if($('.dd-item[data-id="' + respond.category_id + '"]').length) {
//                                        var item = $('.dd-item[data-id="' + respond.category_id + '"]');
//                                        $(item).after(respond.template);
//                                        $(item).remove();
                                        $('.dd-item[data-id="' + respond.category_id + '"]').find('dd-handle').html(respond.category_name);
                                    } else {
                                        console.log($(".dd").children('.dd-list'));
                                        $(".dd").children('.dd-list').append(respond.template);
                                    }
                                    $('.dd').nestable({maxDepth:5});
                                }
                                $("#add_category_modal").modal('hide');
                            }
                        );
                    }
                };
                ajax(params);
            }
            return false;
        });

        $('body').on('click', ".edit_category", function()
        {
            var category_id = $(this).closest('.dd-item').attr('data-id');
            var params = {
                'action': 'get_category_data',
                'values': {category_id: category_id},
                'callback': function (msg) {
                    ajax_respond(msg,
                        function(respond) {
                            for(var key in respond.category) {
                                var type = $("[name='category[" + key + "]'").attr('type');
                                if(type == 'checkbox') {
                                    if ($("[name='category[" + key + "]'").val()) {
                                        $("[name='category[" + key + "]'").prop('checked', true).trigger('change');
                                    } else {
                                        $("[name='category[" + key + "]'").prop('checked', false).trigger('change');
                                    }
                                } else {
                                    $("[name='category[" + key + "]'").val(respond.category[key]);
                                }
                            }
                        }
                    );
                }
            };
            ajax(params);
        });
    });
</script>