<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function ceklogin(){
	$CI=& get_instance();
	if (!$CI->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$CI->ion_auth->is_admin() && !$CI->ion_auth->is_operator()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('Hanya Administrator dan Operator yang bisa akses halaman ini');
		}
}