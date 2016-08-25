$(document).ready(function() {
    $(this).on('click.ajax', '.ajax', function(){
        var item = $(this);
        item.attr('disabled', true);
        $.ajax({
            url: item.attr('href'),
            type: 'post',
            data: item.data()
        }).done(function(data) {
            if (data.html) {
                item.html(data.html);
            }
            if (data.class) {
                item.attr('class', data.class);
            }
        }).always(function() {
            item.attr('disabled', false);
        });

        return false;
    });
});