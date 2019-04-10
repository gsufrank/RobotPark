#!/bin/bash
sudo ffmpeg -y -i test.mp4 -c:v libx264 -preset slow -crf 22 -pix_fmt yuv420p -c:a libvo_aacenc -b:a 128k test1.mp4
