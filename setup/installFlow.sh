#!/bin/bash

# put this file in the root folder of the oxid eshop

cd source/Application
#git clone -b master https://github.com/OXID-eSales/flow_theme.git views/flow

cd ../..
ln -s source/Application/views/flow/out/flow source/out/flow

#cd source/Application/views/flow

#mysql -uoxid -poxid oxid < setup.sql

#echo 'AND NOW ACTIVATE IT IN THE ADMIN!'