-- Wait for our original app to exit
delay 2

-- Restart our application with administrator privileges
set thePID to (do shell script "\"[application-binary]\" > /dev/null 2>&1 & echo $!" with administrator privileges) as integer
