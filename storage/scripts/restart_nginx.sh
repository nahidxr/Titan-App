#!/bin/bash
if ! systemctl is-active nginx >/dev/null ; then
    systemctl start nginx
fi