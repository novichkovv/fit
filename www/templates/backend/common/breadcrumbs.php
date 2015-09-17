<div class="row">
    <div class="col-xs-2 col-md-1">
        <div class="stat-icon" style="color:#4BAAB7;">
            <i class="<?php echo $breadcrumb['icon'] ? $breadcrumb['icon'] : registry::get('system_route')['icon']; ?> fa-3x stat-elem"></i>
        </div>
    </div>
    <div class="col-xs-9 col-md-10">
        <h1><?php echo $breadcrumb['title'] ? $breadcrumb['title'] : registry::get('system_route')['title']; ?></h1>
    </div>
</div>
<br>
