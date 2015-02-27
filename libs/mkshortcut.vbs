set WshShell = WScript.CreateObject("WScript.Shell" )
set oShellLink = WshShell.CreateShortcut(Right(Wscript.Arguments.Named("shortcut"), Len(Wscript.Arguments.Named("shortcut"))-3) & ".lnk")
oShellLink.TargetPath = Wscript.Arguments.Named("target")
oShellLink.WindowStyle = 1
oShellLink.Save
