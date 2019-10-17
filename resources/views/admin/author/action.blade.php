<a href="{{route('admin.author.edit', $model)}}" class="btn btn-warning">Edit</a>
<a href="{{route('admin.author.destroy', $model)}}" class="btn btn-danger" id="delete">Hapus</a>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('a#delete').on('click', function (e) {
        // hentikan aksi dari element
        e.preventDefault();

        // dapatkan isi dari attribut href
        let href = $(this).attr('href');

        // konfirmasi penghapusan
        Swal.fire({
            title: 'Apakah yakin ingin dihapus ?',
            text: "Data yang dihapus tidak dapat diakses dan dikembalikan lagi.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin',
            cancelButtonText: 'Batal',
            }).then((result) => {
            if (result.value) {
                // ubah atribut action element form sesuai atribut href
                document.getElementById('deleteForm').action = href;
                // submit form
                document.getElementById('deleteForm').submit();

                Swal.fire(
                'Terhapus',
                'Data yang dipilih telah dihapus.',
                'success'
                )
            }
        })

        
    });
</script>



