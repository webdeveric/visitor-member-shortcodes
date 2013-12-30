<?php
/*
Plugin Name: Visitor/Member Shortcodes
Version: 0.1.1
Description: This plugin provides shortcodes to show content if the user is logged in or not.
Author: Eric King
Author URI: http://webdeveric.com
*/

class VisitorMemberShortcodes {

	public static function init() {
		add_shortcode('visitor', array( __CLASS__, 'visitor') );
		add_shortcode('member', array( __CLASS__, 'member') );
	}

	private static function shortcode( $atts, $content = null, $code = null, $condition = false ){
		if( ! isset( $content ) )
			return '';
		if( $condition ){
			return do_shortcode( $content );
		}
		return '';
	}

	public static function visitor( $atts, $content = null, $code = null ){
		return self::shortcode( $atts, $content, $code, ! is_user_logged_in() );
	}

	public static function member( $atts, $content = null, $code =  null ){
		return self::shortcode( $atts, $content, $code, is_user_logged_in() );
	}

}
VisitorMemberShortcodes::init();