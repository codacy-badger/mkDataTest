$(document).ready(function() {
    $('.select2').select2();

    var orderedGroups = $('#group option').sort(function (a, b) {
        return a.text < b.text ? -1 : 1;
    });
    $('#group').html(orderedGroups);

    $('#type').change(function() {
        if($('#type option:selected').val() === "1") {
            $('#rgContainer').css('display', 'flex');
            $('#rg').attr('required', true);

            $('#ieContainer').css('display', 'none');
            $('#ie').attr('required', false).val('');

            $('#cpfContainer').css('display', 'flex');
            $('#cpf').attr('required', true);

            $('#cnpjContainer').css('display', 'none');
            $('#cnpj').attr('required', false).val('');
        } else {
            $('#rgContainer').css('display', 'none');
            $('#rg').attr('required', false).val('');

            $('#ieContainer').css('display', 'flex');
            $('#ie').attr('required', true);

            $('#cpfContainer').css('display', 'none');
            $('#cpf').attr('required', false).val('');

            $('#cnpjContainer').css('display', 'flex');
            $('#cnpj').attr('required', true);
        }
    });

    var max_fields = 10;
    var wrapper = $(".phone_container");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('' +
                '<div style="display: flex; margin-top: 1em;">' +
                    '<input type="text" class="phone col-md-9 form-control" name="phone[]"/>' +
                    '<button type="button" href="javascript:void(0);" class="delete text-center ml-4 p-0 col-md-2 btn btn-danger"><i class="fas fa-trash"></i></button>' +
                '</div>'); //add input box

            $('.phone').mask('(00) 00000-0000', {reverse: false});
        } else {
            alert('Você chegou no limite de adições!')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });


    $('#cpf').mask('000.000.000-00', {reverse: false});
    $('#rg').mask('00.000.000-0', {reverse: false});
    $('#cnpj').mask('00.000.000/0000-00', {reverse: false});
    $('.phone').mask('(00) 00000-0000', {reverse: false});
});