$(function () {

    $('.addDataButton').on('click', function () {
        $('#ModalHeadLabel').html('Add Student Data');
        $('.modal-footer button[type=submit]').html('Add Data');
        $('#nama').val("");
        $('#nim').val("");
        $('#email').val("");
        $('#jurusan').val("");
        $('#id').val("");
    });

    $('.showChangeModal').on('click', function () {
        $('#ModalHeadLabel').html('Change Student Data');
        $('.modal-footer button[type=submit]').html('Change Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {
                // nama data yang dikirimkan : // isi datanya
                id: id,
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
    });

});