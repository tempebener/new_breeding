<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//TIMEZONE
date_default_timezone_set("Asia/Jakarta");
class Import extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('dropdown');
		$this->load->helper('cek');
		$this->load->helper('format_all');
		$this->load->model('Model_import');
	}

	function index(){
		$data['page'] = 'import';
        $data['title'] = 'Import XLSX';

		$this->template->load('administrator/template','administrator/mod_import/import',$data);
	}

	// import excel data
    public function save() {
        $this->load->library('excel');
        
        if ($this->input->post('importfile')) {
            $path = ROOT_UPLOAD_IMPORT_PATH;
 
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|jpg|png';
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = array('nama_unit_bisnis', 'nama_perusahaan', 'nama_plant', 'nama_kandang', 'nama_strain','tgl_chickin','umur_chickin','jml_betina','jml_jantan','nama_supplier');
            $makeArray = array('nama_unit_bisnis' => 'nama_unit_bisnis', 'nama_perusahaan' => 'nama_perusahaan', 'nama_plant' => 'nama_plant', 'nama_kandang' => 'nama_kandang', 'nama_strain' => 'nama_strain', 'tgl_chickin' => 'tgl_chickin', 'umur_chickin' => 'umur_chickin', 'jml_betina' => 'jml_betina', 'jml_jantan' => 'jml_jantan', 'nama_supplier' => 'nama_supplier');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
            }
            $data = array_diff_key($makeArray, $SheetDataKey);
           
            if (empty($data)) {
                $flag = 1;
            }
            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {
                    $addresses = array();
                    $unitBisnis = $SheetDataKey['nama_unit_bisnis'];
                    $namaPerusahaan = $SheetDataKey['nama_perusahaan'];
                    $namaPlant = $SheetDataKey['nama_plant'];
                    $namaKandang = $SheetDataKey['nama_kandang'];
                    $namaStrain = $SheetDataKey['nama_strain'];
                    $tglChickin = $SheetDataKey['tgl_chickin'];
                    $umurChickin = $SheetDataKey['umur_chickin'];
                    $jmlBetina = $SheetDataKey['jml_betina'];
                    $jmlJantan = $SheetDataKey['jml_jantan'];
                    $namaSupplier = $SheetDataKey['nama_supplier'];

                    $unitBisnis = filter_var(trim($allDataInSheet[$i][$unitBisnis]), FILTER_SANITIZE_STRING);
                    $namaPerusahaan = filter_var(trim($allDataInSheet[$i][$namaPerusahaan]), FILTER_SANITIZE_STRING);
                    $namaPlant = filter_var(trim($allDataInSheet[$i][$namaPlant]), FILTER_SANITIZE_STRING);
                    $namaKandang = filter_var(trim($allDataInSheet[$i][$namaKandang]), FILTER_SANITIZE_STRING);
                    $namaStrain = filter_var(trim($allDataInSheet[$i][$namaStrain]), FILTER_SANITIZE_STRING);
                    $tglChickin = filter_var(trim($allDataInSheet[$i][$tglChickin]), FILTER_SANITIZE_STRING);
                    $umurChickin = filter_var(trim($allDataInSheet[$i][$umurChickin]), FILTER_SANITIZE_STRING);
                    $jmlBetina = filter_var(trim($allDataInSheet[$i][$jmlBetina]), FILTER_SANITIZE_STRING);
                    $jmlJantan = filter_var(trim($allDataInSheet[$i][$jmlJantan]), FILTER_SANITIZE_STRING);
                    $namaSupplier = filter_var(trim($allDataInSheet[$i][$namaSupplier]), FILTER_SANITIZE_STRING);
                    $fetchData[] = array('nama_unit_bisnis' => $unitBisnis, 'nama_perusahaan' => $namaPerusahaan, 'nama_plant' => $namaPlant, 'nama_kandang' => $namaKandang, 'nama_strain' => $namaStrain, 'tgl_chickin' => $tglChickin, 'umur_chickin' => $umurChickin, 'jml_betina' => $jmlBetina, 'jml_jantan' => $jmlJantan, 'nama_supplier' => $namaSupplier);
                }              
                $data['employeeInfo'] = $fetchData;
                $this->import->setBatchImport($fetchData);
                $this->import->importData();
            } else {
                echo "Please import correct file";
            }
        }
		$this->template->load('administrator/template','administrator/mod_import/display',$data);
        
    }

    public function create_user_by_template($token){
		if($this->_token ==$token && $this->_user_id==1){
			$path_file = './temp_upload/template_user.xls';
			
			$this->load->library("YBSExcelReader");
			$excel  = new YBSExcelReader();
			$excel->set_file($path_file,"TEMPLATE");
			$dataFinal = $excel->read(4,2003,range('A','D'));
			
			$val = array();
			$val_exist= array();
			$val_final = array();
			$x=4;
			foreach($dataFinal as $key){
				$val["nmuser"]  	= $key["A"];
				$pass 				=  (string) $key["B"];
				$val["passuser"]	= _generate($pass); 
				$val["opt_level"]	= (string) $key["C"];
				$val["opt_status"] 	= (string) $key["D"];
				$val["picture"]		= "default.png";
				
				
				$field=array();
				$field['nmuser'] =$val['nmuser'];
				$exist = $this->tmodel->if_exist('',$field);
				if($exist){
					$val_exist[] = "<small>ERROR : ROW (". $x . ") User ".$key["A"]."  sudah digunakan </small><br>";
				}else{
					$val_final [] = $val;
				}
				
				$x++;
			
			}
			
			$o = new Outputview();
			if(count($val_exist)>0){
				 $o->success = 'false';
				 $o->message = $val_exist;
				 echo $o->result();
				 return;
			}else{
				
				$split_data = array_chunk($val_final,100);
				foreach($split_data as $val){
					$this->tmodel->insert_multiple($val);
				}
				
				$o->success = 'true';
				$o->message = "<small>data berhasil di simpan..total data ".count($val_final)." row </small><br>";
				echo $o->result();
				return;
				
				
			}
			
			
		
			
		}else{
			redirect("Auth");
		}
	}
	
// ====================================================================================
	
	public function create_multiple(){
		$data =array(
			'title_page_big'				=> 'Buat Multiple Data',
			'link_save'						=> site_url().'import/create_action',
			// 'link_prepare_picture'			=> site_url().'prepare_picture'.$this->_token,
			'link_download_template_user'	=> site_url().'import/download_template_user/'.$this->_token,
			'link_upload_template'			=> site_url().'import/upload_template_user/'.$this->_token,
			'link_back'						=> $this->agent->referrer(),
			'id'							=> '',
			'nmuser'						=> '',
			'nmpicture'						=>  'Picture Profile',	
			'nmlevel'						=> '',
			'selected_status'				=> '1',
			'selected_level'				=> '',
			'data_level'					=> $this->get_level(),
			'picture'						=> '_profile.png',

		);
		
		$this->template->load('mod_import/import',$data);
	}

	public function upload_template_user($token){
		if($token == $this->_token && $this->_user_id==1){
				$data_level = $this->get_level();
			
				$tm = time();
				$config['upload_path']          = './temp_upload/';
                $config['allowed_types']        = 'xls';
                $config['max_size']             = 60000;
				$config['file_name']			= 'template_data.xls';
				$config['overwrite']			= TRUE;
				
				
                $this->load->library('upload', $config);	
				
				$o = array();
			 if ( !$this->upload->do_upload('inputfile')){
				 
						$em = $this->upload->display_errors();
						$em = str_replace('You did not select a file to upload.','Tidak ada file yang di pilih',$em);
					
						$o['success'] 	= 'false';
						$o['message']	= $em;
						$o['elementid'] = '#inputfile';
						$o['sec_val']	=  $this->security->get_csrf_token_name()."=".$this->security->get_csrf_hash()."&";
						$o = json_encode($o);
						echo $o;
						return;		
                }else{
					$path_file = $config['upload_path'].$config['file_name']; 
					$this->load->library("YBSExcelReader");
					$dataError = array();
		
					try{
						$excel  = new YBSExcelReader();
						$excel->set_file($path_file,"TEMPLATE");
						$dataFinal = $excel->read(4,2003,range('A','D'));
						
						$x=4;
						foreach($dataFinal as $key){
							if($key["A"]=="" || $key["B"]=="" || $key["C"]=="" || $key["D"]==""){
								$dataError[]= "<small>ERROR : ROW (". $x . ") ADA DATA YANG KOSONG, data tidak boleh kosong.. </small><br>";
							}
							
							
							//MENGECEK KODE LEVEL
							$exist = FALSE;
							$kode_level = (string) $key["C"] ;
							foreach($data_level as $key_level){
								if($key_level["id"] == $kode_level && $kode_level !=="1"){
									$exist = TRUE;
								}
							}
							
							if(!$exist){
								 $dataError[]= "<small>ERROR : ROW (". $x . ") KODE LEVEL tidak valid.. </small><br>";
							}
							
							
							
							//MENGECEK KODE STATUS
							$kode_status = (string) $key["D"] ;
							if($kode_status !=="1" && $kode_status !=="2" ){
								 $dataError[]= "<small>ERROR : ROW (". $x . ") KODE STATUS tidak valid.. </small><br>";
							}
							

							$field=array();
							$field['nmuser'] =$key["A"];
							$exist = $this->tmodel->if_exist('',$field);
							if($exist){
								 $dataError[]= "<small>ERROR : ROW (". $x . ") User ".$key["A"]."  sudah digunakan </small><br>";
							}
							
							
							$double = $this->check_data_double($dataFinal,$key["A"],$x);
							
							
							if($double !==""){
								$dataError[] = $double;
							}
							
							//membatasi pembacaan error ,max 10 error
							if(count($dataError)>10){
								break;
							}
							
							
							$x++;
						}
						
						
						
					} catch(Exception $e) {
						$msgError = $e->getMessage();
						$msgError = str_replace("Your requested sheet index: -1 is out of bounds. The actual number of sheets is 0.","Error : Sheet tidak di temukan",$msgError);
						$dataError[]= "<small>".$msgError."</small><br>";
					}
				
					
						

					if(count($dataError) > 0){
						unlink($path_file);
						
						$o['success']		= 'false';
						$o['message'] 		= $dataError;
						$o['original_name']	= $this->upload->data('client_name');
						$o['sec_val']		=  $this->security->get_csrf_token_name()."=".$this->security->get_csrf_hash()."&";
						$o = json_encode($o);
						echo $o;
						return;	
					}else{		
						$o['success']		= 'true';
						$o['message'] 		= "<small> File Ready in Process,,click save</small><br><a onclick=\"save('".site_url()."sistem/Pengaturan_pengguna/create_user_by_template/".$this->_token."')\" href=\"javascript:void(0)\" class=\"btn btn-success\">Save<a/>";
						$o['original_name']	= $this->upload->data('client_name');
						$o['sec_val']		=  $this->security->get_csrf_token_name()."=".$this->security->get_csrf_hash()."&";
						$o = json_encode($o);
						echo $o;
						return;		
					}
                }	
		
		}else{
			redirect("Auth");
		}	
	
	
	
	}

	private function check_data_double($data_master,$data_check,$row_check){
		$x =4;
		$data ="";
		foreach($data_master as $key){
			if($key["A"]== $data_check && $row_check !== $x){
				$data="<small>ERROR : ROW (". $row_check . ") dan ROW (".$x.") Column A (".$key["A"].") Data Double</small><br>";
				break;
			}
			
			$x++;
		}
		
		return $data;
		
	}
	
	public function download_template_user($token){
		if($token == $this->_token && $this->_user_id==1){
		
			//mendapatkan data level
			$data_level = $this->get_level();
			
			
			$this->load->library("PHPExcel");
			$objPHPExcel = new PHPExcel();
			
			//SET BORDER
			$thick = array ();
			$thick['borders']=array();
			$thick['borders']['allborders']=array();
			$thick['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THIN ;
			

			$objPHPExcel->getProperties()->setCreator("YBS SYSTEM")
								 ->setLastModifiedBy("YBS SYSTEM")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Test result file");


			//========================================//
			/* 	 MEMBUAT TABLE ISIAN PADA COLUMN A1	  */
			//========================================//					 

			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', 'ISI PADA TABEL DI BAWAH INI (MAX 2000 ROW)')
						->setCellValue('A2', 'pastikan anda mengisi dengan benar, cek kembali isian anda sebelum melakukan upload ke system')
						->setCellValue('A3', 'USER_NAME')
						->setCellValue('B3', 'PASSWORD')
						->setCellValue('C3', 'KODE_LEVEL')
						->setCellValue('D3', 'KODE_STATUS');
						
			//MERGE COLOMN A1-D1 UNTUK TITLE KETERANGAN
			$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');	
			
			//MERGE COLOMN A2-D2 UNTUK TITLE KETERANGAN
			$objPHPExcel->getActiveSheet()->mergeCells('A2:D2');	
			
				
			//MEMBUAT COLOR FONT RED A1
			$objPHPExcel->getActiveSheet()->getStyle('A1:A2')->getFont()
						->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);		
			
			
			//WRAP TEST A2
			$objPHPExcel->getActiveSheet()->getStyle('A2')
						->getAlignment()->setWrapText(true);
			
			//Set Height Row 2
			$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);			

			
			//SET ALIGNMENT -CENTER-CENTER A1-A2
			$objPHPExcel->getActiveSheet()->getStyle('A1:D2003')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('A1:D2003')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);			
			
			
			//MEMBUAT COLOR FONT WHITE A3-D3	
			$objPHPExcel->getActiveSheet()->getStyle('A3:D3')->getFont()
						->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
						
			
			//BOLD A1
			$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			
			//BOLD A3-D3
			$objPHPExcel->getActiveSheet()->getStyle('A3:D3')->getFont()->setBold(true);
			
			
			//SET WIDTH COLUMN
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);	
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			
			
			
			//SET COLOR CELL BLACK A3-D3
			$objPHPExcel->getActiveSheet()->getStyle('A3:D3')->getFill()
						->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
						->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
						
						
			//========================================//
			/* 	 END TABLE ISIAN PADA COLUMN A1	  */
			//========================================//	

					


			
						
			
			//========================================//
			/*MEMBUAT TABLE CODE LEVEL PADA COLUMN G3*/
			//========================================//
			
				//MENULIS PADA COLUMN G3
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('G3', 'KODE_LEVEL')
							->setCellValue('G4', 'KODE_LEVEL')
							->setCellValue('H4', 'DESKRIPSI');
				
				//MERGE COLOMN G3-H3 SEBAGAI TABLE TITLE
				$objPHPExcel->getActiveSheet()->mergeCells('G3:H3');
				
				//SET COLOR CELL BLACK G3
				$objPHPExcel->getActiveSheet()->getStyle('G3')->getFill()
							->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
							->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);	
				
				//MEMBUAT COLOR FONT WHITE G3-H3	
				$objPHPExcel->getActiveSheet()->getStyle('G3:H3')->getFont()
							->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	

				//BOLD G3-H4
				$objPHPExcel->getActiveSheet()->getStyle('G3:H4')->getFont()->setBold(true);						
							
				
				//SET ALIGNMENT  TITLE CENTER-CENTER G3-H4
				$objPHPExcel->getActiveSheet()->getStyle('G3:G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('G3:G4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);	
				
				//SET WIDTH Column G-H
				$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
				
				
							
							
				
				//membuat border				
				$objPHPExcel->getActiveSheet()->getStyle ( 'G3:H4' )->applyFromArray ($thick);
				
				$x = 5; //start row data
				foreach($data_level as $val){
					//mencegah id configurator di tampilkan
					if( $val['id'] > 1){
						$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('G'.$x, $val['id'])
						->setCellValue('H'.$x, $val['nmlevel']);
						
						$x++;
					}
				}
			
			

				$x = $x-1;
				
				
				$objPHPExcel->getActiveSheet()->getStyle('G5:H'.$x)->applyFromArray ($thick);
				$objPHPExcel->getActiveSheet()->getStyle('G5:G'.$x)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('G5:G'.$x)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);	
				
			
			//========================================//
			/* END TABLE CODE LEVEL PADA COLUMN G3*/
			//========================================//


			
			
			//========================================//
			/*MEMBUAT TABLE CODE STATUS PADA COLUMN J3*/
			//========================================//
			
				$objPHPExcel->setActiveSheetIndex(0) 
							->setCellValue('J3', 'KODE_STATUS')
							->setCellValue('J4', 'KODE_STATUS')
							->setCellValue('K4', 'DESKRIPSI');
				
				//MERGE COLOMN J3-K3
				$objPHPExcel->getActiveSheet()->mergeCells('J3:K3');
				
				//SET COLOR CELL BLACK J3
				$objPHPExcel->getActiveSheet()->getStyle('J3')->getFill()
							->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
							->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);	
				
				//MEMBUAT COLOR FONT WHITE J3-K3	
				$objPHPExcel->getActiveSheet()->getStyle('J3:K3')->getFont()
							->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	

				//BOLD J3-K4
				$objPHPExcel->getActiveSheet()->getStyle('J3:K4')->getFont()->setBold(true);						

				//SET ALIGNMENT TITLE -CENTER-CENTER J3-K4
				$objPHPExcel->getActiveSheet()->getStyle('J3:J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('J3:J4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);	

				//SET WIDTH Column J-K
				$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);			
			
				//MEMBUAT BORDER TABLE
				$objPHPExcel->getActiveSheet()->getStyle ( 'J3:K6' )->applyFromArray ($thick);
			
				
				//MENGISI DATA
				$objPHPExcel->setActiveSheetIndex(0) 
							->setCellValue('J5', '1')
							->setCellValue('J6', '2')
							->setCellValue('K5', 'AKTIF')
							->setCellValue('K6', 'NON AKTIF');
				//set ALIGNMENT DATA			
				$objPHPExcel->getActiveSheet()->getStyle('J5:J6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objPHPExcel->getActiveSheet()->getStyle('J5:J6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);			
			
			//========================================//
			/* END TABLE CODE STATUS PADA COLUMN J3*/
			//========================================//
			
				
			
			//PROTECTION SHEET
			$objPHPExcel->getActiveSheet()->getProtection()->setPassword('PHPExcel');
			$objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);

			//UNPROTECT TABLE ISIAN MAX 2000 ROW
			$objPHPExcel->getActiveSheet()->getStyle('A4:D2003')->getProtection()->setLocked(
				PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
			);
			
			//membuat border				
		   $objPHPExcel->getActiveSheet()->getStyle ( 'A4:D2003' )->applyFromArray ($thick);

						
			// Rename worksheet
			$objPHPExcel->getActiveSheet()->setTitle('TEMPLATE');		

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			// Redirect output to a client’s web browser (Excel5)
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Template_User.xls"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;	
		}else{
			redirect("Auth");			
		}		
		
	}
}