#!/bin/bash
#Description: Update IP address for A record on Digital Ocean API v2.
#Author: Ivan Denkov

TOKEN=""
RECORD_ID=""
DOMAIN_NAME=""

#Retrieve current public IP
NIP=$(curl -s checkip.dyndns.org | sed -e 's/.*Current IP Address: //' -e 's/<.*$//')

#Retrieve record IP
CIP=$(curl -X GET -H 'Content-Type: application/json' -H 'Authorization: Bearer '$TOKEN'' "https://api.digitalocean.com/v2/domains/"$DOMAIN_NAME"/records/"$RECORD_ID"" | python -c 'import json,sys;obj=json.load(sys.stdin);print obj["domain_record"]["data"]')
#echo [$(date +"%d-%m-%Y-%T")] "DO WAN IP: " $CIP  >> log.txt


#Compare past WAN IP and with current WAN IP
if [ "$NIP" != "$CIP" ]; then
   curl -X PUT -H 'Content-Type: application/json' -H 'Authorization: Bearer '$TOKEN'' -d '{"data":"'"$NIP"'"}' "https://api.digitalocean.com/v2/domains/"$DOMAIN_NAME"/records/"$RECORD_ID
else
  echo "IP is the same!"
fi
exit 0;
