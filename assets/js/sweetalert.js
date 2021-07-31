const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if(flashData){
    Swal.fire({
        title: 'Berhasil ',
        text: 'Data Berhasil ' + flashData,
        icon: 'success'
    });
}

$('.tombol-hapus').on('click', function(event){
    event.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Hapus Data?',
        text: "Data yang dihapus tidak bisa direstore",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
      })
});