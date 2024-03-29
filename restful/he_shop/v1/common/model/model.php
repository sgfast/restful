<?php

/**
 * 数据集合静态类 */
class COL{
	
	/**
	 * 广告部分 */
	public static $Ad_Swipe =		'shop.ad.swipe';
	public static $Ad_Style =		'shop.ad.style';
	public static $Ad_Category =	'shop.ad.category';
	public static $Ad_Notice =		'shop.ad.notice';
    
    /**
     * 商品部分 */
    public static $Pt_Category =    'shop.pt.category';
    public static $Pt_Brand =       'shop.pt.brand';
    public static $Pt_Product =     'shop.pt.product';
    public static $Pt_Comment =     'shop.pt.comment';
    
    /**
     * 用户部分 */
    public static $Er_User =        'shop.er.user';
    public static $Er_Message =     'shop.er.message';
    public static $Er_Coupon =      'shop.er.coupon';
    public static $Er_Receive =     'shop.er.receive';
    
    /**
     * 订单部分 */
    public static $Sp_Cart =        'shop.sp.cart';
    public static $Sp_Order =       'shop.sp.order';
    public static $Sp_Item =        'shop.sp.item';
    public static $Sp_Express =     'shop.sp.express';
}

/**
 * 文件集合静态类 */
class MOD{
	
	/**
	 * 广告部分 */
	public static $Ad_Swipe =		'advanced/swipe.php';
	public static $Ad_Style =		'advanced/style.php';
	public static $Ad_Category =	'advanced/category.php';
	public static $Ad_Notice =		'advanced/notice.php';
	
    /**
     * 商品部分 */
    public static $Pt_Category =    'product/category.php';
    public static $Pt_Brand =       'product/brand.php';
    public static $Pt_Product =     'product/product.php';
    public static $Pt_Comment =     'product/comment.php';
    
    /**
     * 用户部分 */
    public static $Er_User =        'user/user.php';
    public static $Er_Message =     'user/message.php';
    public static $Er_Coupon =      'user/coupon.php';
    public static $Er_Receive =     'user/receive.php';
    
    /**
     * 订单部分 */
    public static $Sp_Cart =        'order/cart.php';
    public static $Sp_Order =       'order/order.php';
    public static $Sp_Item =        'order/item.php';
    public static $Sp_Express =     'order/express.php';
}

/**
 * 动态属性集合，都是在子model文件中动态添加进来的，例：
 * $Er_User = new ModelClass();
 * $Er_User->Main = Er_User_Main;
 * $Er_User->Set = Er_User_Set;
 */
class ModelClass{}

?>