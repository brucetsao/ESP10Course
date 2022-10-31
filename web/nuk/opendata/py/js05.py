import sys
import requests
import json
import time
import datetime
import math
import os
import http.client
import unicodedata
from pathlib import Path

from requests.exceptions import HTTPError
str1=""
str2=""

def papameterstring():
	print("Process http string")
#   http://140.134.25.43:8088/fcu/opendata/rainadd.php?f01=%27C0C630%27&f02=%27%E5%A4%A7%E6%BA%AA%27&f03=%272020-03-03%2022:00:00%27&f04=24.884722&f05=121.256944&f06=209.0&f07=64&f08=1.2&f09=18.1&f10=8.4&f11=995.5&f12=0.0&f13=%2708%27&f14=%27%E6%A1%83%E5%9C%92%E5%B8%82%27&f15=%27060%27&f16=%27%E5%A4%A7%E6%BA%AA%E5%8D%80%27	

	str1 = "140.134.25.43:8088"
#	str = "mac=%s&s1=%s&s2=%s&s3=%.2f&s4=%.2f&s5=%.2f"%(ethMAC, date_now, kind, temperature, humidity, get_co2_data)
	#str2 = 'f01=\'%s\'&f02=\'%s\'&f03=\'%s\'&f04=%f&f05=%f&f06=%d&f07=%d&f08=%f&f09=%f&f10=%f&f11=%f&f12=%d&$f13=\'%s\'&f14=\'%s\'&f15=\'%s\'&f16=\'%s\'' %(s01, s02, s03, s04, s05, s06, s07, s08, s09, s10, s11, s12, s13, s14, s15, s16)
	
	str2 = '/fcu/opendata/rainadd.php?f01=\'%s\'&f02=\'%s\'&f03=\'%s\'&f04=%s&f05=%s&f06=%s&f07=%s&f08=%s&f09=%s&f10=%s&f11=%s&f12=%s&f13=\'%s\'&f14=\'%s\'&f15=\'%s\'&f16=\'%s\'' %(s01, s02, s03, s04, s05, s06, s07, s08, s09, s10, s11, s12, s13, s14, s15, s16)
	#3627, 23, 2020-01-09 11:13:41, 'B827EBBD6F62', '2020-01-07 14:01:57', 'AEDES', 22.1, 88.1, 692.49
	str = str1+str2
	print(str)
	print("===================")
	return 0    
	


url='https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0001-001?Authorization=CWB-8D336EBD-4CD8-4077-AD00-F5551E8DE2DA&format=JSON'
#請將"CWB-8D336EBD-4CD8-4077-AD00-F5551E8DE2DA"換成您自己的
try:
	res = requests.get(url)
	res.raise_for_status()
except HTTPError as http_err:
	print(f'HTTP error occurred: {http_err}')
	sys.exit(0)
except Exception as err:
	print(f'Other error occurred: {err}')
	sys.exit(0)
else:
	print('Success!')
table=json.loads(res.content)
print('return value = %s' %table['success'])

for data in table['records']['location']:
	print('item name =%s' % data['stationId'])
	print('item name =%s' % data['locationName'])
	s01 = data['stationId']
	s02 = data['locationName']
	s03 = data['time']['obsTime']
	s04 = data['lat']
	s05 = data['lon']
	data2 = data['weatherElement']
	s06 = data2[0]['elementValue']
	s07 = data2[1]['elementValue']
	s08 = data2[2]['elementValue']
	s09 = data2[3]['elementValue']
	s10a = data2[4]['elementValue']
	s10 = float(s10a)*10
	s11 = data2[5]['elementValue']
	s12 = data2[6]['elementValue']
	data3 = data['parameter']
	s13 = data3[1]['parameterValue']
	s14 = data3[0]['parameterValue']
	s15 = data3[3]['parameterValue']
	s16 = data3[2]['parameterValue']
	str1 = "http://140.134.25.43:8088"
	str2 = "/fcu/opendata/rainadd.php?f01=\'%s\'&f02=\'%s\'&f03=\'%s\'&f04=%s&f05=%s&f06=%s&f07=%s&f08=%s&f09=%s&f10=%s&f11=%s&f12=%s&f13=\'%s\'&f14=\'%s\'&f15=\'%s\'&f16=\'%s\'" %(s01, s02, s03, s04, s05, s06, s07, s08, s09, s10, s11, s12, s13, s14, s15, s16)
	str = str1+str2
	print(str)

#    papameterstring()

	try:
		print('1Access Server  is ok')
#		conn = http.client.HTTPConnection("mosquitotrap.nhri.org.tw",80, timeout=60)
		print(str2)
		
		print('2Access Server  is ok')
		x = requests.get(str)
		print(x.status_code)
		#conn.request("GET","/index.php")
#		conn.request("GET", str3)
#		r2 = conn.getresponse()
#		print(r2.status, r2.reason)
#		#r = conn.getresponse()
		print('3Access Server  is ok')
		#time.sleep(10)
	except: # request.exceptions.RequestException as e: #requests.exceptions.RequestException as e:
		print('Exception in data_output')
