<footer class="main-footer">
    <div class="main-footer-content container">
        <div>
            <p>&copy; Rent a Car 2021. All rights reserved.</p>
        </div>
        <div class="social-media">
            <div>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </div>
            <div>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- </body> -->
<script src="jquery-3.6.0.js"></script>
<script src="jquery.validate.min.js"></script>
<script>
     $().ready(function() {
        $("#login").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                fjalekalimi: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                email: {
                    required: "Please provide an email",
                    email: "Please enter a valid email address"
                }
            }

        });
        $("#perdoruesit").validate({
            rules: {
                emri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                mbiemri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                telefoni: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 5
                },
                nrpersonal: {
                    required: true,
                    minlength: 10
                },
                komuna: {
                    minlength: 4
                }
            },
            messages: {
                emri: {
                    required: "Ju lutem shenoni emrin",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Emri nuk duhet te kete numra "
                },
                mbiemri: {
                    required: "Ju lutem shenoni mbiemrin",
                    minlength: "Mbiemri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Mbiemri nuk duhet te kete numra "
                },
                telefoni: {
                    required: "Ju lutem shenoni telefonin"
                },
                email: {
                    required: "Ju lutem shenoni emailin",
                    email: "Ju lutem shenoni emaili adres valide"
                },
                fjalekalimi: {
                    required: "Ju lutem shenoni fjalekalimin",
                    minlength: "Fjalekalimi i juaj duhet te kete se paku gjashte karaktere"
                },
                nrpersonal:{
                    required: "Ju lutem shenoni numrin personal",
                    minlength: "Numri personal i juaj duhet te kete se paku dhjete karaktere"
                },
                komuna: {
                    minlength: "Komuna duhet te kete se paku kater karaktere"
                }

            }
        });   
        $("#rezervimet").validate({
            rules: {
                automjeti: {
                    required: true
                },
                klienti: {
                    required: true
                },
                datamarrjes: {
                    required: true,
                    date: true,

                },
                datakthimit: {
                    required: true,
                    date: true,
                }
            },
            messages: {
                automjeti: {
                    required: "Ju lutem zgjedhni automjetin"
                },
                klienti: {
                    required: "Ju lutem zgjedhni klientin"
                },
                datamarrjes: {
                    required: "Ju lutem zgjedhni nje date"
                },
                datakthimit: {
                    required: "Ju lutem zgjedhni nje date"
                }

            }
        });  
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");
    });
    $('#dalja').click(function(){
        $.ajax({
            url: './inc/functions.php?argument=dalja',
            success: function(data) {
                window.location.href = data;
            }
        });
    });
    $('#mesazhi').fadeOut(8000,function(){
        $.ajax({
            url: './inc/functions.php?argument=mesazhi'
        });
    });
</script>
</html>
