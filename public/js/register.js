$(document).ready(function() {
    $('.select2').select2();

    var orderedGroups = $('#group option').sort(function (a, b) {
        return a.text < b.text ? -1 : 1;
    });
    $('#group').html(orderedGroups);

    $('#type').change(function() {
        if($('#type option:selected').val() === "1") {
            $('#rgContainer').css('display', 'flex');
            $('#ieContainer').css('display', 'none');
            $('#cpfContainer').css('display', 'flex');
            $('#cnpjContainer').css('display', 'none');
        } else {
            $('#rgContainer').css('display', 'none');
            $('#ieContainer').css('display', 'flex');
            $('#cpfContainer').css('display', 'none');
            $('#cnpjContainer').css('display', 'flex');
        }

    });
});