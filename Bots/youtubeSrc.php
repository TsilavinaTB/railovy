<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


    define("MAX_RESULTS", 5);

require '../vendor/autoload.php';

use App\RepChatfuel;
    
     if (isset($_GET['submit']) )
     {
        $keyword = $_GET['keyword'];
               
        if (empty($keyword))
        {
            $response = array(
                  "type" => "error",
                  "message" => "Please enter the keyword."
                );
        } 
    }
         
?>
<!doctype html>
<html>
    <head>
        <title>Search Videos by keyword using YouTube Data API V3</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>

            body {
                font-family: Arial;
                width: 900px;
                padding: 10px;
            }
            .search-form-container {
                background: #F0F0F0;
                border: #e0dfdf 1px solid;
                padding: 20px;
                border-radius: 2px;
            }
            .input-row {
                margin-bottom: 20px;
            }
            .input-field {
                width: 100%;
                border-radius: 2px;
                padding: 10px;
                border: #e0dfdf 1px solid;
            }
            .btn-submit {
                padding: 10px 20px;
                background: #333;
                border: #1d1d1d 1px solid;
                color: #f0f0f0;
                font-size: 0.9em;
                width: 100px;
                border-radius: 2px;
                cursor:pointer;
            }
            .videos-data-container {
                background: #F0F0F0;
                border: #e0dfdf 1px solid;
                padding: 20px;
                border-radius: 2px;
            }
            
            .response {
                padding: 10px;
                margin-top: 10px;
                border-radius: 2px;
            }

            .error {
                 background: #fdcdcd;
                 border: #ecc0c1 1px solid;
            }

           .success {
                background: #c5f3c3;
                border: #bbe6ba 1px solid;
            }
            .result-heading {
                margin: 20px 0px;
                padding: 20px 10px 5px 0px;
                border-bottom: #e0dfdf 1px solid;
            }
            iframe {
                border: 0px;
            }
            .video-tile {
                display: inline-block;
                margin: 10px 10px 20px 10px;
            }
            
            .videoDiv {
                width: 250px;
                height: 150px;
                display: inline-block;
            }
            .videoTitle {
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
            }
            
            .videoDesc {
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
            }
            .videoInfo {
                width: 250px;
            }
        </style>
        
    </head>
    <body>

        
        <?php if(!empty($response)) { ?>
                <div class="response <?php echo $response["type"]; ?>"> <?php echo $response["message"]; ?> </div>
        <?php }?>
        <?php
  
            if (isset($_GET['submit']) )
            {
                                         
              if (!empty($keyword))
              {
                $apikey = 'AIzaSyDjhgRuytpzwY7qYpEfplax6dUATRQ_B_s'; 
                $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $keyword . '&maxResults=' . MAX_RESULTS . '&key=' . $apikey;

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);

                curl_close($ch);
                $data = json_decode($response);
                $value = json_decode(json_encode($data), true);
            ?>
            <div class="" id="SearchResultsDiv">

            <?php
                $json = new RepChatfuel();
                  $sr = [];
                for ($i = 0; $i < MAX_RESULTS; $i++) {
                    $videoId = $value['items'][$i]['id']['videoId'];
                    $title = $value['items'][$i]['snippet']['title'];
                    $description = $value['items'][$i]['snippet']['description'];
                    
                    
                    $sr[] = $title . " https://www.youtube.com/watch?v=".$videoId;

                    }
                $sr = $sr[0];
                $json->addMessage($sr);
                echo $json->reponse();
                } 
           
            } else {
                          ?> 
        
              <h2>Search Videos by keyword using YouTube Data API V3</h2>
               <div class="search-form-container">
            <form id="keywordForm" method="GET" action="">
                <div class="input-row">
                    Search Keyword : <input class="input-field" type="search" id="keyword" name="keyword"  placeholder="Enter Search Keyword">
                </div>

                <input class="btn-submit"  type="submit" name="submit" value="Search">
            </form>
            </div>
        
            <?php
            }
            ?> 
            
        </div>
        
     
    </body>
</html>
