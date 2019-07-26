$(document).ready(function() {
    $('#table').DataTable({
        "scrollY": 300,
        "scrollX": true,
        "language": {
            "url": 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
        }
    });

    $('.alter_status').click(function() {
        $.ajax({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            type: 'POST',
            data: { user_id: $(this).data('user') },
            url: "/admin/users/alter-status",
            success: function(response){
                if(response.type === 'success') {
                    toastr.success(response.msg);

                    $("[data-user='" + response.user_id + "']").toggleClass('text-danger').toggleClass('text-success');

                    if(response.new_status === 0)
                        $("[data-id='" + response.user_id + "']").text('Inativo');
                    else
                        $("[data-id='" + response.user_id + "']").text('Ativo');
                } else {
                    toastr.error(response.msg);
                }
            },
            error: function(){
                alert("Algo deu errado! Procure o administrador do sistema!");
            }
        });
    });
});