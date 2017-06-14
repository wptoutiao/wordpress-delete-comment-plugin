<?php
/*
 Plugin Name: WordPress Delete Comment Plugin
 Plugin URI: http://www.wptoutiao.com/
 Description: Delete Comment
 Version: 1.0.0
 Author: shenglei
 Author URI: http://www.wptoutiao.com/
 */

//添加菜单项
function wpdcp_admin_menu()
{
	add_submenu_page( 'options-general.php', '删除WordPress评论插件', '删除WordPress评论', 'manage_options', 'wpdcp', 'wptoutiao_wpdcp');
}
add_action('admin_menu', 'wpdcp_admin_menu', 2);

function wptoutiao_wpdcp()
{
	if(isset($_POST['delete_all'])){
		//删除所有评论
		//global $wpdb;
		//$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => '0' ));
		//$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => '1' ));
		//$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => 'spam' ));
		//$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => 'trash' ));
	}
	else if(isset($_POST['delete_1'])){
		//删除待审评论、垃圾评论，回收站评论
		global $wpdb;
		$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => '0' ));
		$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => 'spam' ));
		$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => 'trash' ));
	}
	else if(isset($_POST['delete_2'])){
		//只删除待审评论
		global $wpdb;
		$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => '0' ));
	}
	else if(isset($_POST['delete_3'])){
		//只删除垃圾评论
		global $wpdb;
		$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => 'spam' ));
	}
	else if(isset($_POST['delete_4'])){
		//只删除回收站评论
		global $wpdb;
		$wpdb->delete( 'wptoutiao_comments', array( 'comment_approved' => 'trash' ));
	}
	?>
	<form method="post" name="wpdcp" id="wpdcp">   
		<h2>WordPress删除评论插件</h2>
		<p class="submit">
			<input type="submit" onclick="return confirm('确定要删除?')" name="delete_all" value="<?php _e('删除所有评论'); ?>" />
			<br/>
			<input type="submit" onclick="return confirm('确定要删除?')" name="delete_1" value="<?php _e('删除待审评论、垃圾评论，回收站评论'); ?>" />
			<br/>
			<input type="submit" onclick="return confirm('确定要删除?')" name="delete_2" value="<?php _e('只删除待审评论'); ?>" />
			<br/>
			<input type="submit" onclick="return confirm('确定要删除?')" name="delete_3" value="<?php _e('只删除垃圾评论'); ?>" />
			<br/>
			<input type="submit" onclick="return confirm('确定要删除?')" name="delete_4" value="<?php _e('只删除回收站评论'); ?>" />
		</p>
		<p>
			Powered By <a href="http://www.wptoutiao.com/" target="_black">WordPress头条</a>
		</p>
    </form>
	<?php
}