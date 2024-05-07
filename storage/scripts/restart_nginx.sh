#!/bin/bash
if ! systemctl is-active nginx >/dev/null ; then
    systemctl reload nginx
fi