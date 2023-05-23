<?php
    require_once('tcpdf/tcpdf.php');
    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('John Marverick R. Nicolas');
    $pdf->SetTitle('Haponesa Garden Resort Reservationo List');
    // $pdf->SetSubject('');
    // $pdf->SetKeywords('');
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->AddPage();
    $html = '
            <h3 style="margin-top: 30px;">Haponesa Garden Resort Users</h3>
            <hr>
            <table>
                        <thead>
                            <tr>
                                <th>Account Number</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Password</th>
                                <th>Creation Date</th>


                            </tr>
                            <tr><th></th></tr>
                        </thead>
                    <tbody>';
                            include 'dbconnection.php';
                                
                            if(isset($_POST['ids'])){
                                $id = $_POST['ids'];

                                foreach ($id as $key => $value) {  
                                    $sql = "select * from user where ID = {$value} ";
                                    $result = $conn2->query($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $html .='<tr>
                                        <td>'.$row['ID'].'</td>
                                        <td>'.$row['username'].'</td>
                                        <td>'.$row['email'].'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['password'].'</td>
                                        <td>'.$row['create_datetime'].'</td>
                                 
                                        </tr>';
                                    }
                                }
                            }
                            else{
                                $print_data=mysqli_query($conn2, "select * from user");
                                while ($row = mysqli_fetch_array($print_data)) {
                                        # code...
                                    $html .='<tr>
                                        <td>'.$row['ID'].'</td>
                                        <td>'.$row['username'].'</td>
                                        <td>'.$row['email'].'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>   '.$row['password'].'</td>
                                        <td>'.$row['create_datetime'].'</td>
                                

                                    </tr>';
                                }
                            }

                $html .='
                    </tbody>
                    </table>
';
    // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
    // $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->writeHTML($html);
    $pdf->Output('Haponesa_Garden_Resort_recordlists.pdf', 'I');
?>
