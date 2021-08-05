<?php

/**
 * 
 */
class Report
{

public $php;



    public function get_today_report(){

        GLOBAL $mysqli;

        $report = $mysqli->query("SELECT * FROM fund_transaction WHERE DATE(date_time) = CURDATE() ORDER BY id DESC");
        return $report;

    }


    public function get_week_report(){

        GLOBAL $mysqli;

        $report = $mysqli->query("SELECT * FROM fund_transaction WHERE date_time >= DATE(NOW()) + INTERVAL -7 DAY ORDER BY id DESC");
        return $report;

    }


    public function get_today_report_table(){

        GLOBAL $mysqli;

        $report = $mysqli->query("SELECT user_cnic,amount_in,amount_out,transaction_invoice,transaction_process,date_time FROM FUND_TRANSACTION WHERE DATE(date_time) = CURDATE() ORDER BY id DESC");
        return $report;

    }


    public function get_week_report_table(){

        GLOBAL $mysqli;

        $report = $mysqli->query("SELECT user_cnic,amount_in,amount_out,transaction_invoice,transaction_process,date_time FROM FUND_TRANSACTION WHERE date_time >= DATE(NOW()) + INTERVAL -7 DAY ORDER BY id DESC");
        return $report;

    }    


public function generate_report_daily(){

        $this->php = new FPDF();
        
        $this->php->AddPage();
        $this->php->SetFont('Arial','B',10);
        $this->php->Ln();
        $this->php->Cell("",7,"Daily Records of Transaction's");
        $this->php->Ln();
        $this->php->Ln();
        $this->php->SetFont('times','B',10);
        $this->php->Cell(30,7,"User Cnic",1);
        $this->php->Cell(30,7,"Amount In",1);
        $this->php->Cell(30,7,"Amount Out",1);
        $this->php->Cell(40,7,"Transaction Invoice",1);
        $this->php->Cell(20,7,"Process",1);
        $this->php->Cell(40,7,"Date",1);
        $this->php->Ln();


        $sql = $this->get_today_report_table();

        while($rows = mysqli_fetch_array($sql))
        { 
            $user_cnic              = $rows[0];
            $amount_in              = $rows[1];
            $amount_out             = $rows[2];
            $transaction_invoice    = $rows[3];
            $transaction_process    = $rows[4];
            $date_time              = date_format(date_create($rows[5]),'d F Y g:i A');
            $this->php->Cell(30,7,$user_cnic,1);
            $this->php->Cell(30,7,$amount_in,1);
            $this->php->Cell(30,7,$amount_out,1);
            $this->php->Cell(40,7,$transaction_invoice,1);
            $this->php->Cell(20,7,$transaction_process,1);
            $this->php->Cell(40,7,$date_time,1); 
            $this->php->Ln(); 
        }
        $this->php->Output('D','daily.pdf');
        $this->php->Output();


return true;
}



public function generate_report_weekly(){

        $this->php = new FPDF();

        $this->php->AddPage();
        $this->php->SetFont('Arial','B',10);
        $this->php->Ln();
        $this->php->Cell("",7,"Weekly Records of Transaction's");
        $this->php->Ln();
        $this->php->Ln();
        $this->php->SetFont('times','B',10);
        $this->php->Cell(30,7,"User Cnic",1);
        $this->php->Cell(30,7,"Amount In",1);
        $this->php->Cell(30,7,"Amount Out",1);
        $this->php->Cell(40,7,"Transaction Invoice",1);
        $this->php->Cell(20,7,"Process",1);
        $this->php->Cell(40,7,"Date",1);
        $this->php->Ln();

        $sql = $this->get_week_report_table();

        while($rows = mysqli_fetch_array($sql))
        { 
            $user_cnic              = $rows[0];
            $amount_in              = $rows[1];
            $amount_out             = $rows[2];
            $transaction_invoice    = $rows[3];
            $transaction_process    = $rows[4];
            $date_time              = date_format(date_create($rows[5]),'d F Y g:i A');
            $this->php->Cell(30,7,$user_cnic,1);
            $this->php->Cell(30,7,$amount_in,1);
            $this->php->Cell(30,7,$amount_out,1);
            $this->php->Cell(40,7,$transaction_invoice,1);
            $this->php->Cell(20,7,$transaction_process,1);
            $this->php->Cell(40,7,$date_time,1); 
            $this->php->Ln(); 
        }
        $this->php->Output('D','weekly.pdf');
        $this->php->Output();

return true;

}

 

}
?>