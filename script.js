$(document).ready(function () {
    loadEntries();

    $('#guestbookForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: $(this).serialize(),
            success: function () {
                loadEntries();
                $('#guestbookForm')[0].reset();
            }
        });
    });

    function loadEntries() {
        $.ajax({
            type: 'GET',
            url: 'get_entries.php',
            success: function (data) {
                $('#entriesList').html(data);
            }
        });
    }

    window.applyFilters = function() {
        var search = $('#search').val();
        var sortColumn = $('#sortColumn').val();
        var sortOrder = $('#sortOrder').val();

        $.ajax({
            type: 'GET',
            url: 'get_entries.php',
            data: { search: search, sortColumn: sortColumn, sortOrder: sortOrder },
            success: function (data) {
                $('#entriesList').html(data);
            }
        });
    }
});
