<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;

/**
 * JumboclTickets Controller
 *
 * @property \App\Model\Table\JumboclTicketsTable $JumboclTickets
 *
 * @method \App\Model\Entity\JumboclTicket[] paginate($object = null, array $settings = [])
 */
class DashboardsController extends AppController
{   

    public function report($from_date = null, $until_date = null, $country_id = null){

      if($this->request->getData() != null){                
          $from_date = $this->request->getData()['from_date'];
          $until_date = $this->request->getData()['until_date'];
          $country_id = $this->request->getData()['country_id'];

          $time = strtotime($from_date);
          $time2 = strtotime($until_date);

          $from_date = date('Y-m-d',$time);
          $until_date = date('Y-m-d',$time2);
      }

      $conn = ConnectionManager::get('default');      

      $result = $conn->execute("call supportReport('$from_date', '$until_date', $country_id)");
      
      $this->loadModel('Reports');
      $report = $this->Reports->find('all');

      $spreadsheet = new Spreadsheet();
      // Set workbook properties
      $spreadsheet->getProperties()->setCreator('Soporte regional')
              ->setLastModifiedBy('Soporte regional')
              ->setTitle('Reporte de tickets')
              ->setSubject('Reporte')
              ->setDescription('Reporte creado por herramienta de soporte regional supermercado, Cencosud')
              ->setKeywords('Microsoft office 2013 php PhpSpreadsheet')
              ->setCategory('Archivo de reporte');
       
      $sheet = $spreadsheet->getActiveSheet();

      $sheet->setCellValue('A1', 'Tipo de ticket');
      $sheet->setCellValue('B1', 'Estado');
      $sheet->setCellValue('C1', 'Numero de CAU');
      $sheet->setCellValue('D1', 'Descripción');
      $sheet->setCellValue('E1', 'Fecha Creación');
      $sheet->setCellValue('F1', 'Fecha Resolución');
      $sheet->setCellValue('G1', 'Analista');
      $sheet->setCellValue('H1', 'Usuario');
      $sheet->setCellValue('I1', 'Ticket Vtex');
      $sheet->setCellValue('J1', 'Prioridad');
      $sheet->setCellValue('K1', 'Fecha Creación');
      $sheet->setCellValue('L1', 'Fecha Respuesta');
      $sheet->setCellValue('M1', 'Fecha Resolución');
      $sheet->setCellValue('N1', 'Ticket Fizzmod');
      $sheet->setCellValue('O1', 'Prioridad');
      $sheet->setCellValue('P1', 'Fecha Creación');
      $sheet->setCellValue('Q1', 'Fecha Respuesta');
      $sheet->setCellValue('R1', 'Fecha Resolución');
      $sheet->setCellValue('S1', 'Bitacora de resolución');

      $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(80);
      $spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(80);
      
      $i = 2;
      foreach ($report as $key => $value) {        
          
          $sheet->setCellValue('A'.($i), $value['type']);
          $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);          
          $sheet->setCellValue('B'.($i), $value['state']);
          $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
          $sheet->setCellValue('C'.($i), $value['cau']);
          $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
          $sheet->setCellValue('D'.($i), $value['description']);
          $spreadsheet->getActiveSheet()->getStyle('D'.($i))->getAlignment()->setWrapText(true);
          $sheet->setCellValue('E'.($i), $value['cau_open_date']);
          $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
          $sheet->setCellValue('F'.($i), $value['cau_resolution_date']);
          $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
          $sheet->setCellValue('G'.($i), $value['user']);
          $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
          $sheet->setCellValue('H'.($i), $value['final_user']);
          $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
          $sheet->setCellValue('I'.($i), $value['vtex_id']);
          $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
          $sheet->setCellValue('J'.($i), $value['vtex_priority']);
          $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
          $sheet->setCellValue('K'.($i), $value['vtex_open_date']);
          $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
          $sheet->setCellValue('L'.($i), $value['vtex_response_date']);
          $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
          $sheet->setCellValue('M'.($i), $value['vtex_resolution_date']);
          $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
          $sheet->setCellValue('N'.($i), $value['fizz_id']);
          $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
          $sheet->setCellValue('O'.($i), $value['fizz_priority']);
          $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
          $sheet->setCellValue('P'.($i), $value['fizz_open_date']);
          $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
          $sheet->setCellValue('Q'.($i), $value['fizz_response_date']);
          $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
          $sheet->setCellValue('R'.($i), $value['fizz_resolution_date']);        
          $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);

          $this->loadModel('Records');
          $records = $this->Records->find('all', [
                'conditions' => ['ticket_id =' => $value['id']]                
            ]);
          
          $j=0;
          $text = '';
          foreach ($records as $key => $value) {
            if($j==0){
              $text = ($j+1).'.- '.$value['description'];
            }else{
              $text = $text."\n".($j+1).'.- '.$value['description'];                        
            }
            $j++;
          }
          $sheet->setCellValue('S'.($i), $text);
          $spreadsheet->getActiveSheet()->getStyle('S'.($i))->getAlignment()->setWrapText(true);
          

          $i++;
      }

      $spreadsheet->getActiveSheet()->setAutoFilter('A1:S'.$i);          
      // Set worksheet title
      $spreadsheet->getActiveSheet()->setTitle('Reporte');
       
      // Set active sheet index to the first sheet, so Excel opens this as the first sheet
      $spreadsheet->setActiveSheetIndex(0);
       

       $this->loadModel('Countries');
       $country = $this->Countries->get($country_id);       

       $filename = 'Reporte_'.$country['name'].'_'.$from_date.'_'.$until_date.'.xlsx';

      // Redirect output to a client's web browser (Xlsx)
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="'.$filename.'"');
      header('Cache-Control: max-age=0');
      // If you're serving to IE 9, then the following may be needed
      header('Cache-Control: max-age=1');
       
      // If you're serving to IE over SSL, then the following may be needed
      header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
      header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
      header('Pragma: public'); // HTTP/1.0
       
  
      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      $writer->save('php://output');
      exit;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($country_id = null, $state_id = null, $user_id = null, $from_date = null, $until_date = null)
    {
       if($this->request->getData() != null){
            //debug($this->request->getData());
            
            $from_date = $this->request->getData()['from_date'];
            $until_date = $this->request->getData()['until_date'];

            $country_id = $this->request->getData()['country_id'];
            if($country_id == '5') {
                $country_id = $this->getCountriesID();//array(1,2,3,4);
            }
            
            $state_id = $this->request->getData()['state_id'];
            if($state_id == '3'){
                $state_id = $this->getStatesID();//array(1,2);
            }
            $user_id = $this->request->getData()['user_id'];
            if($user_id == '10'){
                $user_id = $this->getUsersID();//array(8,9);
            }

        }
        if($state_id == null){
            $state_id = $this->getStatesID();//array(1,2);
        }
        if($country_id == null){
            $country_id = $this->getCountriesID();//array(1,2,3,4);
        }
        if($user_id == null){
            $user_id = $this->getUsersID();//array(8,9);
        }

       //debug('from_date: '.$from_date);
       //debug('until_date: '.$until_date);
       //debug('country_id: '.$country_id);
       //debug('state_id: '.$state_id);
       //debug('user_id: '.$user_id);       


       $tickets_abiertos = $this->openTickets();
       $clasificationListCount = $this->clasificationListCount();
       $ticketsTotal = $this->ticketsTotal();              

       $this->loadModel('Countries');
       $countries = $this->Countries->find('list');
       $countries = $countries->toArray();
       array_push($countries, "Todos");

       $this->loadModel('States');
       $states = $this->States->find('list');
       $states = $states->toArray();
       array_push($states, "Todos");        

       $this->loadModel('Users');
       $users = $this->Users->find('list');
       $users = $users->toArray();
       array_push($users, "Todos");

       if(is_array($state_id)){
            $state_id = $this->getMaxStatesID()+1;
        }
        if(is_array($country_id)){
            $country_id = $this->getMaxCountriesID()+1;
        }
        if(is_array($user_id)){
            $user_id = $this->getMaxUsersID()+1;
        }

          
       $this->set('countries', $countries);
       $this->set('states', $states);
       $this->set('users', $users);
       $this->set('country_id', $country_id);
       $this->set('state_id', $state_id);
       $this->set('user_id', $user_id);
       $this->set('tickets_abiertos', $tickets_abiertos);
       $this->set('clasificationListCount', $clasificationListCount);
       $this->set('ticketsTotal', $ticketsTotal);
    }

    public function openTickets(){
      $this->loadModel('Tickets');
      $state = 1; //abierto
      $tickets_abiertos = $this->Tickets->find('all', [
                'conditions' => ['state_id =' => $state],
                'contain' => ['Users', 'States', 'Countries']
            ]);
      return $tickets_abiertos;
    }

    public function clasificationListCount(){
      $this->loadModel('ClassificationTickets');
      $this->loadModel('Tickets');
      $clasificationList = $this->ClassificationTickets->find('list');
      $clasificationListCount = array();
      foreach ($clasificationList as $key => $value) {
          $ticket = $this->Tickets->find('all', [
                'conditions' => ['classification_ticket_id =' => $key],
                'contain' => ['Users', 'States', 'Countries']
            ]);          
          $clasification = array();
          $clasification['value'] = $ticket->count();
          $color = $this->random_color();          
          $clasification['color'] = '#'.$color; //aqui debo generar colores aleatorios
          $clasification['highlight'] = '#'.$color; //aqui debo generar colores aleatorios
          $clasification['label'] = $value;
          $clasificationListCount = $this->insertOrderArray($clasificationListCount, $clasification);
          
          //array_push($clasificationListCount, $clasification);          
          //debug($clasificationListCount);
      }      
      
      return $clasificationListCount;
    }

    function insertOrderArray($clasificationListCount, $clasification){
      
      $isInserted = false;
      $aux = array();

      for ($i=0 ; $i <count($clasificationListCount) ; $i++ ) {
          if($clasificationListCount[$i]['value'] < $clasification['value'] and !$isInserted){
            array_push($aux, $clasification);
            $isInserted = true;
          }
          array_push($aux, $clasificationListCount[$i]);
      }

      if(!$isInserted){
        array_push($aux, $clasification);
      }

      return $aux;
    }
    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
    function random_color() {
        return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }

    public function ticketsTotal(){
      $this->loadModel('Tickets');
      $ticketsTotal = array();

      $tickets_support = $this->Tickets->find('all', [
                'conditions' => ['vtex !=' => '',
                                 'fizz !=' => ''],
                'contain' => ['Users', 'States', 'Countries']
            ]);
      $supportTotal = array();
      $supportTotal['value'] = $tickets_support->count();
      $supportTotal['color'] = '#0000FF';
      $supportTotal['highlight'] = '#0000FF';
      $supportTotal['label'] = 'Total Soporte Regional';

       array_push($ticketsTotal, $supportTotal);

      $tickets_vtex = $this->Tickets->find('all', [
                'conditions' => ['vtex !=' => ''],
                'contain' => ['Users', 'States', 'Countries']
            ]);
      $vtexTotal = array();
      $vtexTotal['value'] = $tickets_vtex->count();
      $vtexTotal['color'] = '#f56954';
      $vtexTotal['highlight'] = '#f56954';
      $vtexTotal['label'] = 'Total VTEX';

      array_push($ticketsTotal, $vtexTotal); 

      $tickets_fizz = $this->Tickets->find('all', [
                'conditions' => ['fizz !=' => ''],
                'contain' => ['Users', 'States', 'Countries']
            ]);      

      $fizzTotal = array();
      $fizzTotal['value'] = $tickets_fizz->count();
      $fizzTotal['color'] = '#00a65a';
      $fizzTotal['highlight'] = '#00a65a';
      $fizzTotal['label'] = 'Total JIRA-Fiz';

      array_push($ticketsTotal, $fizzTotal); 

      //debug($ticketsTotal);

      return $ticketsTotal;
    }

     public function getStatesID(){

        $this->loadModel('States');
        $states = $this->States->find('list');
        $states = $states->toArray();
        return array_flip($states);                
    }
    public function getMaxStatesID(){

        $this->loadModel('States');
        $states = $this->States->find('list');
        $states = $states->toArray();
        return max(array_flip($states));
    }
    public function getCountriesID(){
        $this->loadModel('Countries');
        $countries = $this->Countries->find('list');
        $countries = $countries->toArray();
        return array_flip($countries);        
    }
    public function getMaxCountriesID(){
        $this->loadModel('Countries');
        $countries = $this->Countries->find('list');
        $countries = $countries->toArray();
        return max(array_flip($countries));        
    }
    public function getUsersID(){
        $this->loadModel('Users');
        $users = $this->Users->find('list');
        $users = $users->toArray();
        return array_flip($users);        
    }
    public function getMaxUsersID(){
        $this->loadModel('Users');
        $users = $this->Users->find('list');
        $users = $users->toArray();
        return max(array_flip($users));
    }
}
