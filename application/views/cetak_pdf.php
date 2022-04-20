 <?php
 $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'NOTA PERAWATAN KLINIK FITRIA',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,7,'Jl. Metro Kota No 130, Metro, Lampung',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
       
        $pdf->SetFont('Arial','',10);
         $id = $_GET['id'];
        $data['rawat'] = $this->Rawat_model->get_single_row_rawat($id);
        foreach ($data as $row){
        $pdf->Cell(0,7,'No Rawat            : '.$row->idrawat,0,1,'L');
        $pdf->Cell(0,7,'Tanggal Rawat   : '.$row->tglrawat,0,1,'L');
        $pdf->Cell(0,7,'No RM                : '.$row->idpasien,0,1,'L');
        $pdf->Cell(0,7,'Nama Pasien     : '.$row->nama,0,1,'L');

        $pdf->Cell(10,7,'',0,1);
     }

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,12,'DAFTAR TINDAKAN PASIEN',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,15,'TANGGAL RAWAT',1,0,'C');
        $pdf->Cell(45,15,'TINDAKAN',1,0,'C');
        $pdf->Cell(45,15,'DOKTER',1,0,'C');
        $pdf->Cell(45,15,'BIAYA',1,1,'C');
      

        $pdf->SetFont('Arial','',10);
        foreach ($data as $row){
            $pdf->Cell(45,15,$row->tglrawat,1,0,'C');
            $pdf->Cell(45,15,'',1,0,'C');
            $pdf->Cell(45,15,'',1,0,'C');
            $pdf->Cell(45,15,'',1,1,'C');
        }

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,12,'DAFTAR OBAT PASIEN',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(36,15,'TANGGAL',1,0,'C');
        $pdf->Cell(30,15,'KODE',1,0,'C');
        $pdf->Cell(42,15,'NAMA OBAT',1,0,'C');
        $pdf->Cell(36,15,'JUMLAH',1,0,'C');
        $pdf->Cell(36,15,'HARGA',1,1,'C');
      

        $pdf->SetFont('Arial','',10);
        foreach ($data as $row){
            $pdf->Cell(36,15,$row->tglrawat,1,0,'C');
            $pdf->Cell(30,15,'',1,0,'C');
            $pdf->Cell(42,15,'',1,0,'C');
            $pdf->Cell(36,15,'',1,0,'C');
            $pdf->Cell(36,15,'',1,1,'C');
        }
      
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,12,'* Biaya Pengeluaran',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','',10);
        foreach ($data as $row){
        $pdf->Cell(0,7,"Total Tindakan (Rp)      :  ".number_format($row->totaltindakan, 0, ".", "."),0,1,'L');
        $pdf->Cell(0,7,"Total Obat (Rp)             :  ".number_format($row->totalobat, 0, ".", "."),0,1,'L');
        $pdf->Cell(0,7,"Total Harga (Rp)       :  ".number_format($row->totalharga, 0, ".", "."),0,1,'L');
        $pdf->Cell(0,7,"Uang Muka (Rp)       :  ".number_format($row->uangmuka, 0, ".", "."),0,1,'L');
        $pdf->Cell(0,7,"Kekurangan (Rp)      :  ".number_format($row->kurang, 0, ".", "."),0,1,'L');
        $pdf->Cell(10,7,'',0,1);
          }

        $pdf->Cell(10,20,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,12,'***TERIMA KASIH***',0,1,'C');
        $pdf->Cell(10,1,'',0,1);
  
        $pdf->Output();

?>