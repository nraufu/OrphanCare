<?php
function fetch_children()
{
    $con = mysqli_connect("localhost", "root", "Bit*2019", "orphandb");
    $output = '';
    $query = "SELECT * FROM orphans";
    $result = mysqli_query($con, $query);
    $i =1;
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
    <tr>
        <td>'.$i.'</td>
        <td>' . $row["name"]. '</td>
        <td>' . $row['address'] . '</td>
        <td>' . $row['age'] . '</td>
        <td>' . $row['gender'] . '</td>
        <td>' . $row['date_of_birth'] . '</td>
    </tr>';
    $i++;
    }
    return $output;
}

if (isset($_POST["create_pdf"])) {
    require_once("tcpdf/tcpdf.php");
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Alleluya Orphancare');
    $pdf->SetTitle('Report');
    $pdf->SetSubject('A');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guNo.e');

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language dependent data:
    $lg = array();
    $l['a_meta_charset'] = 'UTF-8';
    $l['a_meta_dir'] = 'ltr';
    $l['a_meta_language'] = 'en';
    $lg['w_page'] = 'page';

    // set some language-dependent strings (optional)
    $pdf->setLanguageArray($lg);

    // ---------------------------------------------------------

    // set font
    $pdf->SetFont('helvetica', '', 12);

    // add a page
    $pdf->AddPage();

    // report content
    $content = '';

    $content .= '<h3 class="text-center">List of Children</h3>
<div class="table-responsive">
    <table class="table table-bordered" border="1" cellspacing="0" cellpadding="1">
        <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Date Of Birth</th>
                </tr>';
    $content .= fetch_children();

    $content .= '</table>
</div>
';

    $pdf->WriteHTML($content, true, 0, true, 0);



    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('OrphanList_report.pdf', 'I');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $pagetitle = "Download Report";
    include('./include/libraries.php');
    ?>
</head>

<body>
    <div class="container p-5">
        <h1 class="text-info text-center mb-5">List of Children</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Date Of Birth</th>
                </tr>
                <?php 
                echo fetch_children();
                ?>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="post">

                    <input type="submit" name="create_pdf" class="btn btn-primary" value="Download PDF" />
                </form>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-info " href="./orphan_det.php?mode=show">Return Back</a>
            </div>
        </div>
    </div>





    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>