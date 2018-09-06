/**
 меню
 */
$(document).ready(function()
{

    $("#layout_ResponsiveMenu1 ul li a").click(function(event)
    {
        $("#layout_ResponsiveMenu1 input").prop("checked", false);
    });



});

/**
 плавное открытие меню
 */
$(document).ready(function(){

    $( "#ResponsiveMenu1-title" ).click(function(e) {
        e.preventDefault();
        $(".ResponsiveMenu1").slideToggle(400);



        $(this).toggleClass('m_close ');//добавляемм класс закрытия меню
        $('#ResponsiveMenu1-icon').toggle();//Перекллючам иконку меню
    });



});

/**
Окно авторизации
 */
function showAuth(auth){
    $('#auth .modal-body').html(auth);
    $('#auth').modal();
}



$('.auth').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url: '/site/login',
        data: {},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showAuth(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});
