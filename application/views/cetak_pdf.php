 <?php
 $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'NOTA PERAWATAN KLINIK FITRIA',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','I',12);
        $pdf->Cell(0,12,'* Rincian Perawatan',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(15,15,'ID',1,0,'C');
        $pdf->Cell(20,15,'ID Pasien',1,0,'C');
        $pdf->Cell(30,15,'Tanggal Rawat',1,0,'C');
        $pdf->Cell(30,15,'Total Tindakan',1,0,'C');
        $pdf->Cell(30,15,'Total Obat',1,1,'C');
      

        $pdf->SetFont('Arial','',10);
        $id = $_GET['id'];
        $data['rawat'] = $this->Rawat_model->get_single_row_rawat($id);
        foreach ($data as $row){
            $pdf->Cell(15,15,$row->idrawat,1,0,'C');
            $pdf->Cell(20,15,$row->idpasien,1,0,'C');
            $pdf->Cell(30,15,$row->tglrawat,1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->totaltindakan, 0, ".", "."),1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->totalobat, 0, ".", "."),1,1,'C');
        }
$pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','I',12);
        $pdf->Cell(0,12,'* Biaya Pengeluaran',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(20,15,'ID Pasien',1,0,'C');
        $pdf->Cell(30,15,'Total Harga',1,0,'C');
        $pdf->Cell(30,15,'Uang Muka',1,0,'C');
        $pdf->Cell(30,15,'Kekurangan',1,1,'C');

        $pdf->SetFont('Arial','',10);
           $id = $_GET['id'];
        $data['rawat'] = $this->Rawat_model->get_single_row_rawat($id);
        foreach ($data as $row){
            $pdf->Cell(20,15,$row->idpasien,1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->totalharga, 0, ".", "."),1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->uangmuka, 0, ".", "."),1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->kurang, 0, ".", "."),1,1,'C');

        }
        $pdf->Output();

?>