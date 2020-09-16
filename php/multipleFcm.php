<?php 
        
    // $title=$_POST['title'];
    // $message=$_POST['message'];
    

    function sendNotif($to, $notif)        {
        $serverKey= "AAAAXTlcxWQ:APA91bGZDIOy85amlST-mFOKDmDKXTRXJUHfG-RmA1-WYGmyN8WJuAv8__wLupcaPu4hLrsm-G5iLmpe7_jjQQv6OtvV7esAsSPN7PLu8r0SYnq2Z-b-U6exJcJOQrg7UuF0EXLFPsoX";
        $url = "https://fcm.googleapis.com/fcm/send";
        $fields = array(
            'to' => $to,
            'notification' => $notif
            );
        $headers = array();
        $headers[] = 'Authorization: key =' . $serverKey;
        $headers[] = 'Content-Type: application/json';
        $ch = curl_init();

        curl_setopt( $ch,CURLOPT_URL, $url );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

     
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo "error: " . curl_error($ch);
        }else
            echo "success";
        curl_close( $ch );
        // echo $result;

    }


    // for single user
    // $to = "c819rSQTRHq3r1Zi5ptNm2:APA91bED7SL7ViNKeKuIWeWYgNjAf_ZFuuOzOqj8V44Y4K4IM2dGJDOG4_X5bU6yiWcFP5eTmeKzL8PQuGGxBA9GXPuvaJyvBT9GkrPiicwo6KoAyEUipdmIhhdtXv_e4IR7-QsIZCMR";

    $to = "/topics/promotion";
    $notif = $array = array(
        'title' => 'Notification',
        'body' => 'new message for all subscriber' );

    sendNotif($to, $notif);
   
?>   
