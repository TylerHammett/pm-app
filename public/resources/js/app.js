jQuery('.icon').click(function () {

    if(jQuery(this).hasClass('fa-circle')){
        jQuery(this).removeClass('fa-circle');
        jQuery(this).addClass('fa-check-circle');
        jQuery(this).prev().addClass('complete text-muted');
    } else {
        jQuery(this).removeClass('fa-check-circle');
        jQuery(this).addClass('fa-circle');
        jQuery('.task-body').removeClass('complete text-muted');
    }
});

jQuery(".delete-icon").click(function(e){
    let url = $(this).attr('url');
    let taskId = $(this).attr('task-id');

    jQuery.ajax({
        type: 'DELETE',
        url: url,
        dataType: 'json',
        headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') }
    });

    $('#task' + taskId).addClass('hidden');
});

