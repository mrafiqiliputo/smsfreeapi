<?php
if ($_POST) {
  # code...

extract($_POST);

 $sms_msg = urlencode($post_pesan);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://mrliputo.dev.php.or.id/sms/api/sms?numphone=".$numphone."&sms_msg=".$sms_msg,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded"

  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

 $result = json_decode($response, true);


}
}

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMS API</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body style="background-color:#EEE">

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="#">SMS API</a>
				</div>



			</nav>
			    <div class="container" style="margin-top:100px">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Panel title
							</h3>
						</div>
						<div class="panel-body">

<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
     <?php if ($_POST) {
       # code...
       echo "<pre>";
       print_r($result);
       echo "</pre>";
     } ?>
    <form class="form-horizontal" action="" method="post">
     <div class="form-group ">

      <label class="control-label col-sm-2 requiredField" for="number">
       Phone Number
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
       <input class="form-control" id="number" name="numphone" placeholder="08****" type="text"/>
       <span class="help-block" id="hint_number">
        *nomor tujuan
       </span>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="textarea">
       Pesan SMS
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="col-sm-10">
       <textarea class="form-control" cols="40" id="textarea" name="post_pesan" rows="10"></textarea>
       <span class="help-block" id="hint_textarea">
        Max 160 karakter
       </span>
      </div>
     </div>
     <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
						</div>
						<div class="panel-footer">
							Send SMS
						</div>
					</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Dokumentasi
							</h3>
						</div>
						<div class="panel-body">
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://mrliputo.dev.php.or.id/sms/api/checkservice",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded"

  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

 $result = json_decode($response, true);

foreach ($result['status_service'] as $key => $value) {
  # code...
  if ($value['status'] == 'on') {
    # code...
    ?>
  <div class="alert alert-success" role="alert"><?php echo $key; ?> <?php echo $value['status']; ?></div>
    <?php
  }else {
    # code...
    ?>
    <div class="alert alert-danger" role="alert"><?php echo $key; ?> <?php echo $value['status']; ?></div>
    <?php
  }



}


}


 ?>


              <p><h2>API SMS</h2><br />
                Ambil code untuk website anda sendiri

              <p><h3>API KIRIM SMS</h3><br />
                Untuk mengirim sms melalui API bisa melakukan POST API sebagai berikut
<br>
parameter yang dibutuhkan :

<pre> Parameters :

  numphone

  post_pesan
</pre>
<br>
                Endpoint<br>
<pre>
URL       : http://mrliputo.dev.php.or.id/sms/api/
Endpoint  : sms
parameter : numphone
            post_pesan
Full URL  : http://mrliputo.dev.php.or.id/sms/api/sms
  </pre>

<pre>curl -X POST -H "Content-Type: application/x-www-form-urlencoded" -H "Cache-Control: no-cache" -H "Postman-Token: 49c49978-fdbd-050b-78bd-39cbb8978e4a" "http://mrliputo.dev.php.or.id/sms/api/sms?numphone=081368640151&sms_msg=test%20%20kirim"</pre>

<br>respon yang di peroleh :


                <pre>Array
(
    [code] => 0
    [message] => Succeed
    [data] => Array
        (
            [numphone] => 081368640151
            [msg] => test kirim
            [operator] => telkomsel
            [status_service] => on
            [status_send] => oke
            [response] =>
        )

) </pre>
              <p><h3>Check Service Operator</h3><br />
              API untuk mendapat kan status service agar bisa mengirim pesan. jika status off pada operator yang kita kirim maka
              kemungkinan besar pesan tidak dikirim. setiap pengiriman pesan akan melakukan check operator</p>

              Url API :
              <pre>
- Curl http://mrliputo.dev.php.or.id/sms/api/checkservice </pre>
Endpoint<br>
<pre>
URL       : http://mrliputo.dev.php.or.id/sms/api/
Endpoint  : checkservice
parameter : -
Full URL  : http://mrliputo.dev.php.or.id/sms/api/checkservices
</pre>


Curl :
<pre> curl -X POST -H "Content-Type: application/x-www-form-urlencoded" -H "Cache-Control: no-cache" -H "Postman-Token: 49c49978-fdbd-050b-78bd-39cbb8978e4a" "http://mrliputo.dev.php.or.id/sms/api/checkservice"</pre>
Respon yang di peroleh :
							<pre> Array
(
    [code] => 0
    [message] => Succeed
    [status_service] => Array
        (
            [telkomsel] => Array
                (
                    [status] => on
                    [msg] => tersedia untuk mengirim sms untuk operator ini
                )

            [indosat] => Array
                (
                    [status] => on
                    [msg] => tersedia untuk mengirim sms untuk operator ini
                )

            [xl] => Array
                (
                    [status] => off
                    [msg] => tidak bisa mengirim sms untuk saat ini
                )

            [axis] => Array
                (
                    [status] => off
                    [msg] => tidak bisa mengirim sms untuk saat ini
                )

        )

)</pre>


<br>
<br>

<div class="tabbable" id="tabs-78354">
  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#panel-149318" data-toggle="tab">PHP</a>
    </li>
    <li>
      <a href="#panel-623436" data-toggle="tab">JAVA</a>
    </li>
    <li>
      <a href="#panel-6" data-toggle="tab">Python</a>
    </li>
    <li>
      <a href="#panel-7" data-toggle="tab">JavaScript Ajax</a>
    </li>
  </ul>
  <div class="tab-content" style="margin-top:20px">
    <div class="tab-pane active" id="panel-149318">
      <p>
        Send SMS
        <pre>

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://mrliputo.dev.php.or.id/sms/api/sms?numphone=081368640151&sms_msg=test%20%20kirim",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "postman-token: a145314d-6ffd-9700-cc33-188d645dfb47"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
</pre>

Check status_service
<pre>

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "http://mrliputo.dev.php.or.id/sms/api/checkservice",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_HTTPHEADER => array(
"cache-control: no-cache",
"content-type: application/x-www-form-urlencoded",
"postman-token: a145314d-6ffd-9700-cc33-188d645dfb47"
),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
}
</pre>
      </p>
    </div>
    <div class="tab-pane" id="panel-623436">
      <p>
      Send sms
      <pre>OkHttpClient client = new OkHttpClient();

Request request = new Request.Builder()
  .url("http://mrliputo.dev.php.or.id/sms/api/sms?numphone=081368640151&sms_msg=test%20%20kirim")
  .post(null)
  .addHeader("content-type", "application/x-www-form-urlencoded")
  .addHeader("cache-control", "no-cache")
  .addHeader("postman-token", "89d665ca-6e20-267d-4f69-9ca5af9b318a")
  .build();

Response response = client.newCall(request).execute();</pre>

check status_service
<pre>OkHttpClient client = new OkHttpClient();

Request request = new Request.Builder()
  .url("http://mrliputo.dev.php.or.id/sms/api/checkservice")
  .post(null)
  .addHeader("content-type", "application/x-www-form-urlencoded")
  .addHeader("cache-control", "no-cache")
  .addHeader("postman-token", "89d665ca-6e20-267d-4f69-9ca5af9b318a")
  .build();

Response response = client.newCall(request).execute();</pre>
      </p>
    </div>
    <div class="tab-pane" id="panel-6">
      <p>
        Send SMS
        <pre>import http.client

conn = http.client.HTTPConnection("mrliputo.dev.php.or.id")

headers = {
    'content-type': "application/x-www-form-urlencoded",
    'cache-control': "no-cache",
    'postman-token': "eab6c17c-51bc-96f3-b00a-f714d5ee0e6f"
    }

conn.request("POST", "/sms/api/sms?numphone=081368640151&sms_msg=test%20%20kirim", headers=headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))</pre>

Check status_service
<pre>import http.client

conn = http.client.HTTPConnection("mrliputo.dev.php.or.i")

headers = {
    'content-type': "application/x-www-form-urlencoded",
    'cache-control': "no-cache",
    'postman-token': "eab6c17c-51bc-96f3-b00a-f714d5ee0e6f"
    }

conn.request("POST", "/sms/api/checkservice", headers=headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))</pre>
      </p>
    </div>
    <div class="tab-pane" id="panel-7">
      <p>
        Send SMS
        <pre>var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://mrliputo.dev.php.or.id/sms/api/sms?numphone=081368640151&sms_msg=test%20%20kirim",
  "method": "POST",
  "headers": {
    "content-type": "application/x-www-form-urlencoded",
    "cache-control": "no-cache",
    "postman-token": "5e320c4e-088d-a6e6-39f0-194ea9c3c65b"
  }
}

$.ajax(settings).done(function (response) {
  console.log(response);
});</pre>

Check status_service
<pre>var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://mrliputo.dev.php.or.id/sms/api/checkservice",
  "method": "POST",
  "headers": {
    "content-type": "application/x-www-form-urlencoded",
    "cache-control": "no-cache",
    "postman-token": "5e320c4e-088d-a6e6-39f0-194ea9c3c65b"
  }
}

$.ajax(settings).done(function (response) {
  console.log(response);
});</pre>
      </p>
    </div>
  </div>
</div>
						</div>
						<div class="panel-footer">
							Muhammad Rafiqi Liputo - wa : 081368640151
						</div>
					</div>
				</div>
				<div class="col-md-1">
				</div>
			</div>
		</div>
	</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
