(function ($) {
    $('#categoria-productos').change(function() {
        $.ajax({
            url: pg.ajaxurl,
            method: 'POST',
            data: {
                action: 'pgFiltroProductos',
                categoria: $(this).find(':selected').val()
            },
            beforeSend: function() {
                $('#resultados-productos').html('Cargando...')
            },
            success: function(data) {
                let html = ""
                data.forEach((item) => {
                    html += `
                        <figure>${item.image}</figure>
                        <a href="${item.link}">${item.titulo}</a>
                    `
                })

                $('#resultados-productos').html(html)
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
})(jQuery)