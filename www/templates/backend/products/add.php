<?php echo $breadcrumbs; ?>
<form id="product_form">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab">Основные данные</a></li>
                <li><a href="#tab_2" data-toggle="tab">Категории</a></li>
                <li><a href="#tab_3" data-toggle="tab">Изображения</a></li>
                <li><a href="#tab_4" data-toggle="tab">Cross Sell</a></li>
            </ul>
        </div>
        <div class="col-md-7">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Название <span class="required">*</span> </label>
                                <input type="text" data-required="1" name="product[product_name]" value="<?php echo $product['product_name']; ?>" class="form-control">
                                <div class="error-required validate-message">
                                    Обязательное поле
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Url-Ключ <span class="required">*</span> </label>
                                <input type="text" name="product[product_name]" value="<?php echo $product['product_name']; ?>" class="form-control">
                                <div class="error-required validate-message">
                                    Обязательное поле
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Артикул <span class="required">*</span> </label>
                                <input type="text" name="product[product_name]" value="<?php echo $product['product_name']; ?>" class="form-control">
                                <div class="error-required validate-message">
                                    Обязательное поле
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_2">.2</div>
                <div class="tab-pane" id="tab_3">.3..</div>
                <div class="tab-pane" id="tab_4">..4.</div>
            </div>
        </div>
    </div>
</form>
