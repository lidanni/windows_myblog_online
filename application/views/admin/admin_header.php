<?php
    $admin = $this -> session -> userdata('admin');
    if(!$admin){
        redirect('admin/login');
    }
?>

<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
        <strong>后台管理</strong>
        <div class="show_user"><?php echo $admin->admin_name;?></div>
    </div>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="admin/logout">退出登录</a></li>
        </ul>
    </div>
</header>