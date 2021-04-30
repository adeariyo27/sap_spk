<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Indonesian
*
* Author: Toni Haryanto
* 		  toha.samba@gmail.com
*         @yllumi
*
* Author: Daeng Muhammad Feisal
*         daengdoang@gmail.com
*         @daengdoang
*
* Author: Suhindra
*         suhindra@hotmail.co.id
*         @suhindra
*
* Location: https://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  11.15.2011
* Last-Edit: 28.04.2016
*
* Description:  Indonesian language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']				= "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Akun User Berhasil Dibuat</div>";
$lang['account_creation_unsuccessful']				= "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Tidak Dapat Membuat Akun</div>";
$lang['account_creation_duplicate_email']			= "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Email Sudah Digunakan atau Tidak Valid</div>";
$lang['account_creation_duplicate_identity']	    = "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Identitas Sudah Digunakan atau Tidak Valid</div>";

// TODO Please Translate
$lang['account_creation_missing_default_group']		= 'Standar grup tidak diatur';
$lang['account_creation_invalid_default_group']		= 'Pengaturan Nama Grup Standar Tidak Valid';


// Password
$lang['password_change_successful']					= '<div class="alert alert-info">Password Berhasil Diubah</div>';
$lang['password_change_unsuccessful']				= '<div class="alert alert-danger">Password Gagal Diubah</div>';
$lang['forgot_password_successful']					= "<div class='alert alert-info'>Email untuk Set Ulang Password Telah Dikirim</div";
$lang['forgot_password_unsuccessful']				= '<div class="alert alert-danger">Tidak Dapat Set Ulang Password</div>';

// Activation
$lang['activate_successful']						= "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Akun Telah Diaktifkan</div>";
$lang['activate_unsuccessful']						= "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Tidak Dapat Mengaktifkan Akun</div>";
$lang['deactivate_successful']						= "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Akun Telah Dinonaktifkan</div>";
$lang['deactivate_unsuccessful']					= "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Tidak Dapat Menonaktifkan Akun</div>";
$lang['activation_email_successful']			    = 'Email untuk Aktivasi Telah Dikirim. Silahkan cek inbox atau spam';
$lang['activation_email_unsuccessful']		        = 'Tidak Dapat Mengirimkan Email Aktivasi';
$lang['deactivate_current_user_unsuccessful']       = "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>TIdak dapat menonaktifkan Akun yang sedang login</div>";

// Login / Logout
$lang['login_successful']							= "<div class='alert alert-info'>Log In berhasil</div>";
$lang['login_unsuccessful']							= "<div class='alert alert-danger'>Email atau Password salah</div>";
$lang['login_unsuccessful_not_active']	            = "<div class='alert alert-danger'>Akun telah dinonaktifkan</div>";
$lang['login_timeout']								= "<div class='alert alert-danger'>Akun sementara terkunci. Coba beberapa saat lagi</div>";
$lang['logout_successful']							= "<div class='alert alert-info'>Log Out berhasil</div>";

// Account Changes
$lang['update_successful']							=  "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Informasi User Berhasil Diperbarui</div>";
$lang['update_unsuccessful']						= 'Gagal Memperbaharui Informasi Akun';
$lang['delete_successful']							= 'Pengguna Telah Dihapus';
$lang['delete_unsuccessful']						= 'Gagal Menghapus Pengguna';

// Groups
$lang['group_creation_successful']				    = "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>User Level Berhasil Dibuat</div>";
$lang['group_already_exists']						= "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>User Level Telah Digunakan</div>";
$lang['group_update_successful']					= "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Informasi User Level Berhasil Diperbarui";
$lang['group_delete_successful']					= "<div class='alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>User Level Telah Dihapus</div>";
$lang['group_delete_unsuccessful']				    = "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>User Level Gagal Dihapus</div>";
$lang['group_delete_notallowed']					= "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Tidak Dapat Menghapus Administrator</div>";
$lang['group_name_required']						= "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Nama User Level Tidak Boleh Kosong</div>";
$lang['group_name_admin_not_alter']			    	= "Nama Grup Admin Tidak Bisa Diubah";

// Activation Email
$lang['email_activation_subject']					= 'Aktivasi Akun';
$lang['email_activate_heading']						= 'Aktifkan Akun dari %s';
$lang['email_activate_subheading']				    = 'Silahkan klik tautan berikut untuk %s.';
$lang['email_activate_link']						= 'Aktifkan Akun Anda';

// Forgot Password Email
$lang['email_forgotten_password_subject']			= 'Verifikasi Lupa Password';
$lang['email_forgot_password_heading']				= 'Setel Ulang Kata Sandi untuk %s';
$lang['email_forgot_password_subheading']			= 'Silahkan klik tautan berikut untuk %s.';
$lang['email_forgot_password_link']					= 'Setel Ulang Kata Sandi';

// New Password Email
$lang['email_new_password_subject']					= 'Kata Sandi Baru';
$lang['email_new_password_heading']					= 'Kata Sandi Baru Untuk %s';
$lang['email_new_password_subheading']			    = 'Kata Sandi Telah Diubah Ke: %s';
