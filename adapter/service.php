<?php
class ClientService
{
    public static function delinquentUserInformations($mailer)
    {
        $delinquents = Client::getDelinquents();

        foreach ($delinquents as $client) {
            $mailer->addAddress($client->email);
            $mailer->setTextBody("Delinquent user: " . $client->name);
            $mailer->send();
        }
    }
}

ClientService::delinquentUserInformations(new OldEmailService());
ClientService::delinquentUserInformations(new PHPMailerAdapter());