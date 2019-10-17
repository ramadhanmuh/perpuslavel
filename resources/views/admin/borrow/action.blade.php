<a href="{{route('admin.borrow.return', $model)}}" class="btn btn-info" id="return">Konfirmasi Pengembalian</a>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('a#return').on('click', function (e) {
        // hentikan aksi dari element
        e.preventDefault();

        // dapatkan isi dari attribut href
        let href = $(this).attr('href');

        // konfirmasi penghapusan
        Swal.fire({
            title: 'Apakah yakin ingin dikonfirmasi ?',
            text: "Pastikan buku telah dicek.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin',
            cancelButtonText: 'Batal',
            }).then((result) => {
            if (result.value) {
                // ubah atribut action element form sesuai atribut href
                document.getElementById('returnForm').action = href;
                // submit form
                document.getElementById('returnForm').submit();

                Swal.fire(
                'Sukses',
                'Data buku telah dikonfimasi.',
                'success'
                )
            }
        })

        
    });
</script>



