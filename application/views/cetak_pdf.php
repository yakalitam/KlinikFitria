 <?php
 $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'NOTA PERAWATAN KLINIK FITRIA',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,7,'Jl. Metro Kota No 130, Metro, Lampung',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
       
        $pdf->SetFont('Arial','',10);
    
        $pdf->Cell(0,7,'No Rawat            : '.$rawat['idrawat'],0,1,'L');
        $pdf->Cell(0,7,'Tanggal Rawat   : '.$rawat['tglrawat'],0,1,'L');
        $pdf->Cell(0,7,'No RM                : '.$rawat['idpasien'],0,1,'L');
        $pdf->Cell(0,7,'Nama Pasien     : '.$rawat['nama'],0,1,'L');

        $pdf->Cell(10,7,'',0,1);
     

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,12,'DAFTAR TINDAKAN PASIEN',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,15,'TANGGAL RAWAT',1,0,'C');
        $pdf->Cell(45,15,'TINDAKAN',1,0,'C');
        $pdf->Cell(45,15,'DOKTER',1,0,'C');
        $pdf->Cell(45,15,'BIAYA',1,1,'C');
      

        $pdf->SetFont('Arial','',10);
       
            $pdf->Cell(45,15,$rawat['tglrawat'],1,0,'C');
            $pdf->Cell(45,15,'',1,0,'C');
            $pdf->Cell(45,15,'',1,0,'C');
            $pdf->Cell(45,15,$rawattindakan['totaltindakan'],1,1,'C');
        

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,12,'DAFTAR OBAT PASIEN',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,15,'TANGGAL',1,0,'C');
        $pdf->Cell(45,15,'KODE',1,0,'C');
        $pdf->Cell(45,15,'JUMLAH',1,0,'C');
        $pdf->Cell(45,15,'HARGA',1,1,'C');
      

        $pdf->SetFont('Arial','',10);
            $pdf->Cell(45,15,$rawat['tglrawat'],1,0,'C');
            $pdf->Cell(45,15,$rawatobat['idobat'],1,0,'C');
            $pdf->Cell(45,15,$rawatobat['jumlah'],1,0,'C');
            $pdf->Cell(45,15,$rawatobat['totalobat'],1,1,'C');
        
      
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,12,'* Biaya Pengeluaran',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,7,"Total Tindakan (Rp)      :  ".number_format($rawattindakan['totaltindakan'], 0, ".", "."),0,1,'L');
        $pdf->Cell(0,7,"Total Obat (Rp)             :  ".number_format($rawatobat['totalobat'], 0, ".", "."),0,1,'L');
        $pdf->Cell(0,7,"Total Harga (Rp)       :  ".number_format($rawat['totalharga'], 0, ".", "."),0,1,'L');
        $pdf->Cell(0,7,"Uang Muka (Rp)       :  ".number_format($rawat['uangmuka'], 0, ".", "."),0,1,'L');
        $pdf->Cell(0,7,"Kekurangan (Rp)      :  ".number_format($rawat['kurang'], 0, ".", "."),0,1,'L');
        $pdf->Cell(10,7,'',0,1);
          

        $pdf->Cell(10,20,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,12,'***TERIMA KASIH***',0,1,'C');
        $pdf->Cell(10,1,'',0,1);
  
        $pdf->Output();

?>