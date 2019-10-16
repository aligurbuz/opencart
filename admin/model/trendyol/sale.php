<?php
class ModelTrendyolSale extends Model {
	public function salecount($status, $store){
		$login = $store['api_username'];
		$password = $store['api_password'];
		$url = 'https://api.trendyol.com/sapigw/suppliers/'.$store['supplier_id'].'/orders?status='.$status;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
		$result = curl_exec($ch);
		curl_close($ch);  
		$orders = json_decode($result);		
		return $orders->totalElements;
	}

	public function getSales($store,$page = 0, $status = null){
		if($page > 0){
			$page = ($page - 1);
		}
		$login = $store['api_username'];
		$password = $store['api_password'];
		if($status == null){
			$url = 'https://api.trendyol.com/sapigw/suppliers/'.$store['supplier_id'].'/orders?orderByDirection=DESC&page='.$page.'&size=50';
		} else {
			$url = 'https://api.trendyol.com/sapigw/suppliers/'.$store['supplier_id'].'/orders?orderByDirection=DESC&page='.$page.'&size=50&status='.$status;
		}
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
		$result = curl_exec($ch);
		curl_close($ch);  
		$orders = json_decode($result);
		//print_r($orders);
		return $orders;
	}
}
?>