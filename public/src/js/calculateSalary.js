$(document).ready(function () {
    console.log("ready!");
    $('#fromDatePicker').datepicker({
        format: 'yyyy/mm/dd'
    });

    $('#toDatePicker').datepicker({
        format: 'yyyy/mm/dd'
    });
});