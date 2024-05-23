<script>
    function copiar() {
        var name = $('#nameb').val();
        var address1 = $('#address1').val();
        var address2 = $('#address2').val();
        var id_country = $('#id_country').val();
        var id_state = $('#id_state').val();
        var id_city = $('#id_city').val();
        var pincode = $('#pincode').val();

        $('#names').val(name);
        $('#address1s').val(address1);
        $('#address2s').val(address2);
        $('#id_countrys').val(id_country).trigger('change.select2');
        $('#id_states').val(id_state).trigger('change.select2');
        $('#id_citys').val(id_city).trigger('change.select2');
        $('#pincodes').val(pincode);
    }
</script>
