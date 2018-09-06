
$('#Button_job_choose').on('click', function(){
// выделить все чекбоксы
$("input[type=checkbox]").prop('checked', true);
});
$('#Button_job_clear').on('click', function(){
// отменить выделение всех чекбоксов
$("input[type=checkbox]").prop('checked', false);
// // или
// $("input[type=checkbox]").removeAttr('checked');
});


