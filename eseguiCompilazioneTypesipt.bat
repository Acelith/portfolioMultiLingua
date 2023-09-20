@echo off
setlocal enabledelayedexpansion

set "rootDir=C:\Sviluppo OFF\portfolioMultiLingua"

for /r "%rootDir%" %%F in (*.ts) do (
    set "filePath=%%~F"
    set "parentDir=%%~dpF"
    set "parentDir=!parentDir:\node_modules\=!"
    
    rem Verifica se il percorso non contiene 'node_modules'
    echo !parentDir! | find /i "\node_modules\" >nul
    if errorlevel 1 (
        echo !filePath!
    )
)

endlocal
