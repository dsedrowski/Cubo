<?php

$success = "";

if (isset($_POST['submit']))
{
    if(empty($_POST['name'])      ||
       empty($_POST['email'])     ||
       empty($_POST['phone'])     ||
       empty($_POST['message'])   ||
       !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        echo "Proszę podać wartości";
    }
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));
    $message = strip_tags(htmlspecialchars($_POST['message']));

    $to = 'damian.sedrowski@gmail.pl';
    $email_subject = "CUBO Formularz kontaktowy:  $name";
    $email_body = "Masz nową wiadomość z Twojej strony.\n\n"."Oto szczegóły:\n\nImię: $name\n\nEmail: $email_address\n\nTelefon: $phone\n\nWiadomość:\n$message";
    $headers = "From: noreply@cubo.biz.pl\n";
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);

    echo "cos";

    $success = "Wiadomość została wysłana!";
}
?>


<div class="container" id="content">    
    <div class="row">
        <div class="col-md-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2333.9632378720994!2d16.159350215322878!3d54.198434980166404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4701cd372890dbc5%3A0x1a91de3ddd51320c!2sLniana+5%2C+Koszalin!5e0!3m2!1spl!2spl!4v1496351914924" width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen></iframe>
        </div>
        <div class="col-md-4">
            <h3>Kontakt</h3>
            <p style="font-size: 15px;">
                <span class="color-page">CUBO</span> Agnieszka Sobkowiak, Monika Lange s.c <br />
                Lniana 5 <br />
                75-231 Koszalin<br />
                NIP: 669-253-52-22<br />
                REGON: 366-97-66-48
            </p>
            <p style="font-size: 15px;">
                <i class="fa fa-phone"></i>(94) 721 41 31
                <br />
                <i class="fa fa-phone" style="opacity: 0;"></i>793 726 764
                <br />
                <i class="fa fa-phone" style="opacity: 0;"></i>605 267 149
                <br />
            </p>
            <p style="font-size: 15px;">
                <i class="fa fa-envelope-o"></i>
                <a href="mailto:biuro@cubo.biz.pl">biuro@cubo.biz.pl</a>
            </p>
            <p style="font-size: 15px;">
                <i class="fa fa-clock-o"></i>Pon - Pt: 8.00-18.00
                <br />
                <i class="fa fa-clock-o" style="opacity: 0;"></i>Sob: 9.00-13.00
                <br />
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3>Wyślij nam wiadomość</h3>
            <form name="sentMessage" id="contactForm" action="" method="post" novalidate>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Imię:</label>
                        <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Proszę podać swoje imię">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Numer telefonu:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required data-validation-required-message="Proszę podać numer telefonu">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Adres email:</label>
                        <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Proszę podac adres email">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Wiadomość:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Proszę wpisać wiadomość" maxlength="999" style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"> <?php echo $success; ?></div>
                <input type="hidden" name="submit" value="TRUE" />
                <button type="submit" class="btn btn-primary btn-green">Wyślij</button>
            </form>
        </div>
    </div>
    <hr>
</div>