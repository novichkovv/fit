<aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
<!-- BEGIN SIDE-NAV-CATEGORY -->
<div class="side-nav-categories">
    <div class="block-title"> Категории </div>
    <!--block-title-->
    <!-- BEGIN BOX-CATEGORY -->
    <div class="box-content box-category">
        <ul>
            <?php foreach ($common_vars['menu_categories'] as $category): ?>
            <li>
                <a class="active" href="<?php echo SITE_DIR; ?><?php echo $category['category_key']; ?>/">
                    <?php echo $category['category_name']; ?>
                </a>
                <span class="subDropdown minus"></span>
                <?php if ($category['children']): ?>
                    <ul class="level0_415" style="display:block">
                    <?php foreach ($category['children'] as $child): ?>
                        <li>
                            <a href="<?php echo SITE_DIR; ?><?php echo $child['category_key']; ?>">
                                <span><?php echo $child['category_name']; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!--box-content box-category-->
</div>
<!--side-nav-categories-->
<div class="block block-layered-nav">
    <div class="block-title"> Цели </div>
    <div class="block-content">
<!--        <p class="block-subtitle">Shopping Options</p>-->
        <dl id="narrow-by-list">
            <dt class="odd">Набор массы</dt>
            <dt class="odd">Рост силы</dt>
            <dt class="odd">Похудение</dt>
            <dt class="odd">Прирост энергии</dt>
            <dt class="odd">Укрепление здоровья</dt>
        </dl>
    </div>
</div>
<div class="custom-slider">
    <div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active"><img src="images/slide3.jpg" alt="slide3">
                    <div class="carousel-caption">
                        <h3><a title=" Sample Product" href="product-detail.html">50% OFF</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a class="link" href="#">Buy Now</a></div>
                </div>
                <div class="item"><img src="images/slide1.jpg" alt="slide1">
                    <div class="carousel-caption">
                        <h3><a title=" Sample Product" href="product-detail.html">Hot collection</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="item"><img src="images/slide2.jpg" alt="slide2">
                    <div class="carousel-caption">
                        <h3><a title=" Sample Product" href="product-detail.html">Summer collection</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="sr-only">Next</span> </a></div>
    </div>
</div>

<div class="block block-list block-cart">
    <div class="block-title"> My Cart </div>
    <div class="block-content">
        <div class="summary">
            <p class="amount">There is <a href="#">1 item</a> in your cart.</p>
            <p class="subtotal"> <span class="label">Cart Subtotal:</span> <span class="price">$299.00</span> </p>
        </div>
        <div class="ajax-checkout">
            <button type="button" title="Checkout" class="button button-checkout" onClick="#"> <span>Checkout</span> </button>
        </div>
        <p class="block-subtitle">Recently added item(s)</p>
        <ul id="cart-sidebar" class="mini-products-list">
            <li class="item">
                <div class="item-inner"> <a href="#" class="product-image"><img src="products-images/p1.jpg" width="80" alt="product"></a>
                    <div class="product-details">
                        <div class="access"> <a href="#" class="btn-remove1">Remove</a>
                            <a href="" title="Edit item" class="btn-edit">
                                <i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                        <!--access-->

                        <strong>1</strong> x <span class="price">$299.00</span>
                        <p class="product-name"><a href="#">RETIS LAPEN CASEN</a></p>
                    </div>
                    <!--product-details-bottoms-->
                </div>
            </li>
            <li class="item  last1">
                <div class="item-inner"> <a href="#" class="product-image"><img src="products-images/p2.jpg" width="80" alt="product"></a>
                    <div class="product-details">
                        <div class="access"> <a href="#" class="btn-remove1">Remove</a>
                            <a href="" title="Edit item" class="btn-edit">
                                <i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                        <!--access-->

                        <strong>1</strong> x <span class="price">$299.00</span>
                        <p class="product-name"><a href="#">RETIS LAPEN CASEN</a></p>
                    </div>
                    <!--product-details-bottoms-->
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="block block-compare">
    <div class="block-title"> Compare Products </div>
    <div class="block-content">
        <ol id="compare-items">
            <li class="item odd">
                <a href="#" class="btn-remove1" onClick="#"></a>
                <a class="product-name" href="#">RETIS LAPEN CASEN</a>            </li>
            <li class="item odd">
                <a href="#" class="btn-remove1" onClick="#"></a>
                <a class="product-name" href="#">RETIS LAPEN CASEN</a>            </li>
            <li class="item odd">
                <a href="#" class="btn-remove1" onClick="#"></a>
                <a class="product-name" href="#">RETIS LAPEN CASEN</a>            </li>
            <li class="item odd">
                <a href="#" class="btn-remove1" onClick="#"></a>
                <a class="product-name" href="#">RETIS LAPEN CASEN</a>            </li>
        </ol>

        <div class="ajax-checkout">
            <button type="button" title="Compare" class="button button-compare" onClick="#"><span>Compare</span></button>
            <button class="button button-clear" href="#"><span>Clear</span></button>
        </div><!--ajax-checkout-->
    </div>
    <!--block-content-->
</div>
<!--block block-list block-compare-->


<div class="block block-poll">
    <div class="block-title"> Community Poll </div>
    <form id="pollForm" action="#" method="post" onSubmit="return validatePollAnswerIsSelected();">
        <div class="block-content">
            <p class="block-subtitle">What is your favorite color</p>
            <ul id="poll-answers">
                <li class="odd">
                    <input type="radio" name="vote" class="radio poll_vote" id="vote_1" value="1">
                  <span class="label">
                  <label for="vote_1">Green</label>
                  </span> </li>
                <li class="even">
                    <input type="radio" name="vote" class="radio poll_vote" id="vote_2" value="2">
                  <span class="label">
                  <label for="vote_2">Red</label>
                  </span> </li>
                <li class="odd">
                    <input type="radio" name="vote" class="radio poll_vote" id="vote_3" value="3">
                  <span class="label">
                  <label for="vote_3">Black</label>
                  </span> </li>
                <li class="last even">
                    <input type="radio" name="vote" class="radio poll_vote" id="vote_4" value="4">
                  <span class="label">
                  <label for="vote_4">Magenta</label>
                  </span> </li>
            </ul>
            <div class="actions">
                <button type="submit" title="Vote" class="button button-vote"><span>Vote</span></button>
            </div>
        </div>
    </form>
</div>
<div class="hot-banner"><img src="images/hot-trends-banner.jpg" alt="banner"></div>
</aside>
<!--col-right sidebar-->
</div>
<!--
<li>
                <a class="active" href="grid.html">Протеины</a> <span class="subDropdown minus"></span>
                <ul class="level0_415" style="display:block">
                    <li> <a href="grid.html"> Сывороточные </a> <span class="subDropdown plus"></span>
                        <ul class="level1" style="display:none">
                            <li> <a href="grid.html"><span>Все</span></a> </li>
                            <li> <a href="grid.html"><span>Изоляты</span></a> </li>
                            <li> <a href="grid.html"><span>Гидролизаты</span></a> </li>
                            <li> <a href="grid.html"><span>Простые</span></a> </li>
                        </ul>
</li>
<li> <a href="grid.html"> Казеиновые </a> <span class="subDropdown plus"></span>
    <ul class="level1" style="display:none">
        <li> <a href="grid.html"><span>Candle Salad</span></a> </li>
        <li> <a href="grid.html"><span>Frogeye Salad</span></a> </li>
        <li> <a href="grid.html"><span>Green Papaya Salad</span></a> </li>
        <li> <a href="grid.html"><span>Waldorf salad</span></a> </li>
    </ul>
</li>
<li> <a href="grid.html"> Соевые </a> <span class="subDropdown plus"></span>
    <ul class="level1" style="display:none">
        <li> <a href="grid.html"><span>Louis Dressings</span></a> </li>
        <li> <a href="grid.html"><span>French Dressings</span></a> </li>
        <li> <a href="grid.html"><span>Gingner Dressings</span></a> </li>
        <li> <a href="grid.html"><span>Italian Dressings</span></a> </li>
    </ul>
</li>
<li> <a href="grid.html"> Комплексные </a> <span class="subDropdown plus"></span>
    <ul class="level1" style="display:none">
        <li> <a href="grid.html"><span>Fenugreek</span></a> </li>
        <li> <a href="grid.html"><span>Spinach</span></a> </li>
        <li> <a href="grid.html"><span>Malva</span></a> </li>
        <li> <a href="grid.html"><span>Cabbage</span></a> </li>
    </ul>
</li>
</ul>
</li>
<li> <a href="grid.html">Гейнеры</a> <span class="subDropdown plus"></span>
    <ul class="level0_455" style="display:none">
        <li> <a href="grid.html"> Cold Soups </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Red Bean Soup</span></a> </li>
                <li> <a href="grid.html"><span>Fruit Soup</span></a> </li>
                <li> <a href="grid.html"><span>Naengguk</span></a> </li>
                <li> <a href="grid.html"><span>Borscht</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> Cream Soups  </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Chowder</span></a> </li>
                <li> <a href="grid.html"><span>Asparagus Soup</span></a> </li>
                <li> <a href="grid.html"><span>Broccoli Soup</span></a> </li>
                <li> <a href="grid.html"><span>Mushroom Soup</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> Vegitable Soups </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>French Onion Soup</span></a> </li>
                <li> <a href="grid.html"><span>Leek Soup</span></a> </li>
                <li> <a href="grid.html"><span>Minestrone</span></a> </li>
                <li> <a href="grid.html"><span>Spring Soup</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> Bean Soups </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Bouneschlupp</span></a> </li>
                <li> <a href="grid.html"><span>Jókai Bean Soup</span></a> </li>
                <li> <a href="grid.html"><span>Kwati Soup</span></a> </li>
                <li> <a href="grid.html"><span>Senate bean</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> Bread Soups </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Tomato Soup</span></a> </li>
                <li> <a href="grid.html"><span>Manchow Soup</span></a> </li>
                <li> <a href="grid.html"><span>Sweet Corn Soup</span></a> </li>
                <li> <a href="grid.html"><span>Shorba Soup</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> Chinese Soups </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Hot & Sour</span></a> </li>
                <li> <a href="grid.html"><span>Noodle Soup</span></a> </li>
                <li> <a href="grid.html"><span>Corn Crab Soup</span></a> </li>
                <li> <a href="grid.html"><span>Sago Soup</span></a> </li>
            </ul>
        </li>

    </ul>
</li>
<li> <a href="#.html">Аминокислоты</a> <span class="subDropdown plus"></span>
    <ul class="level0_482" style="display:none">
        <li> <a href="grid.html"> Indian </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Aloo Chaat</span></a> </li>
                <li> <a href="grid.html"><span>Batata Vada</span></a> </li>
                <li> <a href="grid.html"><span>Kachori</span></a> </li>
                <li> <a href="grid.html"><span>Panipuri</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> Pizza </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Greek Pizza</span></a> </li>
                <li> <a href="grid.html"><span>Pizza Rolls</span></a> </li>
                <li> <a href="grid.html"><span>Grilled Pizza</span></a> </li>
                <li> <a href="grid.html"><span>Pizza Strips</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> McDonald's </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Kiwiburger</span></a> </li>
                <li> <a href="grid.html"><span>Happy Meal</span></a> </li>
                <li> <a href="grid.html"><span>McMuffin</span></a> </li>
                <li> <a href="grid.html"><span>McGriddles</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> Wendy's Foods </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Bacon Deluxe</span></a> </li>
                <li> <a href="grid.html"><span>Baconator</span></a> </li>
                <li> <a href="grid.html"><span>Frescata</span></a> </li>
                <li> <a href="grid.html"><span>Frosty</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> Burger King</a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Big King</span></a> </li>
                <li> <a href="grid.html"><span>TenderCrisp</span></a> </li>
                <li> <a href="grid.html"><span>Whopper</span></a> </li>
                <li> <a href="grid.html"><span>Kuro Burger</span></a> </li>
            </ul>
        </li>
        <li> <a href="grid.html"> Sandwiches </a> <span class="subDropdown minus"></span>
            <ul class="level1" style="display:none">
                <li> <a href="grid.html"><span>Hamburgers</span></a> </li>
                <li> <a href="grid.html"><span> Hot Dogs‎</span></a> </li>
                <li> <a href="grid.html"><span>American Sandwiches</span></a> </li>
                <li> <a href="grid.html"><span>Chilean Sandwiches</span></a> </li>
            </ul>
        </li>
    </ul>
</li>
<li> <a href="grid.html">Жиросжигатели</a> </li>-->