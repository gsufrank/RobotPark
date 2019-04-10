#!/bin/bash
clear
sudo ffmpeg -i /dev/video0 -f h264 -r 30 -s 640x480 -segment_time 60 -segment_format mp4 -t 00:00:10 test.mp4

