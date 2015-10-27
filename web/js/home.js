var postMessage = function(event){
    var $obj = $(event.target),
        message = $obj.closest('.ms-1').find('textarea').val();

    var data = {
        message : message
    }


    $.ajax({
        type : 'post',
        data : data,
        url : '/post/save'
    }).done(function(res){
        $obj.closest('.ms-1').find('textarea').val('');
        $('.ms-1').after(res);
    })
}