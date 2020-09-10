<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <?php
$clantag = "#JYL8CYVL";
$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjRlMGQ5ODdlLWFjZjItNGJiZC04MTIxLWMwMGNlNDEwYzU3MiIsImlhdCI6MTU5OTc2MTQ4NCwic3ViIjoiZGV2ZWxvcGVyLzVkZjdhMzE2LTkwZjktZWFhYy0zZTZiLTZlOWY1NDdhYmYwNSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjExMS45MS4xNS45OCJdLCJ0eXBlIjoiY2xpZW50In1dfQ.RCrdLqNpdhe4EWK23kjLyzeMleKzSZ_SNvLa7_vt7-f-Pxe69Jy8HSvr9hZijCInA3EkYkFHQbv6Ykv39v4GdQ";
$url = "https://api.clashofclans.com/v1/clans/" . urlencode($clantag);
$ch = curl_init($url);
$headr = array();
$headr[] = "Accept: application/json";
$headr[] = "Authorization: Bearer ".$token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($ch);
$data = json_decode($res, true);
curl_close($ch);
if (isset($data["reason"])) {
  $errormsg = true;
}
$members = $data["memberList"];
?>
    <title>Indian Immortls</title>
    <link rel="shortcut icon" href="img/icons/icon.png">
    <link rel="stylesheet" href="css/main.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
</head>

</head>


<!----------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------->


<body>
<div class="nanobar my-class" id="my-id" style="position: fixed;">
        <div class="bar"></div>
    </div>
    
    <?php
  if (isset($errormsg)) {
    echo "<p>", "Failed: ", $data["reason"], " : ", isset($data["message"]) ? $data["message"] : "", "</p></body></html>";
    exit;
  }
?>
            <center>
                <img src="<?php echo $data["badgeUrls"]["medium"]; ?>" alt="<?php echo $data["name"]; ?>" />
            </center>

        <center>
            <div class="clanTitle">
                <?php  echo $data["name"]; ?>
            </div>
        </center>
        <center>
            <div class="clanTag">
                <?php echo $data["tag"]; ?>
            </div>
        </center>
        <br>

        <center>
  <div class="clanDescription">
    <?php echo $data["description"]; ?>
  </div>
</center>
<br/>
<div class="dataParent">
    <center>
        <div class="dataBox">
            Total Clan Points: <?php echo $data["clanPoints"]; ?>
        </div>
        <div class="dataBox">
            Wars Won : <?php echo $data["warWins"]; ?>
        </div>
        <div class="dataBox">
            Total Members: <?php echo $data["members"]; ?>/50

        </div>
        <div class="dataBox">
            Clan Status : <?php 
          echo $data["type"];?>

        </div>
        <div class="dataBox">
            Required Trophies: <?php echo $data["requiredTrophies"]; ?>

        </div>
        <div class="dataBox">
            Clan-Location: <?php echo $data["location"]["name"]; ?>
        </div>
        <div class="dataBox">
            War Frequency: <?php echo $data["warFrequency"]; ?>
        </div>
    </div>
</center>
</div>
<div id="dataTable">
    <center>
            <table>
                <tbody>
                    <tr>
                        <td>#</td>
                        <td>League</td>
                        <td>Exp</td>
                        <td>In Game Name</td>
                        <td>Donated</td>
                        <td>Received</td>
                        <td>Trophies</td>
                        <td>Versus Trophies</td>
                    </tr>
                    <?php
  foreach ($members as $member) {
?>
                    <tr>
                        <td><?php echo $member["clanRank"];?></td>
                        <td><img
                                src="<?php echo $member["league"]["iconUrls"]["tiny"]; ?>"
                                alt="<?php echo $member["league"]["name"]; ?>" /></td>
                        <td><?php echo $member["expLevel"]; ?></td>
                        <td><?php echo "<b>", $member["name"], "</b><br/>"; $arr = $member["role"];
print_r(str_replace("admin","Elder",$arr)); ?></td>
                        <td><?php echo $member["donations"]; ?></td>
                        <td><?php echo $member["donationsReceived"]; ?></td>
                        <td><?php echo $member["trophies"]; ?></td>
                        <td><?php echo $member["versusTrophies"]; ?></td>
                    </tr>
                    <?php
  }
?>
                </tbody>
            </table>
</center>
</div>

    <footer>&copy;2020 IndImmCOC.ga | Handcrafted With ♥ By <a href = "https://github.com/WirYen/">WirYen</a></footer>

    <script src="js/nanobar.min.js"></script>
    <script>
        var options = {
            classname: 'my-class',
            id: 'my-id'
        };
        var nanobar = new Nanobar(options);
        nanobar.go(30);
        nanobar.go(76);
        nanobar.go(100);
    </script>
</body>

</html>