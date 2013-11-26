$(document).ready(function(){
  jQuery(function(){
            jQuery("#etiketa").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
          	jQuery("#iznos").validate({
                expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
                message: "Unos mora biti broj!"
                });
             jQuery("#datepicker").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
            jQuery("#komentar").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
           jQuery("#category").validate({
                    expression: "if (VAL != '0') return true; else return false;",
                    message: "Please make a selection"
                });
            jQuery("#type").validate({
                expression: "if (VAL != '0') return true; else return false;",
                message: "Please make a selection"
            });
            jQuery("#email_reg").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
            jQuery("#ime").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
            jQuery("#prezime").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
            jQuery("#zaporka_reg").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
            jQuery("#zaporka_ponovo").validate({
                expression: "if (VAL) return true; else return false;",
                message: "Ovo polje je obavezno!"
            });
        });
});


