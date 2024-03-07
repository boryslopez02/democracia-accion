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

    $('#alcance').on('change', function (e) {
        setAlcanceFields($(this).val());
    });

    const setAlcanceFields = (val) => {
        $('#seccional').prop('disabled', false).trigger('change');
        $('#municipio').prop('disabled', false).trigger('change');
        $('#parroquia').prop('disabled', false).trigger('change');

        if (val == "nacional") {

            $('#seccional').parent().addClass('d-none');
            $('#municipio').parent().addClass('d-none');
            $('#parroquia').parent().addClass('d-none');
            $('#seccional').prop('disabled', true).trigger('change');
            $('#municipio').prop('disabled', true).trigger('change');
            $('#parroquia').prop('disabled', true).trigger('change');

        } else if (val == "seccional") {

            $('#seccional').parent().removeClass('d-none');
            $('#municipio').parent().addClass('d-none');
            $('#parroquia').parent().addClass('d-none');
            $('#municipio').prop('disabled', true).trigger('change');
            $('#parroquia').prop('disabled', true).trigger('change');

        } else if (val == "municipal") {

            $('#seccional').parent().removeClass('d-none');
            $('#municipio').parent().removeClass('d-none');
            $('#parroquia').parent().addClass('d-none');
            $('#parroquia').prop('disabled', true).trigger('change');

        } else if (val == "parroquial") {

            $('#seccional').parent().removeClass('d-none');
            $('#municipio').parent().removeClass('d-none');
            $('#parroquia').parent().removeClass('d-none');

        }
    }

    let optionDefault = new Option("Seleccionar", null, false, false);

    $('#seccional').on('change', function() {
        const seccionalId = $(this).val();
        const municipiosFilter = municipios.filter(municipio => municipio.seccional_id == seccionalId);

        selectMunicipio.empty();
        selectMunicipio.append(optionDefault);

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
        selectParroquia.append(optionDefault);

        parroquiasFilter.forEach(parroquia => {
            let option = new Option(parroquia.nombre, parroquia.id, false, false);
            selectParroquia.append(option);
        });
        selectParroquia.trigger('change');
    });

    $('#tipo_cargo').on('change', function (e) {
        console.log($(this).val())
        if ($(this).val() == 5) {

            $('#cargo').parent().removeClass('d-none');
            $('#cargo').prop('disabled', false).trigger('change');
            $('#buro').parent().removeClass('d-none');
            $('#buro').prop('disabled', false).trigger('change');

        } else {

            $('#cargo').parent().addClass('d-none');
            $('#cargo').prop('disabled', true).trigger('change');
            $('#buro').parent().addClass('d-none');
            $('#buro').prop('disabled', true).trigger('change');

        }
    });

    const selectBuro = $('#buro');
    const opcionesBuro = JSON.parse(window.opcionesBuro);
    const opcionesBuroSecFemenina = JSON.parse(window.opcionesBuroSecFemenina);
    const opcionesBuroSecCultura = JSON.parse(window.opcionesBuroSecCultura);

    $('#cargo').on('change', function (e) {
        selectBuro.empty();
        selectBuro.append(optionDefault);

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
