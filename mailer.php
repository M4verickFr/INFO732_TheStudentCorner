<?php

interface IObserver
{
     function onUserAdded( $observable, $data );
}

interface IObservable
{
    function attach( $observer );
}

class Mailer implements IObserver
{
    public function onUserAdded( $observable, $data ) 
    {
        mail("admin@StudentCorner.com", "new user", $data);
    }
}