<?php
    require_once('tcpdf/tcpdf.php');
    // create new PDF document
    $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('MPS BULACAN');
    $pdf->SetTitle('MPS BULACAN | OFFICIAL REPORT');
    // $pdf->SetSubject('');
    // $pdf->SetKeywords('');
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont('helvetica');
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->AddPage();
    $html = '
            <h3 style="margin-top: 30px;">MPS BULACAN | OFFICIAL REPORT</h3>
            <hr>
            <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>lbs</th>
                                <th>individual</th>
                            </tr>
                            <tr><th></th></tr>
                        </thead>
                    <tbody>';
                            include 'database2.php';
                                
                            if(isset($_POST['id'])){
                                $id = $_POST['id'];

                                foreach ($id as $key => $value) {  
                                    $sql = "select * from reservations where id = {$value} ";
                                    $result = $conn->query($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $html .='<tr>
                                            <td>'.$row['id'].'</td>
                                            <td>'.$row['name'].'</td>
                                            <td>'.$row['service'].'</td>
                                            <td>'.$row['date_reserved'].'</td>
                                            <td>'.$row['time_reserved'].'</td>
                                            <td>'.$row['lbs'].'</td>
                                            <td>'.$row['individual'].'</td>
                                        </tr>';
                                    }
                                }
                            }
                            else{
                                $print_data=mysqli_query($conn, "select * from reservations");
                                while ($row = mysqli_fetch_array($print_data)) {
                                        # code...
                                    $html .='<tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['service'].'</td>
                                    <td>'.$row['date_reserved'].'</td>
                                    <td>'.$row['time_reserved'].'</td>
                                    <td>'.$row['lbs'].'</td>
                                    <td>'.$row['individual'].'</td>
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
    $pdf->Output('samplereport.pdf', 'I');
?>