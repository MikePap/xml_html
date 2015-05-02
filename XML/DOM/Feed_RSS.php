<?php
// send XML header
header("Content-Type: text/xml"); 
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";

?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>Trog</title>
        <link>http://www.melonfire.com/community/columns/trog/</link>
        <description>Tutorials on PHP and other languages</description>
<?php

//$connection = mysqli_connect("localhost", "user", "pass", "db1") or die ("ERROR: Cannot connect");
require("../allegati/Conn_mysqli.php");

//$sql = "SELECT url, title, synopsis FROM content LIMIT 10";
$sql = "SELECT id_nabc, titolo_nabc, notizia_nabc, linksito_nabc 
		FROM  news_abc
		ORDER BY id_nabc DESC
		LIMIT 10";
 
//$result = mysqli_query($connection, $sql) or die ("ERROR: " . mysqli_error($connection) . " (query was $sql)");

// print as <item>s if available
if($result = $mysqli->prepare($sql) ) {
$result->execute();
$result->store_result();
$result->bind_result($id, $titolo, $notizia, $link);
while($result->fetch()) {
?>
                <item>
                  <title><?php printf("%s", $titolo); ?></title>
                  <link><?php printf("%s", $link); ?></link>
                  <description><?php printf("%s", $notizia); ?></description>
                </item>
<?php
     } // chiude while 
$result->close();
}  // chiude if prepare  

// close connection
//mysqli_close($connection);

?>
    </channel>
</rss>

<?php 
$mysqli->close();

?>

<!--

http://localhost/News_abc/box_news.php?news=6
http://localhost/News_abc/box_news.php?news=6

http://localhost/xml_html/XML/DOM/Feed_RSS.php

-->






