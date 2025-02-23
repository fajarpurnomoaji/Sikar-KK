<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SKK | <?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Javascript scroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });

        // Get the button:
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    <style>
        @media screen and (min-width: 993px) {

            h1 {
                font-size: 20px;
            }

            .h6 {
                padding: 0% 10% 0% 10%;
            }

            img {
                width: 400px;
            }

            .btn-lg {
                font-size: 1.15rem;
            }

            .group-text {
                margin-top: 5%;
            }

            .group-text .h1 {
                font-size: 50px;
            }

        }

        @media screen and (max-width: 992px) and (min-width: 768px) {

            .h6 {
                padding: 0% 10% 0% 10%;
            }

            img {
                width: 400px;
            }

            .btn-lg {
                font-size: 1rem;
            }

            .group-text {
                margin-top: 5%;
            }

            .group-text .h1 {
                font-size: 35px;
            }

            .group-text .h5 {
                font-size: 20px;
            }

        }

        @media screen and (max-width: 767px) and (min-width: 541px) {

            .h6 {
                padding: 0% 10% 0% 10%;
            }

            img {
                width: 400px;
            }

            .btn-lg {
                font-size: 1.25rem;
            }

            .group-text {
                margin-top: 5%;
            }

            .group-text .h1 {
                font-size: 40px;
            }
        }

        @media screen and (max-width: 540px) {

            .h6 {
                padding: 0% 10% 0% 10%;
            }

            img {
                width: 400px;
            }

            .btn-lg {
                font-size: 1rem;
            }
        }
    </style>
</head>