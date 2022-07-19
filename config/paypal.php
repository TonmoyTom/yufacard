<?php 
return [ 
    'client_id' =>'Abv2hNaW0QO1WWTSzVVZoiIa9-qUKU3zm06-Sts5RZlg4kaB0Fyu1aLStpFhgq5rO8nSd4PGEhEZYe-r',
	'secret' =>'ELvxEJQvvM6MyfKHm1Xsbx3TaJcRNxfPV_ANCW2ZRu1_6I4N1tXEDadQdqPyUVjmNeF1oYbmJlcxlop_',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];