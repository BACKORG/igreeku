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

var get_school_chapter = function(event){
    var school_id = $(event.target).val();

    var data = {
        school_id : school_id
    }

    $.ajax({
        type : 'post',
        data : data,
        url : '/site/chapter'
    }).done(function(res){
        $('.user-chapter-drop').html(res)
    })
}