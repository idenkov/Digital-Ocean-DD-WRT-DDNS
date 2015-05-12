<?php

exec('curl -X POST -H \'Content-Type: application/json\' -H \'Authorization: Bearer e7282cea8d69972acbea0305c5cd9b9e99da6f686ad51780b57a19bb296d728d\' -d \'{"type":"A","name":"customdomainrecord.com","data":"162.10.66.0","priority":null,"port":null,"weight":null}\' "https://api.digitalocean.com/v2/domains/denkov.org/records"');

?>
