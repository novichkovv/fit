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