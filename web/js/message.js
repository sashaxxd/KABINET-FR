// function Del(res){
//     $('#ajaxBusy').show('slow');
//     $('#fon').show();
//     setTimeout(function() {
//         $("#ajaxBusy").hide('slow');
//         $("#fon").hide();
//         $('#mess').html(res);
//         }, 2000);
//
// }


//Вывод в аяксе
function Del(res){
    $('#mess').html(res);
    $('.loading').show('slow');

    setTimeout(function() {
        $(".loading").hide('slow');

    }, 800);

}


$(document).ready(function() {

    // Setup the ajax indicator
    $('body').append('<div id="fon"></div><div class="loading">Loading&#8230;</div>');

    $('#fon').css({

        display: "none",
        backgroundColor: "#FFFFFF",
        height: "100%",
        // left: "0",
        right: "0",
        opacity: "0.50",
        position: "fixed",
        top: "0",
        width: "100%", /* Ширина максимальна */
        zIndex: "1000" /* Заведомо быть НАД другими элементами */
    });


    $('.loading').css({

        display:"none"

    });
});


function MessageDelete(i){

    var id = $(i).data('id');

    $.ajax({
        url: '/message/message-delete',
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            Del(res);
        },
        error: function(){
            alert('Error!');
        }
    });
}
