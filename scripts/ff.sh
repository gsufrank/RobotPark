#!/bin/bash
clear
sudo ./ff_record.sh
sudo ./ff_convert.sh
sudo rm test.mp4
sudo ./ff_name.sh
