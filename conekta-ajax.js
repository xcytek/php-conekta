/*---------------------------------------------------------------------------
                            ONLINE PAYMENTS WITH CONEKTA INC.
---------------------------------------------------------------------------*/
 
function send_payment_card(){           

    var dataString = {
        'amount': $("#amount_card").val(),
        'name' : $("#name_card").val(),
        'number' : $("#number_card").val(),
        'cvc' : $("#exp_month_card").val(),
        'exp_month' : $("#exp_month_card").val(),
        'exp_year' : $("#exp_year_card").val()
    };
 
    $.ajax({
        type: "POST",
        url: "conekta_card.php",
        data: dataString,
        success: function(resp) {           
            $('#card').html(resp);
        }
    });  
}
 
function send_payment_oxxo(){	

    var dataString = {
        'amount' : $("#amount_oxxo").val(),
        'email' : $("#email_oxxo").val()
    };

    $.ajax({
        type: "POST",
        url: "conekta_oxxo.php",
        data: dataString,
        success: function(resp) {                               
            window.open('report.php?'+resp, '_blank');          
            $('#oxxo').html('Thanks for your donation');
        }
    }); 
}
 
function send_payment_bank(){

    var dataString = {
        'amount' : $("#amount_bank").val(),
        'name' : $("#name_bank").val(),
        'email' : $("#email_bank").val(),
        'phone' : $("#phone_bank").val(),
        'bank' : $("#bank_bank").val()
    };              
     
    $.ajax({
        type: "POST",
        url: "conekta_bank.php",
        data: dataString,
        success: function(resp) {
            window.open('report.php?'+resp, '_blank');
            $('#bank').html('Thanks for your donation');
        }
    });      
}