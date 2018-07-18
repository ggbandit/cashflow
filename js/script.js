$(document).ready(function() {
    function isNotEmpty(caller) {
        if (caller.val() == '') {
            caller.css('border', '1px solid red');
            return false;
        } else {
            caller.css('border', '');
        }
        return true;
    }

    $("#btnSubmit").click(function() {
        var list = $('#list');
        var balance = $('#balance');
        var checked_radio = $('input:radio[name=inlineRadioOptions]:checked').val();

        if (isNotEmpty(list) && isNotEmpty(balance) && checked_radio == 'option1') {
            $.ajax({
                url: 'incomePost.php',
                method: 'POST',
                dataType: 'text',
                data: $('#add_new').serialize(),
                success: function(data) {
                    alert(data);
                    $('#add_new')[0].reset();
                }
            });
        } else if (isNotEmpty(list) && isNotEmpty(balance) && checked_radio == 'option2') {
            $.ajax({
                url: 'moneyoutPost.php',
                method: 'POST',
                dataType: 'text',
                data: $('#add_new').serialize(),
                success: function(data) {
                    alert(data);
                    $('#add_new')[0].reset();
                }
            });
        }
    });
});