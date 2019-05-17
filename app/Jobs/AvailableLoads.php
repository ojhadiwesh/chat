<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AvailableLoads implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $loads;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->loads = $loads;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      function getFuelPriceData($series_id){
        $response= json_decode(file_get_contents("http://api.eia.gov/series/?api_key=7e6bc0366d86cfe09146a2ec5eb3263a&series_id=$series_id"));
        $FuelPrice= $response->series[0]->data;

        return $FuelPrice;
        }
        $PADD1AData= getFuelPriceData('PET.EMD_EPD2D_PTE_R1X_DPG.W');
        $PADD1BData= getFuelPriceData('PET.EMD_EPD2D_PTE_R1Y_DPG.W');
        $PADD1CData= getFuelPriceData('PET.EMD_EPD2D_PTE_R1Z_DPG.W');
        $PADD2Data= getFuelPriceData('PET.EMD_EPD2D_PTE_R20_DPG.W');
        $PADD3Data= getFuelPriceData('PET.EMD_EPD2D_PTE_R30_DPG.W');
        $PADD4Data= getFuelPriceData('PET.EMD_EPD2D_PTE_R40_DPG.W');
        $PADD5Data= getFuelPriceData('PET.EMD_EPD2D_PTE_R50_DPG.W');
        $USData= getFuelPriceData('PET.EMD_EPD2D_PTE_NUS_DPG.W');

        $dbConnection = new PDO( 'mysql:dbname=pricing_manager;host=vps11426.inmotionhosting.com;charset=utf8', 'dojha', 'dOjha1458' );
        $dbConnection->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
        $dbConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        for($i=0; $i<sizeof($PADD1AData); $i++){
          $prepapredstatement= $dbConnection->prepare("insert ignore into fuelPriceData (Date, Zone, Price)
                                                          values(?, \"PADD1A\" , ?)");
          $prepapredstatement->bindParam(1, $PADD1AData[$i][0]);
          $prepapredstatement->bindParam(2, $PADD1AData[$i][1]);
          $prepapredstatement->execute();
        }
        for($i=0; $i<sizeof($PADD1BData); $i++){
          $prepapredstatement= $dbConnection->prepare("insert ignore into fuelPriceData (Date, Zone, Price)
                                                          values(?, \"PADD1B\" , ?)");
          $prepapredstatement->bindParam(1, $PADD1BData[$i][0]);
          $prepapredstatement->bindParam(2, $PADD1BData[$i][1]);
          $prepapredstatement->execute();
        }for($i=0; $i<sizeof($PADD1CData); $i++){
          $prepapredstatement= $dbConnection->prepare("insert ignore into fuelPriceData (Date, Zone, Price)
                                                          values(?, \"PADD1C\" , ?)");
          $prepapredstatement->bindParam(1, $PADD1CData[$i][0]);
          $prepapredstatement->bindParam(2, $PADD1CData[$i][1]);
          $prepapredstatement->execute();
        }for($i=0; $i<sizeof($PADD2Data); $i++){
          $prepapredstatement= $dbConnection->prepare("insert ignore into fuelPriceData (Date, Zone, Price)
                                                          values(?, \"PADD2\" , ?)");
          $prepapredstatement->bindParam(1, $PADD2Data[$i][0]);
          $prepapredstatement->bindParam(2, $PADD2Data[$i][1]);
          $prepapredstatement->execute();
        }for($i=0; $i<sizeof($PADD3Data); $i++){
          $prepapredstatement= $dbConnection->prepare("insert ignore into fuelPriceData (Date, Zone, Price)
                                                         values(?, \"PADD3\" , ?)");
          $prepapredstatement->bindParam(1, $PADD3Data[$i][0]);
          $prepapredstatement->bindParam(2, $PADD3Data[$i][1]);
          $prepapredstatement->execute();
        }for($i=0; $i<sizeof($PADD4Data); $i++){
          $prepapredstatement= $dbConnection->prepare("insert ignore into fuelPriceData (Date, Zone, Price)
                                                          values(?, \"PADD4\" , ?)");
          $prepapredstatement->bindParam(1, $PADD4Data[$i][0]);
          $prepapredstatement->bindParam(2, $PADD4Data[$i][1]);
          $prepapredstatement->execute();
        }for($i=0; $i<sizeof($PADD5Data); $i++){
          $prepapredstatement= $dbConnection->prepare("insert ignore into fuelPriceData (Date, Zone, Price)
                                                          values(?, \"PADD5\" , ?)");
          $prepapredstatement->bindParam(1, $PADD5Data[$i][0]);
          $prepapredstatement->bindParam(2, $PADD5Data[$i][1]);
          $prepapredstatement->execute();
        }for($i=0; $i<sizeof($USData); $i++){
          $prepapredstatement= $dbConnection->prepare("insert ignore into fuelPriceData (Date, Zone, Price)
                                                          values(?, \"US\" , ?)");
          $prepapredstatement->bindParam(1, $USData[$i][0]);
          $prepapredstatement->bindParam(2, $USData[$i][1]);
          $prepapredstatement->execute();
        }
      }
}
