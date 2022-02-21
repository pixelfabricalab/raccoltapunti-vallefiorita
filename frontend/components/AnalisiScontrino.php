<?php
    namespace frontend\components;

    use DragonBe\Vies\Vies;
    use DragonBe\Vies\ViesException;
    use DragonBe\Vies\ViesServiceException;

class AnalisiScontrino {
    
    /* funzione di validazione della partita IVA - passare la partita iva senza codice paese - ritorna true se la partita iva è valida, false altrimenti */
    public function validaVIES($codicenazione, $partitaiva) {
        
        $vies = new Vies;
        $viesexception = new ViesException();
        $vies_service_exception = new ViesServiceException();

        if (false === $vies->getHeartBeat()->isAlive()) {
            echo 'Il servizio di validazione della partita IVA comunitaria non risponde. Non è possibile validare la partita IVA.' . PHP_EOL;
            return false;
        } else {
            $risultato = $vies->validateVat(
                $codicenazione,           // Trader country code 
                $partitaiva,   // Trader VAT ID
                'IT',           // Requester country code 
                '08988081009'    // Requester VAT ID
            );
            if ($risultato->isValid()) {
                return true;
            } else {
                return false;
            }
        }

    }
}