
$( document ).ready(function() {
    getContent($('#code').val())
    $('#btn_modal').click(function () { 
        $('#modal_save').modal('show')
    });

    $('#save_servicio').click(function (e) { 
        e.preventDefault();
        tinyMCE.triggerSave(); 
        var data = new FormData();
        data.append("slug", $('#code').val());
        data.append("text", $('#text_servicio').val());
        $.ajax({
            type: "POST",
            url: "/servicios/update",
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.status){
                    $('#modal_save').modal('hide')
                    getContent($('#code').val())
                }else{
                    alert('oppp Error')
                }
            }
        });
    });
});
        function  getContent(slug){
            $.ajax({
                type: "GET",
                url: "/servicios/get/content/"+slug,
                success: function (response) {
                    $('#content_servicio').html(response.detalle)
                    var ed = tinyMCE.get('text_servicio');
                    ed.setProgressState(1); // Show progress
                    window.setTimeout(function() {
                        ed.setProgressState(0); // Hide progress
                        ed.setContent(response.detalle, {format: 'html'});
                    }, 1000);
                
                }
            });
        }
