$(document).ready(function () {
    var csrfParam = $('meta[name="csrf-param"]').attr("content");
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    //ajax загрузка модального окна создания турниров
    $('.js-tournament_create').click(function () {
        $.ajax({
            url: 'tournament/default/create',
            type: 'POST',
            data: {csrfParam: csrfToken},
            dataType: "html",
            success: function (data) {
                $('.js-tournament-open').after(data);
                $('#tournamentCreate').modal('show');
                $('#tournamentCreate').on('hidden.bs.modal', function () {
                    $('#tournamentCreate').remove();
                })
            }
        });
    });
    //ajax загрузка модального добавление команд в турниры
    $('.js-command_insert').click(function () {
        $.ajax({
            url: 'tournament/default/command-insert',
            type: 'POST',
            data: {csrfParam: csrfToken, idTournament:$(this).data('id_tournament')},
            dataType: "html",
            success: function (data, xhr) { console.log($(this));
                $('.js-tournament-open').after(data);
                $('#commandInsert').modal('show');
                $('#commandInsert').on('hidden.bs.modal', function () {
                    $('#commandInsert').remove();
                });
            }
        });
    });
});