@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../silvertipsoftware/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64
php "%BIN_TARGET%" %*
