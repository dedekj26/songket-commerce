const flashData = $('.flash-data').data('flashdata');
const jenis = $('.flash-data').data('jenis');

if( flashData ) {
	Swal.fire({
		icon: 'success',
		title: 'Data '+jenis,
		text: 'Berhasil '+flashData
	});
}

$('.tombol-hapus').on('click', function(e){

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Yakin ingin hapus?',
	  text: "Aksi ini tidak dapat dibatalkan!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#d33',
	  cancelButtonColor: '#3085d6',
	  confirmButtonText: 'Hapus Data!',
	  cancelButtonText: 'Batal'
	}).then((result) => {
	  if (result.value) {
	  		document.location.href = href;
	  }
	})

});