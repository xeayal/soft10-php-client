<?php
class Soft10 {
    private $baseUrl = 'https://wpapi.soft10.az';
    private $secretKey;

    public function __construct($secretKey){
        $this->secretKey = $secretKey;
    }
    
    public function request($method, $endPoint, $reqBody = null) {
        $url = $this->baseUrl.$endPoint;
        $curl = curl_init();

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array(
                'secretkey: ' . $this->secretKey,
                'Content-Type: application/json'
            ),
        );
    
        if ($method === 'POST' && $reqBody !== null) {
            $options[CURLOPT_POSTFIELDS] = json_encode($reqBody);
        }

        curl_setopt_array($curl, $options);
        
        $response = curl_exec($curl);
        curl_close($curl);
    
        return $response;
    }
    
    public function post($endPoint, $reqBody) {
        return $this->request('POST', $endPoint, $reqBody);
    }
    
    public function get($endPoint) {
        return $this->request('GET', $endPoint);
    }

    /**
     * Send messga to singly number
     * @param array $reqBody
     * @return json
     */
    public function sendMessage($reqBody){
        return $this->post('/send-single', $reqBody);
    }

    /**
     * Check connection
     * @return json
     */
    public function checkConnection(){
        return $this->get('/checkconnection');
    }

    /**
     * Check phone whatsapp availability
     * @param string $phone
     * @return json
     */
    public function checkPhoneWhatsappAvailability($phone){
        return $this->get('/check-phone-wp-availability/'.$phone);
    }
    
    /**
     * Get qr code for scan
     * @return json
     */
    public function scan(){
        return $this->get('/scan');
    }

    /**
     * Logout
     * @return json
     */
    public function logout(){
        return $this->get('/account/logout');
    }
    
}
