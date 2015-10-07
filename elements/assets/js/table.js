jQuery(function($) {
    $(".dndee-table").click(function() {
        var rows = prompt('Введите количество столбцов', '2');
        if (rows != null && $.isNumeric(rows) && rows > 0) {
            $('.main-area').html('<table><tr><td class="dndee-table-td"></td><td class="dndee-table-td"></td></tr></table>');
        }
    });
});
