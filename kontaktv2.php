<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




require 'C:\xampp\Composer\vendor\autoload.php';



/* Exception class. */
require 'C:\xampp\Composer\vendor\phpmailer\phpmailer\src\Exception.php';

/* The main PHPMailer class. */
require 'C:\xampp\Composer\vendor\phpmailer\phpmailer\src\PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'C:\xampp\Composer\vendor\phpmailer\phpmailer\src\SMTP.php';

require 'C:\xampp\Composer\vendor\phpmailer\phpmailer\src\OAuth.php';

require 'C:\xampp\Composer\vendor\phpmailer\phpmailer\src\POP3.php';

require 'C:\xampp\htdocs\ProjekatNikolaMihajlovic1216\Kontaktforma.php';

$email = new PHPMailer(TRUE);


//uzimanje vrednosti sa forme

if($_POST){
    require('C:\xampp\fpdf\fpdf.php');
    $ime = $_POST['ime'];
    $email = $_POST['email'];
    $tema = $_POST['tema'];
    $poruka = $_POST['poruka'];
    $title = 'User Reportttttt';

    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->SetTitle($title);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $pdf->GetStringWidth($title)+6;
    $pdf->SetX((210-$w)/2);
    // Colors of frame, background and text
    $pdf->SetDrawColor(221,221,221,1);
    $pdf->SetFillColor(10,158,0,1);
    $pdf->SetTextColor(255,255,255,1);
    // Thickness of frame (1 mm)
    $pdf->SetLineWidth(1);
    // Title
    // Cell(width, height, content, border, nextline parametters, alignement[c - center], fill)
    $pdf->Cell($w, 9, $title, 1, 1, 'C', true);
    // Line break
    $pdf->Ln(10);

    $pdf->SetTextColor(0,0,0,1);
    $w = $pdf->GetStringWidth($tema)+6;
    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Ime:', 1, 0, 'C');
    $pdf->Cell($w, 10, $ime, 1, 1, 'C');

    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Email:', 1, 0, 'C');
    $pdf->Cell($w, 10, $email, 1, 1, 'C');

    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Tema:', 1, 0, 'C');
    $pdf->Cell($w, 10, $tema, 1, 1, 'C');





    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Poruka:', 1, 0, 'C');
    $pdf->Cell($w, 10, $poruka, 1, 1, 'C');
    $pdf->Output();
}


/*$data = '';

$data .= '<h1>Vasi detalji</h1>';

$data .= '<strong>Ime</strong>' . $ime . '<br>';
$data .= '<strong>Email</strong>' . $email . '<br>';
$data .= '<strong>Tema</strong>' . $tema . '<br>';


//ukoliko ima poruke salje se

if($poruka)
{
	$data .= '<br> <strong>Poruka</strong><br>' . $message;
}


$fpdf -> WriteHTML($data);


$pdf = $fpdf->Output('' , 'S');


$maildata = [

	'Ime' => $ime,
	'Email' => $email,
	'Tema' => $tema,
	'Poruka' => $poruka


];

saljimail($pdf , $maildata);





function saljimail($pdf , $maildata)
{

 $emailporuka = '';

 $emailporuka .= '<h1> Poruka od </h1>' . $maildata['Ime'];

 foreach($maildata  -> $data)
 {

 	$emailporuka .= '<strong>' . $maildata . '</strong> :' . $data . '<br/>';


 }






$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'e5b98251abbec1';                     // SMTP username
    $mail->Password   = '3ba7b76c73bb15';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('nikolamih182@gmail.com', 'Test');
    
    $mail->addAddress('ellen@example.com');   //aaaaaaaaaaaaaaaaaa
    
//ovde se kaci PDF
    $mail->addStringAttachment($pdf , 'myattachment.pdf');
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Poruka od ' . $emailporuka['Ime'];
    $mail->Body    = $emailporuka;
    $mail->AltBody = strip_tags($emailporuka);

    $mail->send();

    header('Location:hvalav2.php?Ime=' . $emailporuka['Ime']);


    echo 'Poruka poslata!';
} catch (Exception $e) {
    echo "Mailer ne radi, Pogresio si: {$mail->ErrorInfo}";
}





}
*/

?>