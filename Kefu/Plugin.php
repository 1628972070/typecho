<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 网站右侧浮动客服
 * 
 * @package Kefu 
 * @author 双少
 * @version 1.0.0
 * @link https://www.qqeg.cn
 */
class Kefu_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate() {
        Typecho_Plugin::factory('Widget_Archive')->header = array('Kefu_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('Kefu_Plugin', 'footer');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
       /**表单设置 */
        $name = new Typecho_Widget_Helper_Form_Element_Text('word', NULL, '欢迎使用 Typecho ', _t('客服提示语'));
        $form->addInput($name);
		$name = new Typecho_Widget_Helper_Form_Element_Text('url', NULL, 'https://www.qqeg.cn', _t('客服跳转链接（可设置为QQ会话链接）'));
        $form->addInput($name);
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 页头输出CSS
     *
     * @access public
     * @param unknown header
     * @return unknown
     */
    public static function header() {
        $Path = Helper::options()->pluginUrl . '/Kefu/';
        echo '<link rel="stylesheet" type="text/css" href="' . $Path . 'css/style.css" />';
    }
	/**
     * 页脚输出代码
     *
     * @access public
     * @param unknown footer
     * @return unknown
     */
    public static function footer() {
        $Options = Helper::options()->plugin('Kefu');
        $Path = Helper::options()->pluginUrl . '/Kefu/';
       echo '<div class="consult_contact">
    <div class="consult_wrap"><a href="' . Typecho_Widget::widget('Widget_Options')->plugin('Kefu')->url . '" rel="nofollow" target="_blank">
    <div class="tip">' . Typecho_Widget::widget('Widget_Options')->plugin('Kefu')->word . '</div>
    <img src="' . $Path . 'images/ball.png" class="ball">
    <img src="' . $Path . 'images/bg_0.png" class="staff_img">
    <img src="' . $Path . 'images/bg_1.png" class="bg-1">
    <img src="' . $Path . 'images/bg_2.png" class="bg-2">
    <img src="' . $Path . 'images/bg_3.png" class="bg-3"></a></div></div>';
    }
}
