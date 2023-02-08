$(function () {
    obrisi();
    izmena();
});


function obrisi() {

    $(document).on('click', '#obrisi_dugme', function () {

        let id = $(this).attr('value');

        $.ajax({
            url: 'obrisi.php',
            method: 'post',
            data: { id: id },

            success: function (data) {
                $('#content').html(data);
            }
        })

    })
}


function izmena() {

    $(document).on('click', '#izmeni_dugme', function () {

        let id = $(this).attr('value');

        $.ajax({
            url: 'izmena.php',
            method: 'post',
            data: { id: id },
            dataType: 'json',

            success: function (data) {
                $('#forma-izmena').show();
                $('#izmena_id').val(data.id);
                $('#izmena_imep').val(data.imep);
                $('#izmena_prezimep').val(data.prezimep);
                $('#izmena_dijagnoza').val(data.dijagnoza);
                $('#izmena_terapija').val(data.terapija);
                $('#izmena_godine').val(data.godine);
                $('#select-izmena').val(data.lekar_id);
            }
        })

    })


} 