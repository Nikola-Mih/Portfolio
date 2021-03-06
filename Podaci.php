<?php
 if($_POST){
    require('C:\xampp\fpdf\fpdf.php');
    $ime = $_POST['ime'];
    $email = $_POST['email'];
    $tema = $_POST['tema'];
    $poruka = $_POST['poruka'];
    $title = 'Vaši Podaci';

    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->SetTitle($title);
    // izabrani font
    $pdf->SetFont('Arial','B',10);
    // sirina titla i pozicija
    $w = $pdf->GetStringWidth($title)+6;
    $pdf->SetX((210-$w)/2);
    // boje bordera,bga i teksta
    $pdf->SetDrawColor(255, 0, 15,1);
    $pdf->SetFillColor(39,37,31,1);
    $pdf->SetTextColor(255, 0, 15,1);
    // Debljina frame-a(1 mm)
    $pdf->SetLineWidth(1);
    // Title
    // Celija tabele(width, height, content, border, nextline parametters, alignement[c - center], fill)
    $pdf->Cell($w, 9, $title, 1, 1, 'C', true);
    // break linija
    $pdf->Ln(10);

    $pdf->SetTextColor(0,0,0,1);
    $w = $pdf->GetStringWidth($tema)+6;
    $pdf->SetX((55-$w)/2);
    $pdf->Cell(15, 20, 'Ime:', 1, 0, 'C');
    $pdf->Cell(145, 20, $ime, 1, 1, 'C');

    $pdf->SetX((55-$w)/2);
    $pdf->Cell(15, 20, 'Prezime:', 1, 0, 'C');
    $pdf->Cell(145, 20, $email, 1, 1, 'C');

    $pdf->SetX((55-$w)/2);
    $pdf->Cell(15, 20, 'Telefon:', 1, 0, 'C');
    $pdf->Cell(145, 20, $tema, 1, 1, 'C');




    
    $pdf->SetX((55-$w)/2);
    $pdf->Cell(15, 60, 'Adresa:', 1, 0, 'C');
    $pdf->MultiCell(145, 60, $poruka, 1, 1 , 0 );
    $file = basename("test");
     
    $pdf->Output();

//MAILER KRECE OVDE
        


// ucitavanje composera
require 'C:\xampp\Composer\vendor\autoload.php';



// instanciranje mejlera
$mail = new PHPMailer(true);



try {
    //Server podesavanja
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP(); //koriscenje smtp servera                                            
    $mail->Host       = 'smtp.mailtrap.io';                    // Salje se preko mailtrapa
    $mail->SMTPAuth   = true;                                   // SMTP autentikacija
    $mail->Username   = 'e5b98251abbec1';                     // SMTP username
    $mail->Password   = '3ba7b76c73bb15';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // TLS enkripcija 
    $mail->Port       = 587;                                    // TCP  port koji koristim 

    //ko salje i ko prima
    
    $mail->addAddress('nikolamih182@gmail.com', 'Nikola');     
    $mail->addAddress('ellen@example.com');               
    
    

    

    
    $mail->isHTML(true);                                  
    $mail->Subject = $tema . $email;
    $mail->Body    = $poruka;
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}


?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt Forma</title>
    <!-- Link za css kontakt forme-->
    <link rel="stylesheet" type="text/css" href="Kontaktforma.css">
    <!-- Link za font koji je koriscen i na main stranici-->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Mono&display=swap" rel="stylesheet">
   
</head>
<body>
    
     <div class="container" align="center" id="kontejner">
        <form action="kontaktv2.php" method="POST" class="form">
            <div class="form-group">

                <h1>Molimo Vas unesite vaše podatke</h1>

                <label for="name" class="form-label">Vaše Ime:</label><br><br>
                <input type="text" class="form-control" id="ime" name="ime" placeholder="Vaše Ime Ovde" tabindex="1" required><br><br>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Vaše Prezime:</label><br><br>
                <input type="email" class="form-control" id="email" name="email" placeholder="Vaše Prezime.." tabindex="2" required><br><br>
            </div>
            <div class="form-group">
                <label for="subject" class="form-label">Telefon:</label><br><br>
                <input type="text" class="form-control" id="tema" name="tema" placeholder="Vaš Telefon.." tabindex="3" required><br><br>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Adresa:</label><br><br>
                <textarea class="form-control" rows="5" cols="50" id="poruka" name="poruka" placeholder="Vaša adresa ovde.." tabindex="4"></textarea><br><br>
            </div>
            <div>
                <button type="submit" class="btn">Poruči</button><br><br>
            </div>
        </form>
    </div>





</body>
</html>