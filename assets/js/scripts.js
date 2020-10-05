$(document).on('submit', '#guardar', function(e)
{
    e.preventDefault();

    $.ajax({
        method: 'post',
        url: this.action,
        data:$(this).serialize(),
        //dataType: 'json',
        success: function(datos)
        {
            console.log(datos);
            if(datos['error']){
                //alert(data['mensaje']);
                alert(datos.error);
            } else {
                //$(this).reset(); //IS NOT A FUNCTION
                console.log('SUCCESS')
            }
        },
        error: function(err) {
            alert('ALGO VA MAL');
        }
    });

    
});