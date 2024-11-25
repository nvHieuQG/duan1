<?php
require_once "core/core.php";

?>

<?php



$act = $_GET['act'] ?? "home";
match($act){
    'home' => $app->home(),
    'register' =>$users->handerViewRegister(),
    'login' => $users->handerViewLogin(),
    'post_register' => $users->post_Register(),
    'check_login' => $users->login(),
    'logout' => $users->logout(),
    'admin'=> $app->admin(),
    // Giao diện shop
    'shop' => $shop->renderShop(),
    'shoping-Cart' => $shop->renderCart(),
    'shop-Pay' => $shop->handerPay(),
    'shop-Contact' => $shop->handerContact(),
    // phần khách hàng
    'info' => $customers->renderInfo(),
    'info_detail' =>$customers->render_Infodetail(),
    'insert_Info' =>$customers->hander_insert_info(),
    'update_Info' => $customers->hander_update_info(),
    'history_shop' => $customers->history_shop(),
    'detail' => $customers->detail_shoping_cart(),
    'cancel_shoping' => $customers->cancel_shoping(),
    'send-otp' => $customers->sendOtp(),
    'confirm_email' => $customers->confirm_email(),
    'action_history' => $customers->action_history(),
    // phần sản phẩm
    'products_detail' => $shop->products_detail(),
    'add-to-cart' => $shop->Add_to_Cart(),
    'update_quantity' => $shop->hander_update_quantity(),
    'apply_voucher' => $shop->apply_voucher(),
    'dathang' => $shop->dathang(),
    'delete_item_cart' => $shop->delete_select(),
    'search' => $shop->search(),
    'filter_by_price' => $shop->filter_by_price(),
    default => "Vui Lòng Kiểm Tra lại"
};

