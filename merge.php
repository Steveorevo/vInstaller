<?php

/**
 * Merge the elevate.app and vInstaller.app to 
 * furnish elevated launching"
 */

// Our app paths...
$app_contents = __DIR__ . "/Builds - vInstaller/OS X 64 bit/vInstaller.app/Contents/";
$ele_contents = __DIR__ . "/elevated.app/Contents/";

// Copy files
@mkdir ($app_contents . "Resources/Scripts");
copy($ele_contents . "Resources/Scripts/main.scpt", $app_contents . "Resources/Scripts/main.scpt");
copy($ele_contents . "Resources/applet.rsrc", $app_contents . "Resources/applet.rsrc");
copy($ele_contents . "MacOS/applet", $app_contents . "MacOS/applet");
echo shell_exec("chmod +x \"" . $app_contents . "MacOS/applet\"");

// Modify vInstaller.app to invoke applet
$info_plist = file_get_contents($app_contents . "Info.plist");
$info_plist = str_replace("<key>CFBundleExecutable</key>\n   <string>vInstaller</string>", "<key>CFBundleExecutable</key>\n   <string>applet</string>", $info_plist);

// Hide dock icon
$info_plist = substr($info_plist, 0, -16) . "<key>LSUIElement</key>\n<true/>\n</dict>\n</plist>";
file_put_contents($app_contents . "Info.plist", $info_plist);



