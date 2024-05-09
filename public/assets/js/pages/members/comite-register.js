$(document).ready(function () {
    let municipios = [], parroquias = [];
    $('#municipio').prop('disabled', true).trigger('change');
    $('#parroquia').prop('disabled', true).trigger('change');

    $.ajax({
        url: urlFetchScopeData,
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data);
            municipios = data.municipios;
            parroquias = data.parroquias;
            $('#municipio').prop('disabled', false).trigger('change');
            $('#parroquia').prop('disabled', false).trigger('change');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud: " + textStatus, errorThrown);
        }
    });

    const selectSeccional = $('#seccional');
    const selectMunicipio = $('#municipio');
    const selectParroquia = $('#parroquia');
    selectSeccional.trigger('change');
    selectMunicipio.trigger('change');

    $('.cargoPublicoCheck').on('change', function() {
        let idCol = $(this).attr('data-col');
        console.log(idCol, "id col")
        if ($(this).val() == "si") {
            $('#'+idCol).removeClass('d-none');
        } else {
            $('#'+idCol).addClass('d-none');
            $(`#${idCol} input`).val('');
        }
    });

    $('#seccional').on('change', function() {
        const seccionalId = $(this).val();
        const municipiosFilter = municipios.filter(municipio => municipio.seccional_id == seccionalId);

        selectMunicipio.empty();
        selectMunicipio.prepend('<option value="" selected>Seleccionar</option>');

        municipiosFilter.forEach(municipio => {
            let option = new Option(municipio.nombre, municipio.id, false, false);
            selectMunicipio.append(option);
        });
        selectMunicipio.trigger('change');
    });

    $('#municipio').on('change', function() {
        const municipioId = $(this).val();
        const parroquiasFilter = parroquias.filter(parroquia => parroquia.municipio_id == municipioId);

        selectParroquia.empty();
        selectParroquia.prepend('<option value="" selected>Seleccionar</option>');

        parroquiasFilter.forEach(parroquia => {
            let option = new Option(parroquia.nombre, parroquia.id, false, false);
            selectParroquia.append(option);
        });
        selectParroquia.trigger('change');
    });

    $('.tipo_cargo').on('change', function (e) {
        let idCol = $(this).attr('data-col');
        console.log(idCol, "id")
        if ($(this).val() == 5) {

            $('#'+idCol).parent().removeClass('d-none');
            $('#'+idCol).prop('disabled', false).trigger('change');
            $('#'+idCol+'buro').parent().removeClass('d-none');
            $('#'+idCol+'buro').prop('disabled', false).trigger('change');

        } else {

            $('#'+idCol).parent().addClass('d-none');
            $('#'+idCol).prop('disabled', true).trigger('change');
            $('#'+idCol+'buro').parent().addClass('d-none');
            $('#'+idCol+'buro').prop('disabled', true).trigger('change');

        }
    });

    const selectBuro = $('#buro');
    const opcionesBuro = JSON.parse(window.opcionesBuro);
    const opcionesBuroSecFemenina = JSON.parse(window.opcionesBuroSecFemenina);
    const opcionesBuroSecCultura = JSON.parse(window.opcionesBuroSecCultura);

    $('#cargo').on('change', function (e) {
        selectBuro.empty();
        selectBuro.prepend('<option value="" selected>Seleccionar</option>');

        if ($(this).val() == 4) { // ? SECRETARIA FEMENINA

            opcionesBuroSecFemenina.forEach(function(op, indice) {
                let option = new Option(op.value, op.key, false, false);
                selectBuro.append(option);
            });

            opcionesBuro.forEach(function(op, indice) {
                let option = new Option(op.value, op.key, false, false);
                selectBuro.append(option);
            });

            selectBuro.trigger('change');

        } else if ($(this).val() == 2) { // ? SECRETARIO CULTURA

            opcionesBuroSecCultura.forEach(function(op, indice) {
                let option = new Option(op.value, op.key, false, false);
                selectBuro.append(option);
            });

            opcionesBuro.forEach(function(op, indice) {
                let option = new Option(op.value, op.key, false, false);
                selectBuro.append(option);
            });

            selectBuro.trigger('change');

        }
    });

});
