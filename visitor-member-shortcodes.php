<?php
/*
Plugin Name: Visitor/Member Shortcodes
Plugin Group: Shortcodes
Version: 0.1.1
Description: This plugin provides shortcodes to show content if the user is logged in or not.
Author: Eric King
Author URI: http://webdeveric.com
*/

class VisitorMemberShortcodes
{
	public static function init()
    {
		add_shortcode('visitor', array( __CLASS__, 'visitor') );
		add_shortcode('member', array( __CLASS__, 'member') );
	}

	private static function shortcode( $atts, $content = null, $shortcode_name = null, $condition = false )
    {
		if( ! isset( $content ) )
			return '';
		return $condition ? do_shortcode( $content ) : '';
	}

	public static function visitor( $atts, $content = null, $shortcode_name = null )
    {
		return self::shortcode( $atts, $content, $shortcode_name, ! is_user_logged_in() );
	}

	public static function member( $atts, $content = null, $shortcode_name =  null )
    {
		return self::shortcode( $atts, $content, $shortcode_name, is_user_logged_in() );
	}
}
VisitorMemberShortcodes::init();
