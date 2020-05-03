const Data = $('.flash-data').data('login');

if( Data == 'username' ) {
	Swal.fire({
		icon: 'error',
		title: 'Username',
		text: 'Tidak Terdaftar'
	});
} else if( Data == 'password' ) {
	Swal.fire({
		icon: 'error',
		title: 'Password',
		text: 'Anda Salah'
	});
} else if( Data == 'logout' ) {
	Swal.fire({
		icon: 'success',
		title: 'Berhasil',
		text: 'Logout dari Akun'
	});
}