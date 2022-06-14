#!/usr/bin/env bash

if [ -f ReaktionTracking.zip ]; then
  rm -rf ReaktionTracking.zip
fi

zip -qq -r ReaktionTracking.zip . -x build.sh
